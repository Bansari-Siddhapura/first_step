<?php

use Illuminate\Support\Facades\Route;
use Modules\ItemManager\Http\Controllers\ItemsController;

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


Route::prefix('items')->group(function () {

    Route::get('', [ItemsController::class, 'index'])->name('items.show');
    Route::get('/create/{id?}', [ItemsController::class, 'create'])->name('items.create');
    Route::post('/store', [ItemsController::class, 'store'])->name('items.store');
    Route::get('/destroy/{id}', [ItemsController::class, 'destroy'])->name('items.destroy');
});
