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

Route::get('/','PostController@index')->name('posts');

Route::resource('posts', 'PostController');

Route::resource('categories','CategoryController');

Route::resource('comments','CommentController')->except(['show'],['index'],['create']);

Route::get('registrations/index','AuthController@registerForm')->name('registrations.register.form');

Route::get('profile/index','AuthController@authenticateForm')->name('profile.index');

Route::get('registrations/register','AuthController@register')->name('registrations.register');

Route::post('registrations/panel_page','AuthController@index')->name('registrations.post');

Route::get('authenticate/index','AuthController@authenticate')->name('authenticate.index');






