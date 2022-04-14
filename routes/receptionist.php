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
		Route::match(['get', 'post'], '/login', 'UserauthController@login')->name('receptionist_user');
	});


	/**
	*----------------------------------------------
	* ---  APIS ROUTES  ----  DASHBOARD
		*----------------------------------------------
	*/
	Route::group(['middleware' => \App\Http\Middleware\CustomrecepAuth::class],function(){
		Route::group([
			'namespace'=>'Dashboard',
			'prefix'=>'receptionist_user',
				], function(){
					Route::get('/', 'receptionistDashboardController@index');
			});

		Route::group([
			'prefix'=>'receptionist_user', 
		], function(){

			Route::group([
					'namespace'=>'Employee',
					'prefix'=>'employee',
				], function(){
					Route::get('/', 'receptionistEmployeeController@index')->name('employee');
					Route::match(['get', 'post'],'add', 'receptionistEmployeeController@add')->name('add');
					Route::match(['get', 'post'],'edit', 'receptionistEmployeeController@edit')->name('edit');
					Route::post('delete', 'receptionistEmployeeController@delete')->name('employee');
					Route::get('card', 'receptionistEmployeeController@card')->name('card');
					Route::get('card-pdf', 'receptionistEmployeeController@generate_pdf');
					Route::get('view', 'receptionistEmployeeController@detail')->name('detail');
			});
			/**
			*----------------------------------------------
			* ---  APIS ROUTES  ----  RECEPTIONIST
			*----------------------------------------------
			*/
			Route::group([
					'namespace'=>'Members',
					'prefix'=>'employee/family', 
				], function(){
					Route::get('/', 'receptionistFamilyController@index')->name('family');
					Route::match(['get', 'post'],'add', 'receptionistFamilyController@add')->name('add');
					Route::match(['get', 'post'],'edit', 'receptionistFamilyController@edit')->name('edit');
					Route::post('delete', 'receptionistFamilyController@delete');
			});

			/**
			*----------------------------------------------
			* ---  APIS ROUTES  ----  RECEIPT
			*----------------------------------------------
			*/
			Route::group([
					'namespace'=>'Receipt',
					'prefix'=>'receipt', 
				], function(){
					Route::get('/', 'receiptController@index')->name('employees');
					Route::get('detail-list', 'receiptController@listing')->name('detail');
					Route::match(['get', 'post'],'create_receipt', 'receiptController@createRecipt')->name('create');
					;
					Route::get('detail', 'receiptController@detail')->name('view');
					Route::get('receipt', 'receiptController@list_receipt')->name('receipt');

					Route::match(['get', 'post'],'edit', 'receiptController@edit')->name('edit');
					;
					Route::get('receipt-view', 'receiptController@receiptView')->name('receiptView');
					Route::get('pdf', 'receiptController@viewRecipt');

				});
				/**
					*----------------------------------------------
					* ---  APIS ROUTES  ----  MEDICINE
					*----------------------------------------------
				*/
				Route::group([
						'namespace'=>'Medicine',
						'prefix'=>'medicines', 
					], function(){
						Route::get('/', 'receptionistMedicineController@index')->name('receipts');
						Route::match(['get', 'post'],'add', 'receptionistMedicineController@add')->name('add');
						Route::post('add_medicines', 'receptionistMedicineController@addMedicines');
						Route::post('delete', 'receptionistMedicineController@deleteMedicines');
						Route::post('delete_rows', 'receptionistMedicineController@deleterows');
				});
		});
	});

	?>