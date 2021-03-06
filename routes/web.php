<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap');

/* ----------------------------------------------------------------------- */

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/Frontend/');
});

/* ----------------------------------------------------------------------- */

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    includeRouteFiles(__DIR__.'/Backend/');
});

Route::get('/mail', 'MailController@index');
Route::get('', 'EventController@home')->name('home');
Route::get('event/create', 'EventController@create')->name('create');
Route::get('event/page/{id}', 'EventController@page')->name('page');
Route::get('event/manage', 'EventController@show')->name('manage');
Route::get('event/calendar', 'EventController@calendar')->name('calendar');
Route::post('event/store', 'EventController@store')->name('store001');
Route::get('event/edit/{id}', 'EventController@edit')->name('edit');
Route::post('event/update/{id}', 'EventController@update')->name('update');
Route::get('event/delete/{id}', 'EventController@destroy')->name('destroy');

//Route::get('search',array('as'=>'search','uses'=>'EventController@search'));
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'EventController@autocomplete'));
Route::post('/account', 'Frontend\User\ProfileController@update_avatar')->name('account');


Route::get('/profile', 'ProfileController@profile');
Route::post('/profile', 'ProfileController@update_avatar')->name('account');
Route::get('/mail', 'MailController@index');
/**
 *  send mail, record mail sent,
 */
Route::post('/event/email', 'EventController@email')->name('email');
Route::post('/event/request', 'RequestController@store')->name('request');
Route::get('/event/accept', 'EventController@accept')->name('accept');



Route::post('/search-data','EventController@searchData')->name('search-data');
Route::get('/nav','EventController@navbar');
Route::get('event/month', 'EventController@month')->name('month');
Route::get('event/today', 'EventController@today')->name('today');
Route::get('event/tomorrow', 'EventController@tomorrow')->name('tomorrow');
Route::get('event/week', 'EventController@week')->name('week');

Route::get('/location', function() {
    return view('event.location');
});
Route::get('test', 'EventController@test');
Route::get('event/notification/{id}', 'EventController@notification')->name('notification');
Route::get('event/destroyrequest/{id}', 'RequestController@destroy')->name('destroyrequest');
Route::get('event/user_notifications/{id}/event/{user}/user', 'EventController@user_notifications')->name('user_notifications');
Route::post('event/send/participate/', 'EventController@participate')->name('participate');
Route::get('/location', 'LocationController@location')->name('location');
Route::get('/test', 'LocationController@store')->name('store');
Route::get('/viewlocation', 'LocationController@viewlocation');


Route::get('saveEvent/{id}', 'SaveEventController@saveEvent')->name('saveEvent');

Route::get('unsaveEvent/{id}', 'SaveEventController@unsaveEvent')->name('unsaveEvent');

Route::get('saveEvent', 'SaveEventController@index')->name('savedEvent');







