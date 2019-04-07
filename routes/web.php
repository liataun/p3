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

Route::redirect('/', '/home');
Route::get('/home', 'CitationController@index');
Route::get('/citation', 'CitationController@show');
Route::get('/citation/build', 'CitationController@validateCitation');

Route::get('/user', 'UserController@user');

Route::any('/practice/{n?}', 'PracticeController@index');
