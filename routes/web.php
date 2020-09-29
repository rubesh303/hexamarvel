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

Route::get('/', 'UserController@index')->name('UserList');
Route::post('file-import', 'UserController@fileImport')->name('file-import');
Route::get('file-export', 'UserController@fileExport')->name('file-export');
Route::get('edituser', 'UserController@edituser')->name('edituser');
Route::post('Updateuser', 'UserController@Updateuser')->name('Updateuser');
Route::post('UserDelete', 'UserController@UserDelete')->name('UserDelete');
Route::get('/profileview/{user_id}', 'UserController@profileView')->name('profileView');
