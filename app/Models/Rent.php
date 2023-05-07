<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $fillable = ['kode_pinjam','judul_buku','book_id','peminjam','anggota_id','persetujuan','tanggal_pinjam','tanggal_kembali']; 
}
