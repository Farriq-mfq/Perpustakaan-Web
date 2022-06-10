<?php

use App\Models\Anggota;
use App\Models\Book;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->char('kode_pinjam',10);
            $table->string('judul_buku');
            $table->foreignIdFor(Book::class);
            $table->string('peminjam');
            $table->foreignIdFor(Anggota::class);
            $table->date('tanggal_pinjam')->nullable();
            $table->date('tanggal_kembali')->nullable();
            $table->enum('status',['pinjam','telat','dikembalikan'])->default('pinjam');
            $table->boolean('persetujuan')->default(false);
            $table->bigInteger('denda')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
