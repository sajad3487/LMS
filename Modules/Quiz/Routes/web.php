<?php

Route::group(['middleware'=>'CheckUser'],function (){
    Route::group(['prefix'=>'quizzes'],function (){

        Route::get('/','QuizController@index');
        Route::get('/create','QuizController@create');
        Route::post('/store','QuizController@store');
        Route::get('/{quiz_id}/edit','QuizController@edit');

    });

    Route::group(['prefix'=>'questions'],function (){

        Route::get('/{quiz_id}/create','QuestionController@create');
        Route::post('/store','QuestionController@store');
        Route::get('/{question_id}/edit','QuestionController@edit');

    });

    Route::group(['prefix'=>'options'],function (){

        Route::post('/store','OptionController@store');
        Route::put('/{option_id}/update','OptionController@update');

    });

});
