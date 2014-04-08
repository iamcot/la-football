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

Route::any('login',array('before'=>'guest','uses'=>'UserController@login'));
Route::any('logout','UserController@logout');
Route::get('login/fb', 'FacebookController@login');
Route::get('login/fb/callback', 'FacebookController@logincallback');
Route::controller('admin','ShopAdminController');
Route::controller('upload','UploadController');
Route::controller('cart','OrdersController');

Route::get('/{cat}/{product}.html','DetailsController@showDetails');
Route::any('/fav/{type}','ListController@showfav');
Route::any('/{cat}','ListController@showList');
Route::controller('ajax','AjaxController');

Route::get('/','ShopController@getIndex');






