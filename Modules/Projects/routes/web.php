<?php

use Illuminate\Support\Facades\Route;
use Modules\Projects\Http\Controllers\ProjectsController;

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
//     Route::resource('projects', ProjectsController::class)->names('projects');
// });


Route::prefix('projects')->middleware(['auth', 'verified'])->group(function () {

    Route::get('', [ProjectsController::class, 'index'])->name('projects.show');
    Route::post('/store',[ProjectsController::class,'store'])->name('projects.store');
    Route::get('/create/{id?}', [ProjectsController::class, 'create'])->name('projects.create');
    Route::get('/destroy/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy');
});