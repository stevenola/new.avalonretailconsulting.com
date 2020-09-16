<?php

use App\Post;
use App\User;
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

Route::get('/post/{post}', 'PostController@show')->name('post');

Route::get('/posts', function () {

    $posts = Post::all()->sortByDesc('created_at');
    return view('posts', ['posts' => $posts]);
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

// Route Middleware prevents accessing admin page unless logged in

Route::middleware('auth')->group(function () {

    Route::get('/admin', 'AdminsController@index')->name('admin.index');


    // Post routes
    Route::get('/admin/posts', 'PostController@index')->name('posts.index');
    Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
    Route::post('/admin/posts', 'PostController@store')->name('post.store');
    Route::get('/admin/posts/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::patch('/admin/posts/{post}/update', 'PostController@update')->name('post.update');
    Route::delete('/admin/posts/{post}/destroy', 'PostController@destroy')->name('post.destroy');
    Route::get('/admin/posts/search', 'PostController@search');

    // User routes
    Route::put('/admin/users/{user}/update', 'UserController@update')->name('user.profile.update');
    Route::delete('/admin/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');
});

// Route::middleware('role:Admin')->group(function () {
Route::middleware('role:Admin', 'auth')->group(function () {
    Route::get('/admin/users', 'UserController@index')->name('users.index');
    Route::put('/admin/users/{user}/attach', 'UserController@attach')->name('user.role.attach');
    Route::put('/admin/users/{user}/detach', 'UserController@detach')->name('user.role.detach');
});

// Route::middleware(['can:view,user'])->group(function () {
Route::middleware(['can:view,user', 'auth'])->group(function () {
    Route::get('/admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});


Route::middleware('role:Admin', 'auth')->group(function () {
    // Route::middleware('role:Admin')->group(function () {
    // Role routes
    Route::get('/admin/roles', 'RoleController@index')->name('roles.index');
    Route::delete('/admin/roles/{role}/destroy', 'RoleController@destroy')->name('role.destroy');
    Route::get('/admin/roles/create', 'RoleController@create')->name('role.create');
    Route::post('/admin/roles', 'RoleController@store')->name('role.store');
    Route::get('/admin/roles/{role}/edit', 'RoleController@edit')->name('role.edit');
    Route::put('/admin/roles/{role}/update', 'RoleController@update')->name('role.update');
    Route::put('/admin/roles/{role}/attach', 'RoleController@attach')->name('role.permission.attach');
    Route::put('/admin/roles/{role}/detach', 'RoleController@detach')->name('role.permission.detach');

    // Permission routes
    Route::get('/admin/permissions', 'PermissionController@index')->name('permissions.index');
    Route::get('/admin/permissions/create', 'PermissionController@create')->name('permission.create');
    Route::post('/admin/permissions', 'PermissionController@store')->name('permission.store');
    Route::get('/admin/permissions/{permission}/edit', 'PermissionController@edit')->name('permission.edit');
    Route::put('/admin/permissions/{permission}/update', 'PermissionController@update')->name('permission.update');
    Route::delete('/admin/permissions/{permission}/destroy', 'PermissionController@destroy')->name('permission.destroy');
});
