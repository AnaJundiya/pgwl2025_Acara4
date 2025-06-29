<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PolygonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PolylinesController;

Route::get('/', [PublicController::class, 'index'])->name('home');

// Ubah route /dashboard → redirect ke /map
Route::get('/dashboard', function () {
    return redirect()->route('map');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Resource routes
Route::resource('points', PointsController::class);
Route::resource('polylines', PolylinesController::class);
Route::resource('polygon', PolygonController::class);

// Map & Table
Route::get('/map', [PointsController::class, 'index'])->name('map');
Route::get('/table', [TableController::class, 'index'])->name('table');

require __DIR__.'/auth.php';
