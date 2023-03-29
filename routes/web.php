<?php

use App\Http\Controllers\ImageController;
use App\Http\Livewire\BeritaLivewire;
use App\Http\Livewire\HashtagLivewire;
use App\Http\Livewire\HomeLivewire;
use App\Http\Livewire\IklanLivewire;
use App\Http\Livewire\KategoriLivewire;
use App\Http\Livewire\PengunjungLivewire;
use App\Http\Livewire\SubKategoriLivewire;
use App\Http\Livewire\UsersLivewire;
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

Route::get('/kategori', KategoriLivewire::class);
Route::get('/subkategori', SubKategoriLivewire::class);
Route::get('/hashtag', HashtagLivewire::class);
Route::get('/berita', BeritaLivewire::class);
Route::get('/pengunjung', PengunjungLivewire::class);
Route::get('/iklan', IklanLivewire::class);
Route::get('/users', UsersLivewire::class);


Route::get('/', HomeLivewire::class);

Route::get('images/{fileName}',[ImageController::class, 'index']);

