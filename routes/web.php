<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas de media typesDB
Route::get('media-types/insert', "MediaTypeController@showmass");
Route::post('media-types/store', "MediaTypeController@storemass");    
Route::get("masterpage", function () {
    return view('layouts.masterpage');
});
Route::prefix('imagenes')->group(function ()
{
    # code...
    Route::get('crear', 'ImageController@create');
    Route::post('guardar', 'ImageController@store');
});
Route::get('pdf',"PDFController@index");