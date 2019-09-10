<?php

use CloudCreativity\LaravelJsonApi\Routing\RouteRegistrar;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

JsonApi::register('default')->withNamespace('Api')->routes(function (RouteRegistrar $api) {

    /*
    |--------------------------------------------------------------------------
    | Auth Routes
    |--------------------------------------------------------------------------
    */
    $api->prefix('auth')->group(function (RouteRegistrar $api) {
        $api->post('login', 'AuthController@login');
        $api->delete('logout', 'AuthController@logout');
        $api->get('validate', 'AuthController@validate');
        $api->get('refresh', 'AuthController@refresh');
    });

    $api->prefix('password-reset')->group(function (RouteRegistrar $api) {
        $api->post('request', 'PasswordResetController@request');
        $api->get('validate/{token}', 'PasswordResetController@validate');
        $api->post('reset', 'PasswordResetController@reset');
    });

    /*
    |--------------------------------------------------------------------------
    | Resource Routes
    |--------------------------------------------------------------------------
    */
    $api->middleware('jwt.auth')->group(function (RouteRegistrar $api) {
        $api->resource('users');
        $api->resource('tags');
        $api->resource('roles');
        $api->resource('devices');
        $api->resource('candidates');
    });

});
