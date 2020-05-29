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

use App\Sponsor;
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
Route::middleware('web')->group(function(){
    Route::view('/admin', 'admin')->name('admin.home');


     // ----- CHATIFY -----
     Route::prefix(config('chatify.path'))->group(function(){
        /**
         * -----------------------------------------------------------------
         * NOTE : There is two routes has a name (user & group),
         * any change in these two route's name may cause an issue
         * if not modified in all places that used in (e.g Chatify class,
         * Controllers, chatify javascript file...).
         * -----------------------------------------------------------------
         */


        /*
        * This is the main app route [Chatify Messenger]
        */
        Route::get('/', 'MessagesController@index')->name(config('chatify.path'));

        /**
         *  Fetch info for specific id [user/group]
         */
        Route::post('/idInfo', 'MessagesController@idFetchData');

        /**
         * Send message route
         */
        Route::post('/sendMessage', 'MessagesController@send')->name('send.message');

        /**
         * Fetch messages
         */
        Route::post('/fetchMessages', 'MessagesController@fetch')->name('fetch.messages');

        /**
         * Download attachments route to create a downloadable links
         */
        Route::get('/download/{fileName}', 'MessagesController@download')->name(config('chatify.attachments.route'));

        /**
         * Authintication for pusher private channels
         */
        Route::post('/chat/auth', 'MessagesController@pusherAuth')->name('pusher.auth');

        /**
         * Make messages as seen
         */
        Route::post('/makeSeen', 'MessagesController@seen')->name('messages.seen');

        /**
         * Get contacts
         */
        Route::post('/getContacts', 'MessagesController@getContacts')->name('contacts.get');

        /**
         * Update contact item data
         */
        Route::post('/updateContacts', 'MessagesController@updateContactItem')->name('contacts.update');


        /**
         * Star in favorite list
         */
        Route::post('/star', 'MessagesController@favorite')->name('star');

        /**
         * get favorites list
         */
        Route::post('/favorites', 'MessagesController@getFavorites')->name('favorites');

        /**
         * Search in messenger
         */
        Route::post('/search', 'MessagesController@search')->name('search');

        /**
         * Get shared photos
         */
        Route::post('/shared', 'MessagesController@sharedPhotos')->name('shared');

        /**
         * Delete Conversation
         */
        Route::post('/deleteConversation', 'MessagesController@deleteConversation')->name('conversation.delete');

        /**
         * Delete Conversation
         */
        Route::post('/updateSettings', 'MessagesController@updateSettings')->name('avatar.update');

        /**
         * Set active status
         */
        Route::post('/setActiveStatus', 'MessagesController@setActiveStatus')->name('activeStatus.set');


        /*
        * [Group] view by id
        */
        Route::get('/group/{id}', 'MessagesController@index')->name('group');

        /*
        * user view by id.
        * Note : If you added routes after the [User] which is the below one,
        * it will considered as user id.
        *
        * e.g. - The commented routes below :
        */
        // Route::get('/route', function(){ return 'Munaf'; }); // works as a route
        Route::get('/{id}', 'MessagesController@index')->name('user');
        // Route::get('/route', function(){ return 'Munaf'; }); // works as a user id
    });


});

// ----- Caretakers Routes -----
Route::middleware('auth:caretaker')->group(function(){
    // ----- Profile -----
    Route::get('/caretaker', 'CaretakerController@home')->name('caretaker.home');

    // ----- My practitioners -----
    Route::get('/caretaker/my-practitioners', 'CaretakerController@myPractitioners')->name('caretaker.practitioners');

    // ----- My calendar -----
    Route::get('/caretaker/calendar', 'CaretakerController@calendar')->name('caretaker.calendar');

    // ----- Sponsors -----
    Route::get('/sponsors/{id}', 'CaretakerController@mySponsor')->name('sponsors.show');
    Route::get('/sponsors', 'CaretakerController@mySponsor')->name('sponsors.index');
    // Route::prefix('/sponsors')->group(function(){
        // Route::view('/sponsors', 'pages.sponsors.index', ['url' => 'caretaker'])->name('sponsors.index');
        // Route::view('/sponsors/{id}', 'pages.sponsors.show', ['url' => 'caretaker', 'caretaker' => Auth::user(), 'sponsor' => Sponsor::findOrFail($id)])->name('sponsors.show');

    // });

    // ----- CHATIFY -----
    Route::prefix(config('chatify.path'))->group(function(){
        /**
         * -----------------------------------------------------------------
         * NOTE : There is two routes has a name (user & group),
         * any change in these two route's name may cause an issue
         * if not modified in all places that used in (e.g Chatify class,
         * Controllers, chatify javascript file...).
         * -----------------------------------------------------------------
         */


        /*
        * This is the main app route [Chatify Messenger]
        */
        Route::get('/', 'MessagesController@index')->name(config('chatify.path'));

        /**
         *  Fetch info for specific id [user/group]
         */
        Route::post('/idInfo', 'MessagesController@idFetchData');

        /**
         * Send message route
         */
        Route::post('/sendMessage', 'MessagesController@send')->name('send.message');

        /**
         * Fetch messages
         */
        Route::post('/fetchMessages', 'MessagesController@fetch')->name('fetch.messages');

        /**
         * Download attachments route to create a downloadable links
         */
        Route::get('/download/{fileName}', 'MessagesController@download')->name(config('chatify.attachments.route'));

        /**
         * Authintication for pusher private channels
         */
        Route::post('/chat/auth', 'MessagesController@pusherAuth')->name('pusher.auth');

        /**
         * Make messages as seen
         */
        Route::post('/makeSeen', 'MessagesController@seen')->name('messages.seen');

        /**
         * Get contacts
         */
        Route::post('/getContacts', 'MessagesController@getContacts')->name('contacts.get');

        /**
         * Update contact item data
         */
        Route::post('/updateContacts', 'MessagesController@updateContactItem')->name('contacts.update');


        /**
         * Star in favorite list
         */
        Route::post('/star', 'MessagesController@favorite')->name('star');

        /**
         * get favorites list
         */
        Route::post('/favorites', 'MessagesController@getFavorites')->name('favorites');

        /**
         * Search in messenger
         */
        Route::post('/search', 'MessagesController@search')->name('search');

        /**
         * Get shared photos
         */
        Route::post('/shared', 'MessagesController@sharedPhotos')->name('shared');

        /**
         * Delete Conversation
         */
        Route::post('/deleteConversation', 'MessagesController@deleteConversation')->name('conversation.delete');

        /**
         * Delete Conversation
         */
        Route::post('/updateSettings', 'MessagesController@updateSettings')->name('avatar.update');

        /**
         * Set active status
         */
        Route::post('/setActiveStatus', 'MessagesController@setActiveStatus')->name('activeStatus.set');


        /*
        * [Group] view by id
        */
        Route::get('/group/{id}', 'MessagesController@index')->name('group');

        /*
        * user view by id.
        * Note : If you added routes after the [User] which is the below one,
        * it will considered as user id.
        *
        * e.g. - The commented routes below :
        */
        // Route::get('/route', function(){ return 'Munaf'; }); // works as a route
        Route::get('/{id}', 'MessagesController@index')->name('user');
        // Route::get('/route', function(){ return 'Munaf'; }); // works as a user id
    });


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
// Route::prefix('/sponsors')->group(function(){
//     Route::get('', 'SponsorController@index')->name('sponsors.index');
//     Route::get('/{id}', 'SponsorController@show')->name('sponsors.show');
// });

// ----- Public Profiles -----
Route::get('caretakers/{id}', 'CaretakerController@show');
Route::get('practitioners/{id}', 'PractitionerController@show');
