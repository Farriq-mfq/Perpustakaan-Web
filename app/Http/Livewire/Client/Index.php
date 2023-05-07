<?php

namespace App\Http\Livewire\Client;

use App\Models\Book;
use App\Models\Rak;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $perpage = 8;
    public $rakSearch;
    public function clickRak($id)
    {       
       $this->rakSearch = $id;
    }
    public function LoadMore()
    {
        $this->perpage+=8;
    }
    public function showAll()
    {
        $this->rakSearch = null;
    }
    public function countRak($id)
    {
        return Book::where("rak_id",$id)->count();
    }
    public function render()
    {
        if($this->rakSearch){
            $books = Book::where('status',1)->where('rak_id',$this->rakSearch)->paginate($this->perpage);
        }else{
            $books = Book::where('status',1)->paginate($this->perpage);
        }
        return view('livewire.client.index',["title"=>"Home",'books'=>$books,'raks'=>Rak::all()])->extends('layouts.client',["title"=>"Home"])->section("clientContent");
    }
}

