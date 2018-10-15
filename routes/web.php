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


Auth::routes();

// Route::get('/chained_dopdown/getCities/{param}','HomeController@getCities');

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/getTo/{param}','HomeController@getTo');
Route::get('available/getTo/{param}','HomeController@getTo');
Route::get('/send/email', 'HomeController@mail');
// Route::get('/available','HomeController@getTo');
Route::post('/available', 'HomeController@available')->name('available');
Route::post('/booking', 'HomeController@booking')->name('booking');
Route::post('/payment', 'HomeController@payment')->name('payment');
Route::post('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/dashboard', 'AdminController@index')->name('admin-dashboard');
  Route::get('/transaksi', 'AdminController@transaksi')->name('admin-transaksi');
  Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

});
