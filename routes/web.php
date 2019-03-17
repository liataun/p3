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

Route::get('/', 'CitationController@index');
Route::get('/citation', 'CitationController@buildCitation');

/**
 * Practice
 */
if (config('app.debug') == true) {
    Route::any('/practice/{n?}', 'PracticeController@index');
}