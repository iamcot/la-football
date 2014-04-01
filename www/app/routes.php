<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller('admin','ShopAdminController');
Route::controller('upload','UploadController');
Route::get('/{cat}/{product}.html','DetailsController@showDetails');
Route::get('/{cat}','ListController@showList');

Route::get('/','ShopController@getIndex');




