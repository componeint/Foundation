<?php

Route::group(['middleware' => 'web', 'prefix' => 'foundation', 'namespace' => 'App\\Components\Foundation\Http\Controllers'], function() {
    Route::get('/', 'FoundationController@index');
});
