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

$app->router->any("/{param?}", function($param=""){
    $response = Response::make("hello",200);
    $response->headers->set('our key', 'our value');
    return $response->headers;
});