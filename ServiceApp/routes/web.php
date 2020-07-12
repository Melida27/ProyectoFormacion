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

Route::get('/', function () {
    if(Auth::user() != null){
    	return redirect('/home');
    }else{
    	return view('welcome');
    }
});

Route::resource('categories', 'CategoryController');
Route::resource('users', 'UserController');
Route::resource('departments', 'DepartmentController');
Route::resource('municipalities', 'MunicipalityController');
Route::resource('addresses', 'AddressController');
Route::resource('services', 'ServiceController');
Route::resource('orders', 'OrderController');

Route::put('users/desactivar/{id}', 'UserController@desactivar');
Route::get('get-address/{id}', 'AddressController@getAddress');
Route::post('address-account', 'AddressController@addressAccount');
Route::post('edit-user-address', 'AddressController@editUserAddress');

Route::post('users/search', 'UserController@search');

Route::get('account', 'UserController@myAccount');

Route::put('account-update/{id}', 'UserController@updateAccount');
Route::put('update-photo', 'UserController@updatePhoto');

Route::get('showCategory', 'CategoryController@show');
Route::get('showService/{id}', 'ServiceController@show');

Route::get('generate/pdf/users', 'UserController@pdf');

Route::get('/allCategories', 'HomeController@allCategories');
Route::get('/servicesbycategory/{id}', 'HomeController@servicesbycat');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('validateCurriculum');

Route::get('/curriculum', function(){
	return view('curriculum.create_curriculum');
});