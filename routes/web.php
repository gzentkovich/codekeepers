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

Route::get('/admin', function() {
    return view('admin.index');
});


/* 
 * Admin Routes
 * 
 */
//Route::resource('admin/users', 'AdminUsersController');
Route::get('admin/users', 'AdminUsersController@index')->name('users.index');
Route::get('admin/users/{user}', 'AdminUsersController@show')->name('users.show');
Route::get('admin/users/{user}/edit', 'AdminUsersController@edit')->name('users.edit');
Route::put('admin/users/{user}', 'AdminUsersController@update')->name('users.update');
Route::delete('admin/users/{user}', 'AdminUsersController@destroy')->name('users.destroy');
