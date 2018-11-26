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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'blog',  'middleware' => 'auth'], function() {

Route::get('home', 'Blog\BlogController@home')->name('blog.home');

Route::get('create', 'Blog\BlogController@create')->name('blog.create');

Route::get('edit/{blog}', 'Blog\BlogController@edit')->name('blog.edit')->middleware('blog');

Route::post('store', 'Blog\BlogController@home')->name('blog.store');

Route::post('update', 'Blog\BlogController@update')->name('blog.update');

Route::post('delete/{blog}', 'Blog\BlogController@delete')->name('blog.delete');

Route::get('search', 'Blog\BlogController@search')->name('blog.search');

});