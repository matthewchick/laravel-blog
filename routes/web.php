<?php

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


//Section 2: 21-34
Auth::routes();

Route::get('/', 'BlogsController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blogs', 'BlogsController@index')->name('blogs');
Route::get('/blogs/create', 'BlogsController@create')->name('blogs.create');
Route::post('/blogs/store', 'BlogsController@store')->name('blogs.store');

// Section 36: keep trashed routes here
Route::get('/blogs/trash', 'BlogsController@trash')->name('blogs.trash');

Route::get('/blogs/{id}', 'BlogsController@show')->name('blogs.show');
Route::get('/blogs/{id}/edit', 'BlogsController@edit')->name('blogs.edit');
Route::patch('/blogs/{id}/update', 'BlogsController@update')->name('blogs.update');
Route::delete('/blogs/{id}/delete', 'BlogsController@delete')->name('blogs.delete');

/*

Route::get('/blogs/trash/{id}/restore', 'BlogsController@restore')->name('blogs.restore');
Route::delete('/blogs/trash/{id}/permanent-delete', 'BlogsController@permanentDelete')->name('blogs.permanent-delete');
*/
