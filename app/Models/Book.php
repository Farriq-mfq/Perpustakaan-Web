<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable =['kode_buku','judul','penulis','pengarang','penerbit','tahun_terbit','stok','rak_id','cover','source','slug','type','status'];
}
