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

Route::any('/','ShopController@index');
Route::any('football','FootballController@index');
Route::any('football/admin','FootballController@admin');
Route::any('football/admin/giai','FootballController@admingiai');


