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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminsController@index')->name('admin.index');
Route::get('/post', 'PostController@show')->name('post');

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/team', function () {
    return view('team');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/services', function () {
    return view('services');
});

Route::get('/logoutnow', function () {
    Auth::logout();
    return view('home');
});
