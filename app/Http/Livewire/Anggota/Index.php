<?php

namespace App\Http\Livewire\Anggota;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function delete($id)
    {
        $find = User::find($id);
        if($find){
            $find->delete();
            return session()->flash('alert','Success Menghapus Data');
        }
    }
    public function render()
    {
        return view('livewire.anggota.index',['anggotas'=>User::all()])->extends('layouts.app',['title'=>"Anggota"])->section("content");
    }
}
