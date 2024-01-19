<?php

use App\Http\Controllers\AdminController;
use App\Livewire\SongIndex;
use App\Livewire\AlbumIndex;
use App\Livewire\ArtistIndex;
use App\Livewire\GenreIndex;
use App\Livewire\TagIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    'verified',
    'role:admin'
])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('songs', [SongIndex::class])->name('songs.index');
    Route::get('artists', [ArtistIndex::class])->name('artists.index');
    Route::get('albums', [AlbumIndex::class])->name('albums.index');
    Route::get('genres', [GenreIndex::class])->name('genres.index');
    Route::get('tags', [TagIndex::class])->name('tags.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // auth()->user()->assignRole('admin');
        return view('dashboard');
    })->name('dashboard');
});
