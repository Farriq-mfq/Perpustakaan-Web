<?php

namespace App\Http\Livewire\Home;

use App\Models\Anggota;
use App\Models\Book;
use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $total_anggota = 0;
    public $total_buku = 0;
    public $total_peminjaman = 0;
    public $total_peminjaman_selesai = 0;
    public $mingguIni;
    public $mingguLalu;
    public $rangeMingguIni;
    public $rangeMinggulalu;
    public $peminjamanMingguIni;
    public $persen;
    public $ischart;
    public function returnDays($date)
    {
        return Carbon::create($date)->dayOfWeek;
    }
    public function mount(){
        // persentase
        $mingguLalu  = DB::table('rents')->whereBetween('tanggal_pinjam',[Carbon::now()->subWeek()->format("Y-m-d"),Carbon::now()->format("Y-m-d")])->select('tanggal_pinjam')->count();
        $mingguIni =  DB::table('rents')->whereBetween('tanggal_pinjam',[Carbon::now()->format("Y-m-d"),Carbon::now()->addWeek(1)->format("Y-m-d")])->select('tanggal_pinjam')->count();
        $count = DB::table('rents')->count();
        try {
            $rumus = (($mingguIni - $mingguLalu / $mingguLalu) / 100) * $count;
            $this->persen = $rumus;
            $this->ischart = true;
        } catch (\Throwable $th) {
            $this->ischart = false;
        }
        // end
        $this->peminjamanMingguIni = DB::table('rents')->where('tanggal_pinjam',Carbon::now()->format('Y-m-d'))->count();
        $this->rangeMinggulalu = Carbon::now()->subWeek()->format("Y-m-d").' - '. Carbon::now()->format("Y-m-d");
        $this->rangeMingguIni = Carbon::now()->format("Y-m-d").' - '. Carbon::now()->addWeek(1)->format("Y-m-d");
        $this->total_anggota = Anggota::all()->count();
        $this->total_buku = Book::all()->count();
        $this->total_peminjaman = Rent::all()->where('status','pinjam')->count();
        $this->total_peminjaman_selesai = Rent::all()->where('status','dikembalikan')->count();
        $this->mingguLalu = DB::table('rents')->whereBetween('tanggal_pinjam',[Carbon::now()->subWeek()->format("Y-m-d"),Carbon::now()->format("Y-m-d")])->select('tanggal_pinjam',DB::raw('count(*) as total'))->groupBy('tanggal_pinjam')->get();
        $this->mingguIni =  DB::table('rents')->whereBetween('tanggal_pinjam',[Carbon::now()->format("Y-m-d"),Carbon::now()->addWeek(1)->format("Y-m-d")])->select('tanggal_pinjam',DB::raw('count(*) as total'))->groupBy('tanggal_pinjam')->get();
    }
    public function render()
    {
        return view('livewire.home.index')->extends('layouts.app',['title'=>"Dashboard"])->section('content');
    }
}
