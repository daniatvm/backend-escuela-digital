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

Route::resource('access_type', 'Access_TypeController');
Route::resource('board_of_education', 'Board_of_EducationController');
Route::resource('class_x_employee', 'Class_x_EmployeeController');
Route::resource('employee', 'EmployeeController');
Route::resource('feedback', 'Feedback_Controller');
Route::resource('gallery', 'GalleryController');
Route::resource('job', 'JobController');
Route::resource('level', 'LevelController');
Route::resource('new_type', 'New_TypeController');
Route::resource('new', 'NewController');
Route::resource('school', 'SchoolController');
Route::resource('user', 'UserController');
