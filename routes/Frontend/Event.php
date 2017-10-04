<?php

Route::group(['prefix' => 'event'], function (){
    Route::get('create', 'EventController@create')->name('create');
    Route::get('page/{id}', 'EventController@page')->name('page');
    Route::get('manage', 'EventController@show')->name('manage');
    Route::get('calendar', 'EventController@calendar')->name('calendar');
    Route::post('store', 'EventController@store')->name('store001');
    Route::get('edit/{id}', 'EventController@edit')->name('edit');
    Route::post('update/{id}', 'EventController@update')->name('update');
    Route::get('delete/{id}', 'EventController@destroy')->name('destroy');
});