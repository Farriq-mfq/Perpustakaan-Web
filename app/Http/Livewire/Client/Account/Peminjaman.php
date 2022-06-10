<?php

namespace App\Http\Livewire\Client\Account;

use App\Models\Rent;
use Livewire\Component;

class Peminjaman extends Component
{
    public function render()
    {
        $pinjam = Rent::where("anggota_id",auth()->guard('anggota')->user()->id)->get();
        return view('livewire.client.account.peminjaman',['pinjam'=>$pinjam])->extends('layouts.client',['title'=>'Peminjaman Saya'])->section("clientContent");
    }
}
