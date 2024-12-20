<?php

use Illuminate\Support\Facades\Route;
use Modules\Clients\Http\Controllers\ClientsController;

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
//     Route::resource('clients', ClientsController::class)->names('clients');
// });

Route::prefix('clients')->middleware(['auth', 'verified'])->group(function () {

    Route::get('', [ClientsController::class, 'index'])->name('clients.show');
    Route::post('/store',[ClientsController::class,'store'])->name('clients.store');
    Route::get('/create/{id?}', [ClientsController::class, 'create'])->name('clients.create');
    Route::get('/destroy/{id}', [ClientsController::class, 'destroy'])->name('clients.destroy');
});