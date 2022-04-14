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
		'prefix'=>'owner',
	], function(){
		/*dd(session()->all());*/
		Route::match(['get', 'post'], '/login', 'UserauthController@login')->name('owner');
	});

/*Route::get('/logout', function()
{
    Session::forget('username');
    return view('Owner.Auth.login');
});*/
/**
	*----------------------------------------------
	* ---  APIS ROUTES  ----  DASHBOARD
	*----------------------------------------------
*/
Route::group(['middleware' => \App\Http\Middleware\CustomAuth::class],function(){
	Route::group([
			'namespace'=>'Dashboard',
			'prefix'=>'owner',
		], function(){
			Route::get('/', 'dashboardController@index');
	});

	/**
	*----------------------------------------------
	* ---  APIS ROUTES  ----  EMPLOYEES
	*----------------------------------------------
	*/
	Route::group([
			'prefix'=>'owner', 
		], function(){

		Route::group([
				'namespace'=>'Employee',
				'prefix'=>'employees', 
			], function(){
				Route::get('/', 'employeeController@index')->name('employees');
				Route::match(['get', 'post'],'add', 'employeeController@add')->name('add');
				Route::match(['get', 'post'],'edit', 'employeeController@edit')->name('edit');
				Route::post('delete', 'employeeController@delete')->name('employees');
				Route::get('card', 'employeeController@card')->name('card');
				Route::get('card-pdf', 'employeeController@generate_pdf');
				Route::get('view', 'employeeController@detail')->name('detail');
		});
		/**
		*----------------------------------------------
		* ---  APIS ROUTES  ----  RECEPTIONIST
		*----------------------------------------------
		*/
		Route::group([
				'namespace'=>'Employee',
				'prefix'=>'receptionist', 
			], function(){
				Route::get('/', 'employeeController@index')->name('receptionist');
				Route::match(['get', 'post'],'add', 'employeeController@add')->name('add');
				Route::match(['get', 'post'],'edit', 'employeeController@edit')->name('edit');
				Route::post('delete', 'employeeController@delete')->name('employee');
				Route::get('card', 'employeeController@card')->name('card');
				Route::get('card-pdf', 'employeeController@generate_pdf');
				Route::get('view', 'employeeController@detail')->name('detail');
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
				Route::get('/', 'familyMemberController@index')->name('family');
				Route::match(['get', 'post'],'add', 'familyMemberController@add')->name('add');
				Route::match(['get', 'post'],'edit', 'familyMemberController@edit')->name('edit');
				Route::post('delete', 'familyMemberController@delete');
		});
		/**
		*----------------------------------------------
		* ---  APIS ROUTES  ----  DOCTOR
		*----------------------------------------------
		*/
		Route::group([
				'namespace'=>'Employee',
				'prefix'=>'doctor', 
			], function(){
				Route::get('/', 'employeeController@index')->name('doctor');
				Route::match(['get', 'post'],'add', 'employeeController@add')->name('add');
				Route::match(['get', 'post'],'edit', 'employeeController@edit')->name('edit');
				Route::post('delete', 'employeeController@delete')->name('doctor');
				Route::get('card', 'employeeController@card')->name('card');
				Route::get('view', 'employeeController@detail')->name('detail');
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
				Route::get('/', 'medicineController@index')->name('medicines');
				Route::match(['get', 'post'],'add', 'medicineController@add')->name('add');
				Route::get('delete', 'medicineController@delete()');
				Route::match(['get', 'post'],'edit', 'medicineController@edit')->name('edit');

		});
	});
});



