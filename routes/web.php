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
Route::get('/Attendance/{id}', 'AttendanceController@show');

Route::get('/viewProject', 'projectController@index');
Route::get('/addProject', 'projectController@create');
Route::post('/addProject', 'projectController@store');
Route::post('/project/delete/{id}', 'projectController@destroy');
Route::get('/project/{id}', 'projectController@show');
Route::get('/projects/{id}', 'projectController@shows');
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
Route::get('/konnectArea/edit/{id}', 'KonnectAreasController@edit')->name('editKonnectArea');
Route::delete('/konnectArea/delete/{id}', 'KonnectAreasController@destroy');
Route::post('/konnectArea/update/{id}', 'KonnectAreasController@update');
Route::get('/konnectArea/{id}', 'KonnectAreasController@show');

Route::post('/konnectCenter/add', 'KonnectCenterController@store');
Route::get('/konnectCenter/{id}', 'KonnectCenterController@show');
Route::post('/konnectCenter/update/{id}', 'KonnectCenterController@update');

Route::get('/konnectPastor/{id}', 'KonnectPastorsController@show');
Route::post('/konnectPastor/add', 'KonnectPastorsController@store');
Route::delete('/konnectPastor/delete/{id}', 'KonnectPastorsController@destroy');
Route::post('/konnectPastor/edit/{id}', 'KonnectPastorsController@update');

Route::get('/geographicalName/{id}', 'GeographicalNamesController@show');
Route::post('/geographicalName/add', 'GeographicalNamesController@store');
Route::delete('/geographicalName/delete/{id}', 'GeographicalNamesController@destroy');
Route::post('/geographicalName/edit/{id}', 'GeographicalNamesController@update');

Route::get('/konnectleader/{id}', 'KonnectLeaderController@show');
Route::post('/konnectleader/add', 'KonnectLeaderController@store');
Route::delete('/konnectleader/delete/{id}', 'KonnectLeaderController@destroy');
Route::post('/konnectleader/edit/{id}', 'KonnectLeaderController@update');

Route::get('/firsttimer/view', 'FirstTimersController@index');
Route::get('/firsttimer/add', 'FirstTimersController@create');
Route::post('/firsttimer/add', 'FirstTimersController@store');
Route::get('/firsttimer/print', 'FirstTimersController@printer');

Route::get('/viewReport', 'ReportsController@index');
Route::get('/report/excel', 'ReportsController@exportExcel')->name('excelreport');
Route::post('/report/activation', 'ReportsController@activate')->name('monthlyactivation');
Route::post('/viewReport', 'ReportsController@index')->name('filterReport');
Route::get('/excelReport', 'ReportsController@printExcel');
