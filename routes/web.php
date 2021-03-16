<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('user', 'UserController')->only(['edit','update']);

    // altra possibilità per escludere le route list è quella sotto indicata escludendo le public function non    implementate
    // Route::resource('user', 'UserController')->except(['index','create','show','store','destroy']);

});


