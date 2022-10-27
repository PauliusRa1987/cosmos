<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PitController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\UnionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('main');
});

Route::prefix('front')->name('front-')->group(function () {
    Route::get('', [FrontController::class, 'index'])->name('index');
    Route::get('/create', [FrontController::class, 'create'])->name('create');
    Route::post('store', [FrontController::class, 'store'])->name('store');
});

Route::prefix('union')->name('union-')->group(function () {
    Route::get('', [UnionController::class, 'index'])->name('index');
    Route::get('/create', [UnionController::class, 'create'])->name('create');
    Route::post('store', [UnionController::class, 'store'])->name('store');
    Route::get('edit/{union}', [UnionController::class, 'edit'])->name('edit');
    Route::put('update/{union}', [UnionController::class, 'update'])->name('update');
    Route::delete('delete/{union}', [UnionController::class, 'destroy'])->name('destroy');
});

Route::prefix('country')->name('country-')->group(function () {
    Route::get('', [CountryController::class, 'index'])->name('index');
    Route::get('/create', [CountryController::class, 'create'])->name('create');
    Route::post('store', [CountryController::class, 'store'])->name('store');
    Route::get('edit/{country}', [CountryController::class, 'edit'])->name('edit');
    Route::put('update/{country}', [CountryController::class, 'update'])->name('update');
    Route::delete('delete/{country}', [CountryController::class, 'destroy'])->name('destroy');
    Route::get('join/{country}', [CountryController::class, 'join'])->name('join');
    Route::put('save/{country}', [CountryController::class, 'save'])->name('save');
});

Route::prefix('pit')->name('pit-')->group(function () {
    Route::get('', [PitController::class, 'index'])->name('index');
    Route::get('/create', [PitController::class, 'create'])->name('create');
    Route::post('store', [PitController::class, 'store'])->name('store');
    Route::get('edit/{pit}', [PitController::class, 'edit'])->name('edit');
    Route::put('update/{pit}', [PitController::class, 'update'])->name('update');
    Route::delete('delete/{pit}', [PitController::class, 'destroy'])->name('destroy');
});

Route::prefix('ship')->name('ship-')->group(function () {
    Route::get('', [ShipController::class, 'index'])->name('index');
    Route::get('/create', [ShipController::class, 'create'])->name('create');
    Route::post('store', [ShipController::class, 'store'])->name('store');
    Route::get('edit/{ship}', [ShipController::class, 'edit'])->name('edit');
    Route::put('update/{ship}', [ShipController::class, 'update'])->name('update');
    Route::delete('delete/{ship}', [ShipController::class, 'destroy'])->name('destroy');
});