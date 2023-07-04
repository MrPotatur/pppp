<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Version 1 API routes
Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'api\V1\Admin'], function () {

    // Book resource
    Route::apiResource('books', 'BookApiController');

    // Fakultas resource
    Route::apiResource('fakultass', 'FakultasController');
    
    // Additional routes for Fakultas
    // Route definition for Fakultas resource
    Route::get('fakultas', 'FakultasController@index');
    Route::get('fakultas/{id}', 'FakultasController@show');
    Route::post('fakultas', 'FakultasController@store');
    Route::put('fakultas/{id}', 'FakultasController@update');
    Route::delete('fakultas/{id}', 'FakultasController@destroy');

});
