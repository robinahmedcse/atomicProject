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

//////////////////////*************checkbox*************/////////////////////////
route::get('/checkbox','checkbox@home');
route::post('/checkbox/save/data','checkbox@saveData');
route::get('/checkbox/manage','checkbox@show');
route::get('/checkbox/edit/{id}','checkbox@edit');
route::post('/checkbox/update/data','checkbox@updateData');
route::get('/checkbox/delete/{id}','checkbox@deleteData');


//////////////////////*************Image*************/////////////////////////
route::get('/profile/picture','image@home');
route::post('/profile/picture/save/data','image@saveData');
route::get('/profile/picture/manage','image@show');

route::get('/profile/picture/view/pdf/{id}','image@viewsPdf');
route::get('/profile/picture/download/pdf/{id}','image@downloadPdf');

route::get('/profile/picture/edit/{id}','image@edit');
route::post('/profile/picture/update/data','image@updateData');
route::get('/profile/picture/delete/{id}','image@deleteData');


