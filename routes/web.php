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
Route::get("/","HomeController@index");

Route::get('word', 'HomeController@words');
Route::get('word/{word_id}/{category_id}', 'HomeController@descriptionByWordAndCategoryID');

Route::get('/{id}', 'HomeController@getWordsByCategory');
Route::any('search', 'HomeController@getWordsByName');

Auth::routes();