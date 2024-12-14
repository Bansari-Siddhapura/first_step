<?php

use Illuminate\Support\Facades\Route;
use Modules\ItemManager\Http\Controllers\ItemManagerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group([], function () {
//     Route::resource('itemmanager', ItemManagerController::class)->names('itemmanager');
// });


Route::view('/items/show', 'itemmanager::items.show')->name('items.show');
Route::view('/items/create', 'itemmanager::items.create')->name('items.create');
