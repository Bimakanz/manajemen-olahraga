<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OlgaController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [OlgaController::class, 'welcome'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::delete('/form/{id}', [FormController::class, 'decline'])->name('form.decline');
Route::put('/form/{id}', [FormController::class, 'approve'])->name('form.approve');


Route::resource('form', FormController::class);

Route::resource('olga', OlgaController::class);

Route::get('/dashboard', [OlgaController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('olga', OlgaController::class)->middleware(['auth', 'verified']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
