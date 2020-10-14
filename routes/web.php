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
Auth::routes(['register' => false]);

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

});


Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::group(['middleware' => ['admin']], function () {
        
        Route::post('/profile/{id}', 'ProfileController@show')->name('profile');
        Route::get('/settings', 'HomeController@showSettings')->name('settings');

    });

    Route::resource('user', 'UserController');

    Route::resource('company', 'CampanyController');
    Route::get('/company/{company}/delete', 'CampanyController@destroy')->name('company.delete');
    Route::get('/companies', 'CampanyController@showAll')->name('companies.all');

    Route::resource('employee', 'EmployeesController');
    Route::get('/employee/{employee}/delete', 'EmployeesController@destroy')->name('employee.delete');
    Route::get('/employees', 'EmployeesController@showAll')->name('employees.all');

});

Route::get('/test', 'CampanyController@update');

