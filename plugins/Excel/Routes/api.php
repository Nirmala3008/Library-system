<?php

//Route::get('/', 'HomeController@index');


Route::apiResource('customers', 'CustomerController');
//Route::apiResource('categories', 'CategoryController');

//Route::apiResource('registrations', 'RegistrationController');
Route::apiResource('products', 'ProductController');
Route::apiResource('documents', 'DetailController');
Route::get('/categories','HomeController@categories');
Route::get('/statuses','HomeController@statuses');
Route::get('/registrations','HomeController@registrations');

Route::apiResource('students', 'StudentController');
Route::get('/states','StudentController@states');
Route::get('/regions','StudentController@regions');

//Route::apiResource('states', 'StateController');
//Route::apiResource('regions', 'RegionController');
//Route::apiResource('libraries', 'LibraryController');
//Route::apiResource('standards', 'StandardController');

Route::apiResource('subjects', 'SubjectController');
Route::apiResource('bookissues', 'BookissueController');