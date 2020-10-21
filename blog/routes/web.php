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

Route::resource('comments','CommentController')->except(['show'],['create']);


Route::get('registrations/form','AuthController@registerForm')->name('registrations.form');

Route::post('registrations/register','AuthController@register')->name('registrations.register');

Route::get('registrations/panel_page','AuthController@index')->name('registrations.panel');


Route::get('/posts/cat/{id}', 'CategoryController@getPostByCategoryId');

Route::get('authenticate/form','AuthController@authenticateForm')->name('authenticate.form');

Route::post('authenticate/index','AuthController@authenticate')->name('authenticate.index');

Route::group(['as' => 'profile.', 'middleware' => ['auth']], function (\Illuminate\Routing\Router $router) {

    $router->get('/profile/panel_page','AuthController@profile')->name('home');
});

Route::get('/logout','AuthController@logout')->name('logout');

Route::get('/all_posts','PostController@showAllPosts')->name('all.posts');









