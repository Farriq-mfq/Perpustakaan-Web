<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use App\Models\Rak;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
class Create extends Component
{
    use WithFileUploads;
    public $kode;
    public $judul;
    public $penulis;
    public $pengarang;
    public $penerbit;
    public $tahun_terbit;
    public $stok;
    public $rak_id;
    public $cover;
    public $source;
    public $type;
    // data Rak
    public $raks;
    public function mount()
    {
        $this->kode = substr(uniqid("BK"),0,10);
        $Rak = Rak::all();
        $this->raks = $Rak;
    }
    public function store()
    {
        $this->validate([
            'kode'=>'required|min:10',
            'judul'=>'required|min:5|unique:books,judul',
            'penulis'=>'required',
            'pengarang'=>'required',
            'penerbit'=>'required',
            'tahun_terbit'=>'required|digits:4|max:'.(date('Y')+1),
            'stok'=>'required|numeric',
            'rak_id'=>'required|numeric',
            'cover'=>'required|max:2048|image|mimes:jpg,png,jpeg,webp',
            'source'=>'required',
            'type'=>'required'
        ]);

        $name_cover = md5($this->cover.microtime()).".".$this->cover->extension();
        $save = Book::create([
            'kode_buku'=>$this->kode,
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

        if($save){
            $this->cover->storePubliclyAs('cover',$name_cover,'public');
            $this->kode = substr(uniqid("BK"),0,10);
            $this->reset(['judul','penulis','pengarang','penerbit','tahun_terbit','stok','rak_id','cover','source','type']);
            return session()->flash('alert','Success Menambahkan Buku');
        }else{
            return session()->flash('alert','Success Gagal Buku');
        }
    }
    public function render()
    {
        return view('livewire.book.create')->extends('layouts.app',['title'=>'Tambahkan Buku'])->section('content');
    }
}
