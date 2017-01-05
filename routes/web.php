<?php

Route::post('/subscriptions/{plan}', 'SubscriptionController@store');

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
