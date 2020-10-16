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

//Route::get(' ', 'PostController@index' )->name('posts.index');

Route::resource('posts', 'PostController')->except(['show'],['index'])->names('posts');

Route::resource('categories','CategoryController')->except(['show']);

Route::resource('comments','CommentController')->except(['show'],['index']);

Route::get('registrations/index','AuthController@registerForm')->name('registrations.register.form');
Route::post('registrations/register','AuthController@index')->name('registrations.post');




