<?php

Route::group(['namespace' => 'Site'], function(){
    Route::get('/categoria/{id}', 'SiteController@categoria');
    Route::get('/categoria2/{id?}', 'SiteController@categoria2');

    Route::get('/contato', 'SiteController@contato');

    Route::get('/', 'SiteController@index');
});


