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

	Route::get('profile', 'UserController@index');
	Route::post('/profile/{id}', 'UserController@update');

	Route::get('/eUHome', 'EUController@index');
	Route::get('/mOHHome', 'MOHController@index');
	Route::get('/pHIHome', 'PHIController@index');
	Route::get('/rDHSHome', 'RDHSController@index');
	Route::get('/doctorHome', 'DoctorController@index');
	
	Route::get('/informing', function () {
	    return view('informing');
	});
	Route::get('/alerting', function () {
	    return view('alerting');
	});

	Route::get('/form/h544', 'H544Controller@getDesignation');
	Route::get('/form/h411a', 'H411aController@getMOHAreaAndRegNo');
	Route::get('/form/h411', 'H411Controller@getPHIRangeAndRegNo');
	Route::get('/form/h399', 'H399Controller@getMOHAreaPHIRange');
	Route::get('/officers', 'UserController@getOfficersDetails');
	
	Route::get('/myHome', 'HomeController@goToMyHome');	

	Route::resource('eU','EUController');
	Route::resource('mOH','MOHController');
	Route::resource('pHI','PHIController');
	Route::resource('rDHS','RDHSController');
	Route::resource('doctor','DoctorController');
	Route::resource('h544','H544Controller');
	Route::resource('h411a','H411aController');
	Route::resource('h411','H411Controller');
	Route::resource('h399','H399Controller');
});
