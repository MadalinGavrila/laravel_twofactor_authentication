<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/auth/token', 'Auth\AuthTokenController@getToken');

Route::post('/auth/token', 'Auth\AuthTokenController@postToken');

Route::get('/auth/token/resend', 'Auth\AuthTokenController@getResend');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/settings/twofactor', 'TwoFactorSettingsController@index');
    Route::put('/settings/twofactor', 'TwoFactorSettingsController@update');
});