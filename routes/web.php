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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PagesController@index');

Route::get('/contact', 'PagesController@contact');

Route::get('/about', 'PagesController@about');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/company', 'Auth\LoginController@showCompanyLoginForm');
Route::get('/login/student', 'Auth\LoginController@showStudentLoginForm');
Route::get('/login/ngo', 'Auth\LoginController@showNgoLoginForm');
Route::get('/register/company', 'Auth\RegisterController@showCompanyRegisterForm');
Route::get('/register/student', 'Auth\RegisterController@showStudentRegisterForm');
Route::get('/register/ngo', 'Auth\RegisterController@showNgoRegisterForm');


Route::post('/login/company', 'Auth\LoginController@companyLogin');
Route::post('/login/student', 'Auth\LoginController@studentLogin');
Route::post('/login/ngo', 'Auth\LoginController@ngoLogin');
Route::post('/register/company', 'Auth\RegisterController@createCompany');
Route::post('/register/student', 'Auth\RegisterController@createStudent');
Route::post('/register/ngo', 'Auth\RegisterController@createNgo');

// Route::view('/home', 'home')->middleware('auth');
Route::view('/student', 'student');
Route::view('/company', 'company');
Route::view('/ngo', 'ngo');