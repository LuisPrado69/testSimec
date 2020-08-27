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
    return view('welcome');
});

/* ------------- */
/* Credit request firstGame */
/* ------------- */
Route::prefix('first_game')->group(function () {
    Route::get('/show_modal','FirstGameController@showModal')->name('first_game.show_modal');
    Route::post('/store','FirstGameController@store')->name('first_game.store');
    Route::put('/update/{id}','FirstGameController@update')->name('first_game.update');
    Route::get('/index','FirstGameController@index')->name('first_game.index');
});

/* ------------- */
/* Credit request secondGame */
/* ------------- */
Route::prefix('second_game')->group(function () {
    Route::get('/show_modal','SecondGameController@showModal')->name('second_game.show_modal');
    Route::post('/store','SecondGameController@store')->name('second_game.store');
    Route::get('/index','SecondGameController@index')->name('second_game.index');
});
