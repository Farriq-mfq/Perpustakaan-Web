<?php

namespace App\Http\Livewire\Rent;

use App\Models\Anggota;
use App\Models\Book;
use App\Models\Rent;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $kode;
    public $anggotas;
    public $anggota_id;
    public $kode_buku;
    public function mount()
    {
        $this->anggotas = Anggota::all();
        $this->kode = substr(uniqid(date("m")),0,10);
    }
    public function store()
    {
        $this->validate([
            'kode'=>'required',
            'kode_buku'=>'required',
            'anggota_id'=>"required"
        ]);
        $book = Book::where("kode_buku",$this->kode_buku)->first();
        $anggota = Anggota::find($this->anggota_id);
        if($book != null){
            $dateTime = Carbon::now();
            $simpan = Rent::create([
                'kode_pinjam'=>$this->kode,
                'judul_buku'=>$book->judul,
                'book_id'=>$book->id,
                'peminjam'=>$anggota->nama,
                'anggota_id'=>$this->anggota_id,
                'tanggal_pinjam'=>$dateTime->toDateTimeString(),
                'tanggal_kembali'=>$dateTime->addDays(7)->toDateTimeString(),
                'status'=>'pinjam',
                'persetujuan'=>1
            ]);
            if($simpan){
                $this->reset(['kode','kode_buku','anggota_id']);
                $this->kode = substr(uniqid(date("m")),0,10);
                return session()->flash('alert','Peminjaman Berhasil dibuat dengan jangka waktu 7 hari');
            }
        }else{
            return session()->flash('alert','Kode Buku Invalid');
        }
    }
    public function render()
    {
        return view('livewire.rent.create')->extends('layouts.app',['title'=>"Pinjam Buku"])->section('content');
    }
}
