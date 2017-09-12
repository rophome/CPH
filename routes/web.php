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

Route::get('/', function () {
    return view('admin.home');
});

Route::get('/admin', function () {
    return view('admin.home');
});

//Route::get('/login', function () {
//    return view('admin.auth.login');
//});

Route::get('/charts', function () {
    return View::make('admin.charts');
});

Route::get('/tables', function () {
    return View::make('admin.table');
});

Route::get('/forms', function () {
    return View::make('admin.form');
});

Route::get('/grid', function () {
    return View::make('admin.grid');
});

Route::get('/buttons', function () {
    return View::make('admin.buttons');
});

Route::get('/icons', function () {
    return View::make('admin.icons');
});

Route::get('/panels', function () {
    return View::make('admin.panel');
});

Route::get('/typography', function () {
    return View::make('admin.typography');
});

Route::get('/notifications', function () {
    return View::make('admin.notifications');
});

Route::get('/blank', function () {
    return View::make('admin.blank');
});

Route::get('/documentation', function () {
    return View::make('admin.documentation');
});

Route::get('/stats', function() {
   return View::make('admin.stats');
});

Route::get('/progressbars', function() {
    return View::make('admin.progressbars');
});

Route::get('/collapse', function() {
    return View::make('admin.collapse');
});

Route::group(['middleware' => 'visitors'], function(){
    Route::get('/register','RegistrationController@register');
    Route::post('/register','RegistrationController@postRegister');
    Route::get('/login','LoginController@login');
    Route::post('/login','LoginController@postlogin');
    Route::get('/forgot-password','ForgotPasswordController@forgotPassword');
    Route::post('/forgot-password','ForgotPasswordController@postForgotPassword');
    Route::get('/reset/{email}/{resetCode}','ForgotPasswordController@resetPassword');
    Route::post('/reset/{email}/{resetCode}','ForgotPasswordController@postResetPassword');
});
Route::group(['middleware' =>'admin'] , function() {

    Route::get('/upload', 'UploadController@uploadForm');
    Route::post('/upload', 'UploadController@uploadSubmit');
    Route::resource('companies','CompanyController');
});

Route::get('/logout','LoginController@logout');
Route::get('/earnings','AdminController@earnings')->middleware('admin');
Route::get('/tasks','ManagerController@tasks')->middleware('manager'); // remember to register middleware class in Kernel.php
Route::get('/activate/{email}/{activationCode}','ActivationController@activate');
Route::post('/posts','PostsController@store');



