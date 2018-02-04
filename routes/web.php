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

Route::get('/', ['as' => 'principal', 'uses' => 'BackController@index']);
//Route::resource('usuarios', 'UserController');
Auth::routes();
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
//Route::get('restaurar-contrasena', ['as' => 'change_password', 'uses' =>'LoginController@changePassword']);
//Route::post('profile/change-password', ['as' => 'postChangePassword', 'uses' => 'LoginController@postChangePassword']);
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tutores', 'TutoresController');
Route::resource('pasantes', 'PasantesController');
