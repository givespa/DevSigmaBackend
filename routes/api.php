<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'contact'], static function () {
    Route::get('show', 'ContactController@show')->name('contact.show');
    Route::post('create', 'ContactController@create')->name('contact.create');       // crear registro
    Route::post('delete', 'ContactController@destroy')->name('contact.destroy');     // eliminar registro
});
