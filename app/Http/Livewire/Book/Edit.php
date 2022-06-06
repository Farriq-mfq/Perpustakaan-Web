<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use App\Models\Rak;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
    use WithFileUploads;
    // public $kode;
    public $judul;
    public $penulis;
    public $pengarang;
    public $penerbit;
    public $tahun_terbit;
    public $stok;
    public $rak_id;
    public $cover;
    // new cover
    public $new_cover;
    public $source;
    public $type;
    // raks
    public $raks;
    // book id
    public $bookId;
    public function mount($id)
    {
        $find = Book::find($id);
        $Rak = Rak::all();
        $this->raks = $Rak;
        if($find){
            $this->bookId = $id;
            $this->judul = $find->judul;
            $this->penulis = $find->penulis;
            $this->pengarang = $find->pengarang;
            $this->penerbit = $find->penerbit;
            $this->tahun_terbit = $find->tahun_terbit;
            $this->stok = $find->stok;
            $this->rak_id = $find->rak_id;
            $this->cover = $find->cover;
            $this->source = $find->source;
            $this->type = $find->type;
        }
    }
    public function edit()
    {
        if($this->new_cover != null){
            $this->validate([
                'judul'=>$this->judul == Book::find($this->bookId)->judul ? "required|min:5":"required|min:5|unique:books,judul",
                'penulis'=>'required',
                'pengarang'=>'required',
                'penerbit'=>'required',
                'tahun_terbit'=>'required|digits:4|max:'.(date('Y')+1),
                'stok'=>'required|numeric',
                'rak_id'=>'required|numeric',
                'new_cover'=>'max:2048|image|mimes:jpg,png,jpeg,webp',
                'source'=>'required',
                'type'=>'required'
            ]);
        }else{
            $this->validate([
                'judul'=>$this->judul == Book::find($this->bookId)->judul ? "required|min:5":"required|min:5|unique:books,judul",
                'penulis'=>'required',
                'pengarang'=>'required',
                'penerbit'=>'required',
                'tahun_terbit'=>'required|digits:4|max:'.(date('Y')+1),
                'stok'=>'required|numeric',
                'rak_id'=>'required|numeric',
                'source'=>'required',
                'type'=>'required'
            ]);
        }
        if($this->new_cover != null){
            $name_cover = md5($this->new_cover.microtime()).".".$this->new_cover->extension();
        }
        if($this->new_cover != null){
            $update = Book::find($this->bookId)->update([
                'judul'=>$this->judul,
                'penulis'=>$this->penulis,
                'pengarang'=>$this->pengarang,
                'penerbit'=>$this->penerbit,
                'tahun_terbit'=>$this->tahun_terbit,
                'stok'=>$this->stok,
                'rak_id'=>$this->rak_id,
                'cover'=>$name_cover,
                'slug'=>Str::slug($this->judul),
                'source'=>$this->source,
                'type'=>$this->type,
            ]);
        }else{
            $update = Book::find($this->bookId)->update([
                'judul'=>$this->judul,
                'penulis'=>$this->penulis,
                'pengarang'=>$this->pengarang,
                'penerbit'=>$this->penerbit,
                'tahun_terbit'=>$this->tahun_terbit,
                'stok'=>$this->stok,
                'rak_id'=>$this->rak_id,
                'slug'=>Str::slug($this->judul),
                'source'=>$this->source,
                'type'=>$this->type,
            ]);
        }
        if($update){
            if($this->new_cover != null){
                $file_path = storage_path().'/app/public/cover/'.$this->cover;
                if(file_exists($file_path)){
                    unlink($file_path);
                }
                $this->new_cover->storePubliclyAs('cover',$name_cover,'public');
            }
            return session()->flash('alert','Success Edit Buku');
        }else{
            return session()->flash('alert','Success Edit Buku');
        }
    }
    public function render()
    {
        return view('livewire.book.edit')->extends('layouts.app',['title'=>'Edit Buku'])->section('content');;
    }
}
