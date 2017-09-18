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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/viewAttendance', 'attendanceController@index');
Route::get('/addAttendance', 'attendanceController@create');
Route::post('/addAttendance', 'attendanceController@store');

Route::get('/viewKonnectArea', 'welcomeController@viewKonnectArea')->name('viewKonnectArea');
Route::get('/addKonnectArea', 'welcomeController@addKOnnectArea')->name('addKonnectArea');
Route::post('/addKonnectArea', 'welcomeController@createKonnectArea');
Route::post('/addKonnectArea', 'welcomeController@createKOnnectCenter');
Route::post('/addKonnectArea', 'welcomeController@createKOnnectPastor');
Route::post('/addKonnectArea', 'welcomeController@createKOnnectGeographicalName');

Route::get('/viewMember', 'MembersController@index');
Route::get('/addMember', 'MembersController@create');
Route::post('/addMember', 'MembersController@add')->name('addMember');

Route::get('/viewProject', 'projectController@index');
Route::get('/addProject', 'projectController@create');
Route::post('/addProject', 'projectController@store');

