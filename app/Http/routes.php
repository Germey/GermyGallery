<?php

    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
    */


    Route::model('event', 'App\Model\Event');

    Route::get('/', 'DisplayController@index');

    Route::group(['prefix' => 'manage'], function () {
        Route::get('/', function() {
           return Redirect::to('/manage/event');
        });
        Route::resource('event', 'EventController');
    });

