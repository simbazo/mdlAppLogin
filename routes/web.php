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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

/* Routes to validate settings via the internet */
Route::group(['prefix'=>'confirm', 'namespace'=>'Shared'],function(){
	Route::get('email/{address}','ConfirmController@confirmShowEmail')->name('confirm.show.email');
	Route::get('mobile/{number}','ConfirmController@confirmShowMobile')->name('confirm.show.mobile');
});

