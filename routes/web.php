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

Route::Get('/user', function(){
    \Illuminate\Support\Facades\Auth::LoginUsingId(2);
});

Route::get('/', function () {
    //\Illuminate\Support\Facades\Auth::LoginUsingId(2);    
    /*if(Gate::allows('access-admin')){
        return 'Usuário com permissão Admin';
    }else{
        return "Usuário sem permissão Admin";
    }*/

    return view('welcome');
});//->middleware('can:access-admin');


    
    

Route::get('/home', function(){
    return redirect()->route('admin.home');
});

Route::group([
    'prefix' => 'admin',     
    'as' => 'admin.'
], function(){

    Auth::routes();

    Route::group(['middleware' => 'can:access-admin'], function(){
        Route::get('/home', 'HomeController@index')->name('home');
    });

    
});