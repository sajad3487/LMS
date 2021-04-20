<?php


Route::group(['middleware'=>'auth'],function(){
    Route::group(['middleware'=>'CheckUser'],function (){
        Route::group(['prefix'=>'evaluation'],function (){

            Route::get('/','EvaluationController@index');
            Route::get('/create','EvaluationController@create');
            Route::post('/store','EvaluationController@store');
            Route::put('/{quiz_id}/update','EvaluationController@update');
            Route::get('/{quiz_id}/edit','EvaluationController@edit');


            Route::get('/{quiz_id}/copy','QuizController@copy');

        });

    });
});
