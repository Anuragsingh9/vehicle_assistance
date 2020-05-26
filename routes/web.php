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

Route::get('/ss', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'mechanicController@show');

Route::get('/mechanic','mechanicController@index');
Route::post('/mechanicstore','mechanicController@store');
Route::get('/','mechanicController@show');
Route::get('/edit/{id}','mechanicController@edit');
Route::post('/update/{id}','mechanicController@update');

Route::get('/index',function(){
    return view('index');
});
Route::get('help',function(){
    return view('help');
});
Route::post('/gethelp','helpController@store');
Route::get('/helpdetails','helpController@show');
Route::post('/mechlist','mechanicController@getlist');




