<?php

Route::group(['middleware' => 'auth'], function (){
    Route::get('/show/123', function (){
        return 'show';
    });
});

Route::get('/delete/123', function (){
    return 'delete';
});
