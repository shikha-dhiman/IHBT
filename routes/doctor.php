<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
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
/**
	*----------------------------------------------
	* ---  APIS ROUTES  ----  AUTH
	*----------------------------------------------
*/
	Route::group([
		'namespace'=>'Auth',
		'prefix'=>'receptionist_user',
	], function(){
		Route::match(['get', 'post'], '/login', 'UserauthController@login')->name('doctor');
	});


	/**
	*----------------------------------------------
	* ---  APIS ROUTES  ----  DASHBOARD
		*----------------------------------------------
	*/
	Route::group(['middleware' => \App\Http\Middleware\CustomDoctorAuth::class],function(){
		Route::group([
			'namespace'=>'Dashboard',
			'prefix'=>'doctor',
				], function(){
					Route::get('/', 'doctorDashboardController@index');
			});

		Route::group([
			'prefix'=>'doctor', 
		], function(){
			/**
			*----------------------------------------------
			* ---  APIS ROUTES  ----  RECEIPT
			*----------------------------------------------
			*/
			Route::group([
					'namespace'=>'Receipt',
					'prefix'=>'receipts', 
				], function(){
					Route::get('/', 'doctorReceiptController@index')->name('employees');
					Route::get('receipts', 'doctorReceiptController@list_receipt')->name('receipts');
					Route::get('detail', 'doctorReceiptController@detail')->name('view');
					Route::get('pdf', 'doctorReceiptController@viewRecipt')->name('create');
					;
					Route::get('detail-list', 'doctorReceiptController@listing')->name('detail');

					
				});
			
		});
	});

	?>