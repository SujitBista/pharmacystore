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

Route::get('/', 'HomeController@index');

Auth::routes();

// Route::get('addmedicine', function(){
// 	return view('addmedicine');
// })->name('addmedicine');
Route::resource('addmedicine','AddMedicineController');

Route::get('addsales', function(){
	return view('addmedicine');
})->name('addsales');

Route::resource('distributor','DistributorController');
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pdf', function(){
	return view('pdf');
});
