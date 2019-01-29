<?php

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

Route::prefix('sistema')->group(function () {

    // Modules
    Route::post('modules/read', 'ModulesController@read');
    Route::post('modules/controllers', 'ModulesController@controllers');
});