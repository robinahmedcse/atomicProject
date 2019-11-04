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

Route::get('/', function () {
    return view('welcome');
});


route::get('/checkbox','checkbox@home');
route::post('/checkbox/save/data','checkbox@saveData');
route::get('/checkbox/manage','checkbox@show');
route::get('/checkbox/edit/{id}','checkbox@edit');
route::post('/checkbox/update/data','checkbox@updateData');
route::get('/checkbox/delete/{id}','checkbox@deleteData');