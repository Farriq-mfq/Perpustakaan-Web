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
