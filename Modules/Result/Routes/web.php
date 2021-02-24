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

        Route::group(['prefix'=>'super_segments'],function (){

            Route::get('/{quiz_id}/show','ResultController@super_index');
            Route::get('/{quiz_id}/create','ResultController@super_create');
            Route::post('/store','ResultController@store');
            Route::get('/{segment_id}/edit','ResultController@super_edit');
            Route::put('/{segment_id}/update','ResultController@update');
//            Route::get('/{segment_id}/delete','ResultController@destroy');

        });

        Route::group(['prefix'=>'result'],function (){

            Route::get('/','AnswerQuizController@index');
            Route::get('{quiz_id}/answers','AnswerQuizController@answer_index');
            Route::get('{quiz_id}/segment_answers','AnswerQuizController@segment_answer_index');
            Route::get('{quiz_id}/users_answers','AnswerQuizController@user_answer_index');

        });

        Route::group(['prefix'=>'media'],function (){

            Route::post('/{segment_id}/store','MediaController@store');
            Route::post('/{segment_id}/delete','MediaController@destroy');

        });

    });
});


Route::group(['prefix'=>'quiz'],function (){

    Route::post('submit','AnswerQuizController@store');
    Route::get('{answer_id}/result','AnswerQuizController@show');

});

Route::group(['prefix'=>'superQuizzes'],function (){

    Route::post('submit','AnswerQuizController@super_store');
    Route::get('{answer_id}/result','AnswerQuizController@super_show');
    Route::get('{subquiz_answer_id}/subquiz_result/{answer_id}','AnswerQuizController@sub_quiz_show');

});
