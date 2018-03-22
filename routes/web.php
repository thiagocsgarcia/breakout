<?php

use \Illuminate\Support\Facades\Gate; 
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
    //\Illuminate\Support\Facades\Auth::LoginUsingId(2);
    if(Gate::allows('access-admin')){
        return 'Usuário com permissão Admin';
    }else{
        return "Usuário sem permissão Admin";
    }
    //return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
