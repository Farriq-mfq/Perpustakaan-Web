<?php

namespace App\Http\Livewire\Rak;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.rak.index')->extends('layouts.app',['title'=>"Data Rak"])->section('content');
    }
}
