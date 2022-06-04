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

Route::get('/',"\App\Http\Livewire\Home\Index")->name('home.index');
// anggota
Route::get('/anggota',"\App\Http\Livewire\Anggota\Index")->name('anggota.index');
Route::get('/anggota/create',"\App\Http\Livewire\Anggota\Create")->name('anggota.create');
Route::get('/anggota/edit/{id}',"\App\Http\Livewire\Anggota\Edit")->name('anggota.edit');
// Rak
Route::get('/rak','\App\Http\Livewire\Rak\Index')->name('rak.index');
Route::get('/rak/create','\App\Http\Livewire\Rak\Create')->name('rak.create');
Route::get('/rak/edit/{id}','\App\Http\Livewire\Rak\Edit')->name('rak.edit');
