<?php

namespace App\Http\Livewire\Anggota;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.anggota.index')->extends('layouts.app',['title'=>"Anggota"])->section("content");
    }
}
