<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class Index extends Component
{
    public function mount(){
        // dd("ok");
    }
    public function render()
    {
        return view('livewire.home.index')->extends('layouts.app',['title'=>"Dashboard"])->section('content');
    }
}
