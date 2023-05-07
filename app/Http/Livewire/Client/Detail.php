<?php

namespace App\Http\Livewire\Client;

use App\Models\Book;
use App\Models\Rent;
use Carbon\Carbon;
use Livewire\Component;
class Detail extends Component
{
    public $book;
    public $judul_buku;
    public $book_id;
    public $peminjam;
    public $anggota_id;
    public bool $isPinjam = false;
    public function handlePinjam()
    {
        $this->validate([
            'judul_buku'=>'required',
            'book_id'=>'required',
            'peminjam'=>'required',
            'anggota_id'=>'required',
        ]);
        $data = [
            'kode_pinjam'=>substr(uniqid(date("m")),0,10),
            'judul_buku'=>$this->judul_buku,
            'book_id'=>$this->book_id,
            'peminjam'=>$this->peminjam,
            'anggota_id'=>$this->anggota_id,
        ];
        $pinjam = Rent::create($data);
        if($pinjam){
            return redirect()->route('client.account.rent');
        }
    }
    public function mount($slug)
    {
        $this->book = Book::where('slug',$slug)->where('status',1)->first();
        $this->judul_buku = $this->book->judul;
        $this->book_id = $this->book->id;
        $this->peminjam = auth()->guard('anggota')->user()->nama;
        $this->anggota_id = auth()->guard('anggota')->user()->id;
    }
    public function render()
    {
        return view('livewire.client.detail')->extends('layouts.client',['title'=>$this->book->judul])->section("clientContent");
    }
}
