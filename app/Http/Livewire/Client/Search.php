<?php

namespace App\Http\Livewire\Client;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;
    public $search;
    public $perpage = 6;
    protected $queryString = ['search'];
    public function LoadMore()
    {
        $this->perpage+=6;
    }
    public function render()
    {
        return view('livewire.client.search',['books'=>Book::where("judul",'like','%'.$this->search.'%')->where('status',1)->paginate($this->perpage)])->extends('layouts.client',['title'=>"Cari Buku"])->section("clientContent");
    }
}
