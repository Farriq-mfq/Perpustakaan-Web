<?php

namespace App\Http\Livewire\Rent;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.rent.index')->extends('layouts.app',['title'=>"Peminjaman Buku"])->section('content');
    }
}
