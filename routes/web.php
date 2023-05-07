<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function(){
    Route::middleware('auth:admin')->group(function(){

    
    Route::get('/',"\App\Http\Livewire\Home\Index")->name('home.index');
    // anggota
    Route::get('/anggota',"\App\Http\Livewire\Anggota\Index")->name('anggota.index');
    Route::get('/anggota/create',"\App\Http\Livewire\Anggota\Create")->name('anggota.create');
    Route::get('/anggota/{id}/edit',"\App\Http\Livewire\Anggota\Edit")->name('anggota.edit');
    // Rak
    Route::get('/rak','\App\Http\Livewire\Rak\Index')->name('rak.index');
    Route::get('/rak/create','\App\Http\Livewire\Rak\Create')->name('rak.create');
    Route::get('/rak/{id}/edit','\App\Http\Livewire\Rak\Edit')->name('rak.edit');
    // Books
    Route::get('/buku','\App\Http\Livewire\Book\Index')->name('books.index');
    Route::get('/buku/create','\App\Http\Livewire\Book\Create')->name('books.create');
    Route::get('/buku/{id}/view','\App\Http\Livewire\Book\View')->name('books.view');
    Route::get('/buku/{id}/edit','\App\Http\Livewire\Book\Edit')->name('books.edit');
    Route::get('/peminjaman','\App\Http\Livewire\Rent\Index')->name('rent.index');
    Route::get('/peminjaman/create','\App\Http\Livewire\Rent\Create')->name('rent.create');
});
Route::middleware('guest:admin')->group(function(){
    Route::get('/login','\App\Http\Livewire\Auth\Login')->name('auth.login');
});
// auth admin
});
Route::middleware('auth:anggota')->group(function(){
    Route::get("/","\App\Http\Livewire\Client\Index")->name('client.index');
    Route::get("/cari","\App\Http\Livewire\Client\Search")->name('client.search');
    Route::get("/akun","\App\Http\Livewire\Client\Account")->name('client.account');
    Route::get("/book/{slug}","\App\Http\Livewire\Client\Detail")->name('client.detail');
    Route::get("/akun/info","\App\Http\Livewire\Client\Account\Info")->name('client.account.info');
    Route::get("/akun/pinjam","\App\Http\Livewire\Client\Account\Peminjaman")->name('client.account.rent');
});
Route::middleware('guest:anggota')->group(function(){
    Route::get("/login","\App\Http\Livewire\Client\Login")->name('client.login');
});