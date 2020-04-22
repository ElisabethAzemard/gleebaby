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

Route::get('/', 'HomeController@index');

// ----- Collections of Resources -----
Route::get('sponsors', 'SponsorController@index')->name('sponsors.index');

// ----- Get 1 Element from each Resource -----
Route::get('sponsors/{id}', 'SponsorController@show')->name('sponsors.show');

// ----- Individual Users Profiles -----

// Members of the app
Route::get('caretakers/{id}', 'CaretakerController@show');
Route::get('practitioners/{id}', 'PractitionerController@show');


// Admin
// Route::get('users/{id}', 'UserController@show')->name('admin.profile');

