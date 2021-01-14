<?php

Route::group(['middleware'=>'auth'],function(){
    Route::group(['middleware'=>'CheckUser'],function (){
        Route::group(['prefix'=>'segments'],function (){

            Route::get('/{quiz_id}/show','ResultController@index');
            Route::get('/{quiz_id}/create','ResultController@create');
            Route::post('/store','ResultController@store');
            Route::get('/{segment_id}/edit','ResultController@edit');
            Route::put('/{segment_id}/update','ResultController@update');
            Route::get('/{segment_id}/delete','ResultController@destroy');

        });

    });
});
