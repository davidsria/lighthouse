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

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@index');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/viewAttendance', 'attendanceController@index');
Route::get('/addAttendance', 'attendanceController@create');
Route::post('/addAttendance', 'attendanceController@store');

Route::get('/viewProject', 'projectController@index');
Route::get('/addProject', 'projectController@create');
Route::post('/addProject', 'projectController@store');


Route::get('/members/view', 'MembersController@view')->name('viewMembers');
Route::get('/members/add', 'MembersController@index')->name('addMember');
Route::post('/members/add', 'MembersController@store');
Route::get('/members/print', 'MembersController@print')->name('printMembers');
Route::post('/members/addMultiple', 'MembersController@generate');
Route::post('/member/delete/{id}', 'MembersController@delete');
Route::post('member/update/{id}', 'MembersController@update');
Route::get('/members/{id}', 'MembersController@getAll');
Route::get('/member/{id}', 'MembersController@getMember');

Route::get('/konnectArea/view', 'KonnectAreasController@view')->name('viewKonnectArea');
Route::get('/konnectArea/add', 'KonnectAreasController@index')->name('addKonnectArea');
Route::post('/konnectArea/add', 'KonnectAreasController@store');
Route::post('/konnectArea/delete/{id}', 'KonnectAreasController@delete');

Route::post('/konnectCenter/add', 'KonnectCenterController@store');

Route::get('/konnectPastor/{id}', 'KonnectPastorsController@getAll');
Route::post('/konnectPastor/add', 'KonnectPastorsController@store');

Route::get('/geographicalName/{id}', 'GeographicalNamesController@getAll');
Route::post('/geographicalName/add', 'GeographicalNamesController@store');


Route::get('/viewReport', 'ReportsController@index');
Route::get('/addReport', 'ReportsController@create');
Route::post('/addReport', 'ReportsController@store');
