<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/* MANAGE */ 

Route::namespace('Manage')->prefix('manage')->middleware(['auth','auth.admin'])->name('manage.')->group(function(){
    Route::resource('/users', 'UserController');
    Route::resource('/notices', 'NoticesController');
    Route::resource('/database', 'DataBController');
    Route::resource('/events', 'EventController');
    
    Route::get('/users/index/pdf', 'UserController@pdf');
    Route::get('/notices/index/pdf', 'NoticesController@pdf');
});

/* OPERATIONS */

Route::namespace('Operations')->prefix('operations')->middleware(['auth','auth.admin','auth.operations'])->name('operations.')->group(function(){
    Route::get('/bookings/{id}/invoice', 'BookingController@editvoice')->name('bookings.editvoice');
    Route::get('/bookings/{id}/confirmation', 'BookingController@editconfirm')->name('bookings.editconfirm');
    Route::post('/bookings/{id}/updatevoice', 'BookingController@updatevoice')->name('bookings.updatevoice');
    Route::post('/bookings/{id}/updateconfirm', 'BookingController@updateconfirm')->name('bookings.updateconfirm');
    Route::resource('/bookings', 'BookingController');

    Route::get('/bookings/index/pdf', 'BookingController@pdf');
});

/* CUSTOMERS */

Route::namespace('Customers')->prefix('customers')->middleware(['auth','auth.admin','auth.marketing'])->name('customers.')->group(function(){
    Route::resource('/won', 'CustomerController');
    Route::resource('/tasks', 'TasksController');
    Route::resource('/completed', 'CompleteController');
    Route::resource('/opportunities', 'OppController');
    Route::resource('/leads', 'LeadsController');

    Route::get('/opportunities/index/pdf', 'OppController@pdf');
    Route::get('/won/index/pdf', 'CustomerController@pdf');
    Route::get('/tasks/index/pdf', 'TasksController@pdf');
    Route::get('/completed/index/pdf', 'CompleteController@pdf');
    Route::get('/leads/index/pdf', 'LeadsController@pdf');

});

/* ACCOUNTS */

Route::namespace('Accounts')->prefix('accounts')->middleware(['auth','auth.admin','auth.accounts'])->name('accounts.')->group(function(){
    Route::resource('/payments', 'PaymentsController');
    Route::resource('/incomes', 'IncomeController');
    Route::resource('/loans', 'LoansController');
    Route::resource('/salaries', 'SalaryController');

    Route::get('/payments/index/pdf', 'PaymentsController@pdf');
    Route::get('/incomes/index/pdf', 'IncomeController@pdf');
    Route::get('/loans/index/pdf', 'LoansController@pdf');
});

/* EMPLOYEES */

Route::namespace('Employees')->prefix('employees')->middleware(['auth','auth.admin','auth.accounts'])->name('employees.')->group(function(){
    Route::resource('/staff', 'EmployeeController');
    Route::get('/staff/index/pdf', 'EmployeeController@pdf');
});