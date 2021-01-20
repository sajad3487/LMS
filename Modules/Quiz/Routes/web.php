<?php

Route::group(['middleware'=>'auth'],function(){
    Route::group(['middleware'=>'CheckUser'],function (){
        Route::group(['prefix'=>'quizzes'],function (){

            Route::get('/','QuizController@index');
            Route::get('/create','QuizController@create');
            Route::post('/store','QuizController@store');
            Route::get('/{quiz_id}/edit','QuizController@edit');
            Route::put('/{quiz_id}/update','QuizController@update');
            Route::get('/{quiz_id}/copy','QuizController@copy');

        });

        Route::group(['prefix'=>'questions'],function (){

            Route::get('/{quiz_id}/create','QuestionController@create');
            Route::post('/store','QuestionController@store');
            Route::get('/{question_id}/edit','QuestionController@edit');
            Route::put('/{question_id}/update','QuestionController@update');
            Route::get('/{question_id}/delete','QuestionController@destroy');
            Route::get('/{question_id}/copy','QuestionController@copy');

        });

        Route::group(['prefix'=>'options'],function (){

            Route::post('/store','OptionController@store');
            Route::put('/{option_id}/update','OptionController@update');
            Route::get('/{option_id}/delete','OptionController@destroy');

        });

    });
});

Route::group(['prefix'=>'quiz'],function (){

    Route::get('{quiz_id}/view','QuizController@view');

});
