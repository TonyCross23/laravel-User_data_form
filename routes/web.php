<?php

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
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


//customer

Route::group(['prefix' => 'customer'],function (){
        Route::get('register','CustomerController@register')->name('customer#register');
        Route::post('create', 'CustomerController@create')->name('customer#create');
        Route::get('list', 'CustomerController@list')->name('customer#list');
        Route::get('seeMore/{id}', 'CustomerController@seeMore')->name('customer#seeMore');
        Route::get('delete/{id}', 'CustomerController@delete')->name('customer#delete');
        Route::get('edit/{id}','CustomerController@edit')->name('customer#edit');    
    });