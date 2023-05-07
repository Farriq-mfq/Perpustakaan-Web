<?php

namespace App\Http\Livewire\Anggota;

use App\Models\Anggota;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $nama;
    public $username;
    public $email;
    public $password;
    public $konfirmasi;

    public function store()
    {
        $this->validate([
            'nama'=>'required|min:6',
            'username'=>'required|min:6|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5',
            'konfirmasi'=>"required|same:password",


        ],[
            'nama.required'=>"Nama harus di isi!",
            'nama.min'=>"Nama harus minimal 6 karakter!",
            'username.required'=>"Username harus di isi!",
            'username.min'=>"Username harus minimal 6 karakter!",
            'email.required'=>"Email harus di isi!",
            'email.email'=>"Email tidak valid!",
            'password.required'=>"Password harus di isi!",
            'password.min'=>"Password harus di 5 karakter!",
            'konfirmasi.required'=>"Konfirmasi harus di isi!",
            'konfirmasi.same'=>"Konfirmasi Invalid!",
            
        ]);

        $simpan = Anggota::create([
            'nama'=>$this->nama,
            'username'=>$this->username,
            'email'=>$this->email,
            'password'=>Hash::make($this->password),
        ]);
        if($simpan){
            // konfirmasi email anggota if register
            $this->reset(['nama','username','email','password','konfirmasi']);
            return session()->flash('alert','Success Menambahkan Anggota');
        }else{
            return session()->flash('alert','Gagal Menambahkan Anggota');
        }
    }
    public function render()
    {
        return view('livewire.anggota.create')->extends('layouts.app',['title'=>'Tambahkan Anggota'])->section('content');
    }
}
