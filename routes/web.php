<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great

|
*/

Route::get('/', 'App\Http\Controllers\GraphController@index')->name("graph.main");
Route::get('/admin', function () {
    return view('admin.home.index');
});

Route::get('/graphs/mensual', 'App\Http\Controllers\GraphControllerMensual@index')->name("graph.mensual");

Route::get('/graphs/semanal', 'App\Http\Controllers\GraphControllerSemanal@index')->name("graph.semanal");

Route::get('/graphs/actual', 'App\Http\Controllers\GraphControllerActual@index')->name("graph.actual");