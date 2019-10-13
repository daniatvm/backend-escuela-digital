<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('access_type', 'Access_TypeController')->except('create','edit','destroy','update');
Route::resource('board_of_education', 'Board_of_EducationController')->except('create','edit','destroy');
Route::resource('class', 'ClassController')->except('create','edit');
Route::resource('class_x_employee', 'Class_x_EmployeeController')->except('create','edit');
Route::resource('employee', 'EmployeeController')->except('create','edit');
Route::resource('feedback', 'FeedbackController')->except('create','edit','update');
Route::resource('gallery', 'GalleryController')->except('create','edit','update');
Route::resource('job', 'JobController')->except('create','edit');
Route::resource('level', 'LevelController')->except('create','edit');
Route::resource('new_type', 'New_TypeController')->except('create','edit','destroy','update');
Route::resource('new', 'NewController')->except('create','edit','update');
Route::resource('school', 'SchoolController')->except('index','create','edit','destroy');
Route::post('user/authenticate', 'UserController@authenticate')->name('user.authenticate');
Route::resource('user', 'UserController')->except('create','edit');
