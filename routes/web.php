<?php

Route::get('/', 'Auth\AuthController@login')->name('login');

Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return Redirect::to("/login")
      ->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    //Visitor 
    Route::get('/add-visitor', 'VisitorController@addVisitor')->name('add-visitor');
    Route::get('/visitor-list', 'VisitorController@show')->name('visitor-list');
    Route::post('/add-visitor', 'VisitorController@store')->name('add-visitor');
    Route::post('/update-log', 'VisitorController@updateLog')->name('update-log');
    //Employee
    Route::get('/add-employee', 'EmployeeController@addEmployee')->name('add-employee');
    Route::post('/add-employee', 'EmployeeController@store')->name('add-employee');
    Route::get('/employee-list', 'EmployeeController@show')->name('employee-list');
    Route::post('/add-employee-log', 'EmployeeController@addEmployeeLog')->name('add-employee-log');
    Route::post('/update-employee-log', 'EmployeeController@updateEmployeeLog')->name('update-employee-log');
    Route::get('/employee-log-list', 'EmployeeController@employeeLogList')->name('employee-log-list');
    Route::get('/employee-log-details', 'EmployeeController@employeeLogDetails')->name('employee-log-details');
    Route::post('/employee-log-details', 'EmployeeController@LogDetails')->name('employee-log-details');
});

