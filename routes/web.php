<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ElevesController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\SchoolYearConttoller;
use App\Http\Livewire\ClasseShow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {

    Route::prefix('niveaux')->group(function () {
        Route::get('/', [LevelsController::class, "index"])->name('niveaux.list');
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [SchoolYearConttoller::class, 'index'])->name('settings');
        Route::get('/create-school-year', [SchoolYearConttoller::class,'create'])->name('settings.create_school_year');
        Route::get('/create-levels', [LevelsController::class,'create'])->name('settings.create_levels');
        Route::get('/edit-levels/{level}', [LevelsController::class,'edit'])->name('settings.edit_level');
    });

    Route::prefix('classes')->group(function () {
        Route::get('/', [ClasseController::class, 'index'])->name('classes');
    });

    Route::prefix('eleves')->group(function () {
        Route::get('/', [ElevesController::class, 'index'])->name('students');
    });
});
