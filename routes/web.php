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
    return view('login');
})->middleware('guest');

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::get('/settings', 'HomeController@showSettings')->name('settings');

    Route::group(['middleware' => ['admin']], function () {
    
        Route::post('/profile/{id}', 'ProfileController@show')->name('profile');

    });

    Route::get('/company/all', 'CampanyController@showAll')->name('companies.all');
    Route::get('/employee/all', 'EmployeesController@showAll')->name('employees.all');
    
    Route::resource('company', 'CampanyController');
    Route::resource('employee', 'EmployeesController');

});

Route::get('/test', 'CampanyController@showAll');

