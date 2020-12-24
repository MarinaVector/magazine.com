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



Route::resource('magazines', 'MagazineController');
Route::resource('authors', 'AuthorController');
Route::get('/', 'MagazineController@index')->name('magazine');



//Route::get('/', function () {
 //   return view('magazines/index_magazines');
///});
