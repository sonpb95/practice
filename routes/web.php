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

Route::get('blog/home', [
    'uses' => 'Blog\BlogController@home',
    'as' => 'Blog.home',
]);

Route::get('blog/create', [
    'uses' => 'Blog\BlogController@create',
    'as' => 'Blog.create',
]);

Route::get('blog/edit/{blog}', [
    'uses' => 'Blog\BlogController@edit',
    'as' => 'Blog.edit',
]);

Route::post('blog/store', [
    'uses' => 'Blog\BlogController@store',
    'as' => 'Blog.store',
]);

Route::post('blog/update', [
    'uses' => 'Blog\BlogController@update',
    'as' => 'Blog.update',
]);

Route::post('blog/delete/{blog}', [
    'uses' => 'Blog\BlogController@delete',
    'as' => 'Blog.delete',
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
