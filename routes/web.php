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
    includeRouteFiles(__DIR__ . '/Frontend/');
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
    includeRouteFiles(__DIR__ . '/Backend/');
});
//Route::get('home', 'EventController@home')->name('home');
//Route::get('create', 'EventController@index')->name('create');
//Route::get('page', 'EventController@page');
//Route::get('manage', 'EventController@manage')->name('manage');
//Route::get('calendar', 'EventController@calendar')->name('calendar');


//Route::get('/account', 'Frontend\User\ProfileController@profile');


//Route::get('/profile', 'ProfileController@profile');
//Route::post('/profile', 'ProfileController@update_avatar')->name('account');

Route::post('/account', 'Frontend\User\ProfileController@update_avatar')->name('account');
Route::get('/test', 'MailController@index');
Route::get('home', 'EventController@home')->name('home');
Route::get('event/create', 'EventController@create')->name('create');
Route::get('event/page/{id}', 'EventController@page')->name('page');
Route::get('event/manage', 'EventController@show')->name('manage');
Route::get('event/calendar', 'EventController@calendar')->name('calendar');
Route::post('event/store', 'EventController@store')->name('store001');
Route::get('event/edit/{id}', 'EventController@edit')->name('edit');
Route::post('event/update/{id}', 'EventController@update')->name('update');
Route::get('event/delete/{id}', 'EventController@destroy')->name('destroy');

//Route::get('search', array('as' => 'search', 'uses' => 'EventController@search'));
//Route::get('autocomplete', array('as' => 'autocomplete', 'uses' => 'EventController@autocomplete'));


//Route::get('ajax',function(){
//    return view('frontend/Event/message');
//});
//Route::post('/getmsg','EventController@ind');
//Route::post('/live-search','EventController@liveSearch')->name('live-search');


Route::post('/search-data','EventController@searchData')->name('search-data');
//Route::get('/nav','EventController@navbar');
Route::get('event/month', 'EventController@month')->name('month');
Route::get('event/today', 'EventController@today')->name('today');
Route::get('event/tomorrow', 'EventController@tomorrow')->name('tomorrow');
Route::get('event/week', 'EventController@week')->name('week');

Route::get('/location', function()
{
    return view('event.location');
});