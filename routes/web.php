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

Route::get('/',  'HomeController@welcome')->name('welcome');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::resource('members', 'MemberController');

    Route::resource('payments', 'PaymentController');

    Route::patch('payments.pay/{id}', 'PaymentController@pay')->name('payments.pay');
    
    Route::patch('members.restore/{id}', 'MemberController@restore')->name('members.restore');
    Route::post('members/search', 'MemberController@index')->name('members.search');
});