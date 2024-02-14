<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::view('/','welcome')->name('welcome') ;

Route::get('/chirps', function () {
    return 'welcome to chirps';
})->name('chirps.index');

Route::get('/chirps/{chirp}', function ($chirp) {

    if ($chirp === '4'){
        return to_route('chirps.index');
    }
    return 'welcome to chirps con variable  --' .$chirp;
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
