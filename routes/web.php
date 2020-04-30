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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// ----- Custom login routes -----
Route::prefix('/login')->group(function(){
    // GET
    Route::get('/caretaker', 'Auth\LoginController@showCaretakerLoginForm')->name('login.caretaker.show');
    Route::get('/practitioner', 'Auth\LoginController@showPractitionerLoginForm')->name('login.practitioner.show');
    Route::get('/sponsor', 'Auth\LoginController@showSponsorLoginForm')->name('login.sponsor.show');

    // POST
    Route::post('/caretaker', 'Auth\LoginController@caretakerLogin')->name('login.caretaker');
    Route::post('/practitioner', 'Auth\LoginController@practitionerLogin')->name('login.practitioner');
    Route::post('/sponsor', 'Auth\LoginController@sponsorLogin')->name('login.sponsor');
});

// ----- Custom register routes -----
Route::prefix('/register')->group(function(){
    // GET
    Route::get('/caretaker', 'Auth\RegisterController@showCaretakerRegisterForm')->name('register.caretaker.show');
    Route::get('/practitioner', 'Auth\RegisterController@showPractitionerRegisterForm')->name('register.practitioner.show');
    Route::get('/sponsor', 'Auth\RegisterController@showSponsorRegisterForm')->name('register.sponsor.show');

    // POST
    Route::post('/caretaker', 'Auth\RegisterController@createCaretaker')->name('register.caretaker');
    Route::post('/practitioner', 'Auth\RegisterController@createPractitioner')->name('register.practitioner');
    Route::post('/sponsor', 'Auth\RegisterController@createSponsor')->name('register.sponsor');
});

// ----- Admin Routes -----
Route::middleware('auth')->group(function(){
    Route::view('/admin', 'admin')->name('admin.home');
});

// ----- Caretakers Routes -----
Route::middleware('auth:caretaker')->group(function(){
    Route::view('/caretaker', 'caretaker', ['url' => 'caretaker'])->name('caretaker.home');
});

// ----- Practitioners Routes -----
Route::middleware('auth:practitioner')->group(function(){
    Route::view('/practitioner', 'practitioner', ['url' => 'practitioner'])->name('practitioner.home');
});

// ----- Sponsors Routes -----
Route::middleware('auth:sponsor')->group(function(){
    Route::view('', 'sponsor', ['url' => 'sponsor'])->name('sponsor.home');
});

// ----- Resources Routes -----
Route::prefix('/sponsors')->group(function(){
    Route::get('', 'SponsorController@index')->name('sponsors.index');
    Route::get('sponsors/{id}', 'SponsorController@show')->name('sponsors.show');
});

// ----- Public Profiles -----
Route::get('caretakers/{id}', 'CaretakerController@show');
Route::get('practitioners/{id}', 'PractitionerController@show');
