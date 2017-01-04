<?php

Route::post('/purchases', 'PurchasesController@store');

Route::get('/', function () {
    return view('home.index');
});
