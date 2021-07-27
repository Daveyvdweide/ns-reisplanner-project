<?php

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

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'stations', 'as' => 'stations.', ],  function() {
    Route::get('/', App\Http\Livewire\Dashboard::class)->name('index');
    Route::get('/bekijken/{uicode}', App\Http\Livewire\Station::class)->name('bekijken');
});

Route::group(['prefix' => 'treinen', 'as' => 'treinen.', ],  function() {
    Route::get('/', App\Http\Livewire\Dashboard::class)->name('index');
    Route::get('/bekijken/{ritnummer}', App\Http\Livewire\Trein::class)->name('bekijken');
});
