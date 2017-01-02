<?php
use Dingo\Api\Routing\Router;

$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['namespace' => 'App\\Api\\Http\\Controllers', 'as' => 'api', 'middleware' => 'bindings'], function (Router $api) {
        $api->group(['as' => 'users', 'prefix' => 'users'], function (Router $api) {
            $api->get('/', ['as' => 'index', 'uses' => 'UserController@index']);
            $api->post('/', ['as' => 'store', 'uses' => 'UserController@store']);
            $api->get('/{user}', ['as' => 'show', 'uses' => 'UserController@show']);
            $api->put('/{user}', ['as' => 'update', 'uses' => 'UserController@update']);
            $api->delete('/{user}', ['as' => 'delete', 'uses' => 'UserController@delete']);
        });

        $api->group(['as' => 'accounts', 'prefix' => 'accounts'], function (Router $api) {
            $api->get('/', ['as' => 'index', 'uses' => 'AccountController@index']);
            $api->post('/', ['as' => 'store', 'uses' => 'AccountController@store']);
            $api->get('/{account}', ['as' => 'show', 'uses' => 'AccountController@show']);
            $api->put('/{account}', ['as' => 'update', 'uses' => 'AccountController@update']);
            $api->delete('/{account}', ['as' => 'delete', 'uses' => 'AccountController@delete']);
        });
    });
});
