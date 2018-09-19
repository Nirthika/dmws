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

use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'prevent-back-history'],function(){

	Route::get('/', function () {
	    return view('welcome');
	});

	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
});

Route::resource('eU','EUController');
Route::resource('mOH','MOHController');
Route::resource('pHI','PHIController');
Route::resource('rDHS','RDHSController');
Route::resource('doctor','DoctorController');

Route::get('/eUHome', 'EUController@index');
Route::get('/mOHHome', 'MOHController@index');
Route::get('/pHIHome', 'PHIController@index');
Route::get('/rDHSHome', 'RDHSController@index');
Route::get('/doctorHome', 'DoctorController@index');

// Route::get('/EU', 'EUController@showEURegistrationForm')->name('EU');
// Route::post('/EU', 'EUController@create')->name('EU');
		