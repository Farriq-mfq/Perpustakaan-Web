<?php

namespace App\Http\Livewire\Rak;

use App\Models\Rak;
use Livewire\Component;

class Edit extends Component
{
    public $kode;
    public $lokasi;
    public $rakId;
    public function mount($id)
    {
        $find = Rak::find($id);
        if($find){
            $this->kode = $find->kode_rak;
            $this->lokasi = $find->lokasi_rak;
            $this->rakId = $find->id;
        }
    }
    public function update()
    {
        $this->validate([
            'kode'=>'required',
            'lokasi'=>'required'
        ]);
        $update = Rak::find($this->rakId)->update([
            'lokasi_rak'=>$this->lokasi
        ]);
        if($update){
            return session()->flash('alert','Success Mengedit Rak');
        }else{
            
            return session()->flash('alert','Gagal Mengedit Rak');
        }
    }
    public function render()
    {
        return view('livewire.rak.edit')->extends('layouts.app',['title'=>"Edit Rak"])->section('content');;
    }
}
