<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/client', 'ClientController@index')->name('client');
Route::post('/client', 'ClientController@create');

Route::get('/invoice', 'InvoiceController@index')->name('invoice');
Route::post('/invoice', 'InvoiceController@create');
Route::get('/invoice/view', 'InvoiceController@show')->name('view_invoice');

Route::get('/payment','PaymentController@index');
Route::get('/pay/{id}','PaymentController@pay');
Route::post('/payment', 'PaymentController@store');