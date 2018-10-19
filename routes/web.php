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



Route::get('/' , 'Todocontroller@index');

Route::post('/store','Todocontroller@store')->name('store');

Route::get('/delete/{id}', 'Todocontroller@delete')->name('delete');


