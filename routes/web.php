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

Route::get('/', 'HomeController@index')->name('dashboard');;

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

Route::post('/konnectArea/delete/{id}', 'KonnectAreasController@delete');

Route::post('/member/delete/{id}', 'MembersController@delete');

Route::post('member/update/{id}', 'MembersController@update');

Route::get('/members/add', 'MembersController@index')->name('addMember');

Route::get('/members/view', 'MembersController@view')->name('viewMembers');

Route::get('/members/print', 'MembersController@print')->name('printMembers');

Route::post('/members/add', 'MembersController@store');

Route::post('/members/addMultiple', 'MembersController@generate');

Route::get('/geographicalName/{id}', 'GeographicalNamesController@getAll');

Route::get('/members/{id}', 'MembersController@getAll');

Route::get('/member/{id}', 'MembersController@getMember');

Route::get('/konnectPastor/{id}', 'KonnectPastorsController@getAll');

Route::get('/konnectArea/add', 'KonnectAreasController@index')->name('addKonnectArea');

Route::post('/konnectArea/add', 'KonnectAreasController@store');

Route::post('/konnectCenter/add', 'KonnectCenterController@store');

Route::post('/konnectPastor/add', 'KonnectPastorsController@store');

Route::post('/geographicalName/add', 'GeographicalNamesController@store');

Route::get('/konnectArea/view', 'KonnectAreasController@view')->name('viewKonnectArea');

Route::get('/', 'welcomeController@index')->name('dashboard');

Auth::routes();

Route::get('/viewReport', 'ReportsController@index');
Route::get('/addReport', 'ReportsController@create');
Route::post('/addReport', 'ReportsController@store');
