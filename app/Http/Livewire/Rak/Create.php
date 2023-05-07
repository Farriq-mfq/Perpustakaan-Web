<?php

namespace App\Http\Livewire\Rak;

use App\Models\Rak;
use Livewire\Component;

class Create extends Component
{
    public $kode;
    public $lokasi;
    public function mount()
    {
        $this->kode = date('ymdhis'); 
    }
    public function store()
    {
        $this->validate([
            'kode'=>'required',
            'lokasi'=>'required'
        ]);

        $simpan = Rak::create([
            'kode_rak'=>$this->kode, 
            'lokasi_rak'=>$this->lokasi, 
        ]);
        if($simpan){
            $this->reset(['kode','lokasi']);
            $this->kode = date('ymdhis');
            return session()->flash('alert','Success Menambahkan Rak');
        }else{
            
            return session()->flash('alert','Gagal Menambahkan Rak');
        }
    }
    public function render()
    {
        return view('livewire.rak.create')->extends('layouts.app',['title'=>"Rak"])->section('content');
    }
}
