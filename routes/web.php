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
Route::get('/test', function (){
  return view('test');
});

Route::get('ajax', function(){
  return view('message');
});
Route::post('/getmsg', 'AjaxController@index');

Route::get('/getTo/{param}','HomeController@getTo');
Route::get('available/getTo/{param}','HomeController@getTo');
Route::get('/send/email', 'HomeController@mail');
Route::get('/destinasi', function() {
  return view('destinasi');
})->name('menu-destinasi');
Route::get('/facility', function() {
  return view('fasilitas');
})->name('menu-fasilitas');
Route::get('/snorkeling', function() {
  return view('snorkeling');
})->name('snorkeling-bali');

Route::post('snorkeling/book-snorkeling', 'HomeController@book_snorkeling')->name('book-snorkeling');
Route::post('snorkeling/book-snorkeling/process', 'HomeController@process_book_snorkeling')->name('process-book-snorkeling');

Route::get('/check_status', 'HomeController@check_status')->name('check_status');
Route::get('/check_booking', 'HomeController@check_booking')->name('check_booking');
// Route::get('/available','HomeController@getTo');
Route::post('/available', 'HomeController@available')->name('available');
Route::post('/booking', 'HomeController@booking')->name('booking');
Route::post('/payment', 'HomeController@payment')->name('payment');
Route::post('/check_status', 'HomeController@post_check_status')->name('post_check_status');
Route::post('/check_booking', 'HomeController@post_check_booking')->name('post_check_booking');
Route::get('/myorder', 'UserController@userOrder')->name('user.order');
Route::post('/myorder/{id}', 'UserController@userOrderDtl')->name('user.orderDtl');

Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admnjtindopage')->group(function(){
  Route::get('/test','AdminController@test_admin');


  Route::get('/lap_trs','AdminController@lap_trs')->name('lap-trs');
  Route::post('/lap_trs','AdminController@lap_trs_search')->name('lap-trs-search');

  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/dashboard', 'AdminController@index')->name('admin-dashboard');

  Route::prefix('transaksi')->group(function() {
    {
      Route::get('/', 'AdminController@transaksi')->name('admin-transaksi');
      Route::get('/edit/{id}', 'AdminController@edit')->name('edit-trs');
      Route::patch('/update/{id}', 'AdminController@update')->name('p-edit-trs');
      Route::delete('/delete/{id}', 'AdminController@destroy')->name('delete-trs');
    }
  });


  Route::prefix('kapal')->group(function() {
    {
      Route::get('/', 'AdminController@view_kapal')->name('kapal');
      Route::get('/add', 'AdminController@form_kapal')->name('kapal-form');
      Route::post('/add', 'AdminController@add_kapal')->name('p-kapal-form');

      Route::get('/edit/{id}', 'AdminController@edit_form_kapal')->name('edit-kapal');
      Route::patch('/update/{id}', 'AdminController@proses_edit_form_kapal')->name('p-edit-kapal');
      Route::delete('/delete/{id}', 'AdminController@destroy_kapal')->name('delete-kapal');
    }
  });

  Route::prefix('penumpang')->group(function() {
    Route::get('/', 'AdminController@penumpang')->name('trs-penumpang');
    Route::post('/sendEmailTiket', 'AdminController@sendEmailTiket')->name('send-email-tiket-cust');
  });

  Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  Route::get('/downloadPDF/{id}','AdminController@downloadPDF');


});
