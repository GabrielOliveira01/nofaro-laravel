<?php

$api = app('Dingo\Api\Routing\Router');

$router->addRoute(['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'], '/', function () {
    return response()->json(
        array(
            'message' => 'No token provided!',
            'data' => null
        ),
        401
    );
});

$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers\App', 'middleware' => 'throttle:10,1'], function ($api) {
        $api->group(['prefix' => 'hash'], function ($api) {
            $api->post('/', 'hash@store');
            $api->get('/', 'hash@show');
        });
    });
});
