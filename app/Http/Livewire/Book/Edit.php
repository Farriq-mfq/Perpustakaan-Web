<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.book.edit')->extends('layouts.app',['title'=>'Edit Buku'])->section('content');;
    }
}
