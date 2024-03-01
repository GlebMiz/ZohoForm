<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
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

Route::prefix('/account')->name('account')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Account/List', []);
    })->name('.list');

    Route::get('/create', function () {
        return Inertia::render('Account/Form', []);
    })->name('.create');
});

Route::prefix('/deal')->name('deal')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Deal/List', []);
    })->name('.list');

    Route::get('/create', function () {
        return Inertia::render('Deal/Form', []);
    })->name('.create');
});
