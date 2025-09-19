<?php

use App\Http\Controllers\HonorificController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// protect these routes with the authentication middleware
Route::middleware('auth')->group(function () {
    // Honorific Routes
    Route::get('honorifics', [HonorificController::class, 'index'])->name('honorifics.index');
    Route::get('honorifics/create', [HonorificController::class, 'create'])->name('honorifics.create');
    Route::post('honorifics', [HonorificController::class, 'store'])->name('honorifics.store');
    Route::get('honorifics/{honorific}', [HonorificController::class, 'show'])->name('honorifics.show');
    Route::get('honorifics/{honorific}/edit', [HonorificController::class, 'edit'])->name('honorifics.edit');
    Route::put('honorifics/{honorific}', [HonorificController::class, 'update'])->name('honorifics.update');
    Route::delete('honorifics/{honorific}', [HonorificController::class, 'destroy'])->name('honorifics.destroy');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
