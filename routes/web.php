<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DealController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', []);
});

Route::prefix('account')->name('account')->group(function(){
    Route::get('/', [AccountController::class, 'form'])->name('.create');
    Route::post('/', [AccountController::class, 'store'])->name('.store');
});

Route::prefix('deal')->name('deal')->group(function(){
    Route::get('/', [DealController::class, 'form'])->name('.create');
    Route::post('/', [DealController::class, 'store'])->name('.store');
});
