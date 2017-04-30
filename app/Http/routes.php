<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Controlador para Generar las Multiples Rutas
Route::resource('productos','ProductosController');

// Controlador para Generar las Multiples Rutas
Route::resource('bartender','BartenderController');

// Controlador para Generar las Multiples Rutas
Route::resource('cajero','CajeroController');

// Controlador para Generar las Multiples Rutas
Route::resource('mesero','MeseroController');



Route::auth();

Route::get('/home', 'HomeController@index');
