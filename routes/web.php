<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/items/create', 'items.show')->name('items.show');
Route::view('/items/show', 'items.create')->name('items.create');
