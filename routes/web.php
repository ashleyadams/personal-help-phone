<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::group(
    [
        'prefix' => 'caller'
    ],
    function()
    {
        Route::get('/', [
           'uses' =>  'CallerController@index'
        ]);
    }
);



$router->get('/', function () use ($router) {
    return 'personal-help-phone 1.0';
});
