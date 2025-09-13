<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LansiaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLansiaController;
use App\Http\Controllers\AuthController;

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/data-entry', [LansiaController::class, 'create'])->name('lansia.create');
Route::post('/data-entry', [LansiaController::class, 'store'])->name('lansia.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->middleware(['guest', 'throttle:5,1']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/', function () {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login');
    });
    
    Route::middleware(['auth:web'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('lansia', AdminLansiaController::class);
    });
});


Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');