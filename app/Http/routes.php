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


    Route::model('memory', 'App\Model\Memory');
    Route::model('token', 'App\Model\Token');

    Route::group(['middleware' => 'guest'], function () {
        Route::controller('image', 'ImageController');
        Route::get('/', 'DisplayController@index');
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::controller('upload', 'UploadController');
    });

    Route::group(['prefix' => 'manage', 'middleware' => 'admin'], function () {
        Route::get('/', function () {
            return Redirect::to('/manage/memory');
        });
        Route::resource('memory', 'MemoryController');
        Route::controller('memory', 'MemoryController');
        Route::controller('config', 'ConfigController');
        Route::resource('token', 'TokenController');
    });

    Route::controller('auth', 'AuthController');

