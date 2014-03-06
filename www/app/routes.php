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

Route::any("/", array(
        'before' => 'test:12/12',
//        'after' => 'test',
        function () {
            return View::make("hello");

        }
    )
);
Route::any('shop','ShopController@index');
Route::any('shop/{function}','ShopController@{function}');

