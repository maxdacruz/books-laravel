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

Route::get('books', 'BookController@index');

Route::get('book/{id}', 'BookController@show');

Route::get('book/edit/{id}', 'BookController@edit')->name('book.edit');;
Route::put('book/edit/{id}', 'BookController@update');

Route::get('/books/create', 'BookController@create');
Route::post('/books/create', 'BookController@store');

Route::delete('book/delete/{id}', 'BookController@destroy');
