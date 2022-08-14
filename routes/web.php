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

Route::get('post',              'BlogController@index');
Route::post('blog/post_page',   'BlogController@post');
Route::get('post/edit/{id}',    'BlogController@edit');
Route::post('post/update/{id}', 'BlogController@update');
Route::get('post/destroy/{id}', 'BlogController@destroy');

Route::get('comment/destroy/{id}', 'HomeController@destroy');

/* user list*/
Route::get('users',             'UserController@index');
/*comments*/
Route::post('blog/comment',     'HomeController@post');

Auth::routes();

Route::get('/home',             'HomeController@index')->name('home');
