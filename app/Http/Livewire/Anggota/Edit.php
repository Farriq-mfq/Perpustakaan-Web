<?php

namespace App\Http\Livewire\Anggota;

use App\Models\Anggota;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Edit extends Component
{
    public $nama;
    public $password;
    public $konfirmasi;
    public $idAnggota;
    public function mount($id)
    {
        $anggota = Anggota::find($id);
        if($anggota){
            $this->nama = $anggota->nama;
            $this->idAnggota = $anggota->id;
        }
    }
    public function edit()
    {
        $this->validate([
            'nama'=>'required|min:6',
            'password'=>'required|min:5',
            'konfirmasi'=>"required|same:password",
        ],[
            'nama.required'=>"Nama harus di isi!",
            'nama.min'=>"Nama harus minimal 6 karakter!",
            'password.required'=>"Password harus di isi!",
            'password.min'=>"Password harus di 5 karakter!",
            'konfirmasi.required'=>"Konfirmasi harus di isi!",
            'konfirmasi.same'=>"Konfirmasi Invalid!",            
        ]);
        $update = Anggota::find($this->idAnggota)->update([
            'nama'=>$this->nama,
            'password'=>Hash::make($this->password)
        ]);
        if($update){
            $this->reset(['nama','password','konfirmasi']);
            return session()->flash('alert','Success Edit Anggota');
        }else{
            return session()->flash('alert','Success Edit Anggota');
        }
        
    }
    public function render()
    {
        return view('livewire.anggota.edit')->extends('layouts.app',['title'=>'Edit Anggota'])->section('content');
    }
}
