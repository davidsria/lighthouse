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

Route::get('/', 'HomeController@index')->name('dashboard');;

Route::get('/viewAttendance', 'AttendanceController@index');
Route::get('/addAttendance', 'AttendanceController@create');
Route::post('/addAttendance', 'AttendanceController@store');
Route::get('/Attendance/print', 'AttendanceController@printer')->name('printAttendance');

Route::get('/viewProject', 'projectController@index');
Route::get('/addProject', 'projectController@create');
Route::post('/addProject', 'projectController@store');
Route::post('/project/delete/{id}', 'projectController@destroy');
Route::get('/project/{id}', 'projectController@show');
Route::post('/project/update/{id}', 'projectController@update');


Route::get('/members/view', 'MembersController@index')->name('viewMembers');
Route::get('/members/add', 'MembersController@create')->name('addMember');
Route::post('/members/add', 'MembersController@store');
Route::get('/members/print', 'MembersController@printer')->name('printMembers');
Route::post('/members/addMultiple', 'MembersController@multipleMembers');
Route::post('/member/delete/{id}', 'MembersController@destroy');
Route::post('member/update/{id}', 'MembersController@update');
Route::get('/members/{id}', 'MembersController@show');
Route::get('/member/{id}', 'MembersController@showMember');

Route::get('/konnectArea/view', 'KonnectAreasController@index')->name('viewKonnectArea');
Route::get('/konnectArea/add', 'KonnectAreasController@create')->name('addKonnectArea');
Route::post('/konnectArea/add', 'KonnectAreasController@store');
Route::post('/konnectArea/delete/{id}', 'KonnectAreasController@destroy');
Route::post('/konnectArea/update/{id}', 'KonnectAreasController@update');

Route::post('/konnectCenter/add', 'KonnectCenterController@store');
Route::get('/konnectCenter/{id}', 'KonnectCenterController@show');

Route::get('/konnectPastor/{id}', 'KonnectPastorsController@show');
Route::post('/konnectPastor/add', 'KonnectPastorsController@store');

Route::get('/geographicalName/{id}', 'GeographicalNamesController@show');
Route::post('/geographicalName/add', 'GeographicalNamesController@store');

Route::get('/konnectleader/{id}', 'KonnectLeaderController@show');
Route::post('/konnectleader/add', 'KonnectLeaderController@store');

Route::get('/firsttimer/view', 'FirstTimersController@index');
Route::get('/firsttimer/add', 'FirstTimersController@create');
Route::post('/firsttimer/add', 'FirstTimersController@store');
Route::get('/firsttimer/print', 'FirstTimersController@printer');

Route::get('/viewReport', 'ReportsController@index');
Route::get('/report/excel', 'ReportsController@exportExcel')->name('excelreport');
Route::post('/report/activation', 'ReportsController@activate')->name('monthlyactivation');
Route::post('/viewReport', 'ReportsController@index')->name('filterReport');
Route::get('/excelReport', 'ReportsController@printExcel');
