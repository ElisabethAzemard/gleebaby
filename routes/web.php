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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/profile', function() {
//     return view('profile');
// });

// Route::get('/chat', function() {
//     return view('chat');
// });

// Route::get('/feed', function() {
//     return view('feed');
// });

// Route::get('/calendar', function() {
//     return view('calendar');
// });
