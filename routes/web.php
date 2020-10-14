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
        return view('login');
    });

    Route::resource('user', 'UserController');
    Route::resource('company', 'CampanyController');
    Route::resource('employee', 'EmployeesController');
    
});


Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::group(['middleware' => ['admin']], function () {
        
        Route::post('/profile/{id}', 'ProfileController@show')->name('profile');
        Route::get('/settings', 'HomeController@showSettings')->name('settings');

    });

    Route::get('/company/all', 'CampanyController@showAll')->name('companies.all');
    Route::get('/employee/all', 'EmployeesController@showAll')->name('employees.all');
    
    

});

Route::get('/test', 'CampanyController@showAll');

