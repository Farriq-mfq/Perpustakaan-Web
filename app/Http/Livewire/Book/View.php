<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use App\Models\Rak;
use Livewire\Component;

class View extends Component
{
    public $book;
    public $lokasi_rak;
    public function mount($id)
    {
        $find = Book::find($id);
        if($find){
            $this->book = $find;
            $rak = Rak::find($find->rak_id);
            if($rak!=null){
                $this->lokasi_rak = $rak->lokasi_rak;
            }else{
                return redirect(route('books.index'))->with('alert','Rak tidak di temukan');
            }
        }
    }
    public function render()
    {
        return view('livewire.book.view')->extends('layouts.app',['title'=>'Detail Buku'])->section('content');;
    }
}
