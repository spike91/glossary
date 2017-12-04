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

//Route::group(['middleware' => ['auth']], function() {
    //Route::get('actors', 'HomeController@actors');

    //Route::post('actors/add', 'ActorController@addActor');

    //Route::get('actors/{actor}/edit', 'ActorController@editActor');
    //Route::put('actors/{actor}/edit', 'ActorController@updateActor');

    //Route::get('actors/{actor}/delete', 'ActorController@deleteActor');

//});

Route::get("/","HomeController@index");

Route::get('word', 'HomeController@words');
Route::get('word/{word_id}/{category_id}', 'HomeController@descriptionByWordAndCategoryID');

Route::get('/{id}', 'HomeController@getWordsByCategory');
Route::any('search', 'HomeController@getWordsByName');

Auth::routes();