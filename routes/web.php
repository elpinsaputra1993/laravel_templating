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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'testController@index');

Route::get('/data-tables', 'testController@datatables');


route::resource('/pertanyaan', 'PertanyaanController');
route::resource('/pertanyaantest', 'PertanyaanTestController');
// route::get('/pertanyaan', 'PertanyaanController@index');
// route::get('/pertanyaan/create', 'PertanyaanController@create');
// Route::post('pertanyaan/store', 'PertanyaanController@store');
// Route::get('/pertanyaan/{id}', 'PertanyaanController@show');
// Route::get('/pertanyaan/{id}/edit', 'PertanyaanController@edit');
// Route::put('/pertanyaan/{id}', 'PertanyaanController@update');
// Route::delete('/pertanyaan/{id}', 'PertanyaanController@destroy');
