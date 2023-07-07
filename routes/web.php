<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/books',
    'App\Http\Controllers\BookController@index'
)->name('books.index');

Route::post(
    '/books',
    'App\Http\Controllers\BookController@store'
)->name('books.store');

Route::get(
    '/books/create',
    'App\Http\Controllers\BookController@create'
)->name('books.create');

Route::get(
    '/books/{book}',
    'App\Http\Controllers\BookController@show'
)->name('books.show');

Route::get(
    '/books/{book}/edit',
    'App\Http\Controllers\BookController@edit'
)->name('books.edit');

Route::PUT(
    '/books/{book}',
    'App\Http\Controllers\BookController@update'
)->name('books.update');

Route::delete(
    '/books/{book}',
    'App\Http\Controllers\BookController@destroy'
)->name('books.destroy');

Route::get('/get-pdf' , 'App\Http\Controllers\BookController@getPDF')->name('get-pdf');


