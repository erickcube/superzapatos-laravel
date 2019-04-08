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
// Store routing
Route::post('/services/stores','StoreController@store');
Route::get('/services/stores','StoreController@index');
Route::get('/services/stores/{store}','StoreController@show');
Route::patch('/services/stores/{store}', 'StoreController@update');
Route::delete('/services/stores/{store}', 'StoreController@destroy');

// Article routing
Route::post('/services/articles','ArticleController@store');
Route::get('/services/articles','ArticleController@index');
Route::get('/services/articles/{article}','ArticleController@show');
Route::patch('/services/articles/{article}', 'ArticleController@update');
Route::delete('/services/articles/{article}', 'ArticleController@destroy');

//Stores articles routing
Route::get('/services/articles/stores/{store}','StoreArticlesController@show');
