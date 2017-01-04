<?php

Route::post('/purchases/{product}', 'PurchasesController@store');

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
