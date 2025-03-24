<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwilioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('conversations')->group(function () {
        Route::get('/', [ConversationController::class, 'index'])->name('conversations.index');
        Route::post('/fetch-access-token', action: [TwilioController::class, 'generateAccessToken'])->name('conversations.fetch-access-token');
    });
});

require __DIR__.'/auth.php';
