<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('actors', 'HomeController@actors');

    Route::post('actors/add', 'ActorController@addActor');

    Route::get('actors/{actor}/edit', 'ActorController@editActor');
    Route::put('actors/{actor}/edit', 'ActorController@updateActor');

    Route::get('actors/{actor}/delete', 'ActorController@deleteActor');

});


Route::get('/home', 'HomeController@index');

Route::get('films', 'HomeController@films');
Route::get('films/{id}', 'HomeController@filmByID');

Route::get('categories', 'HomeController@categories');
Route::get('categories/{id}', 'HomeController@filmsByCategory');

Auth::routes();

