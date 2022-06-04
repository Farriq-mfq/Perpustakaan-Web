<?php

namespace App\Http\Livewire\Rak;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.rak.edit')->extends('layouts.app',['title'=>"Rak"])->section('content');;
    }
}
