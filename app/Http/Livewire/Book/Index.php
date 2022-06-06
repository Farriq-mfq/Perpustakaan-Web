<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;

class Index extends Component
{
    public function handleReset()
    {
        $this->reset('file');
    }
    public function render()
    {
        return view('livewire.book.index')->extends('layouts.app',['title'=>'Data Buku'])->section('content');;
    }
}
