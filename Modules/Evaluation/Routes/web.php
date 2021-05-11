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

        Route::group(['prefix'=>'circle'],function(){

            Route::post('store','CircleController@store');
            Route::post('new_user','CircleController@new_user');
            Route::post('delete_user','CircleController@delete_user');
            Route::post('new_question','NoteController@new_question');
            Route::post('new_scroller','NoteController@new_scroller');
            Route::put('{question_id}/edit_question','NoteController@edit_question');
            Route::put('{question_id}/edit_scroller','NoteController@edit_scroller');
            Route::get('{question_id}/delete','NoteController@destroy');

        });



        Route::group(['prefix'=>'target'],function(){

            Route::get('panel','EvaluationController@target_panel');

        });

    });
});

Route::group(['middleware'=>'CheckAdmin'],function (){
    Route::group(['prefix'=>'client'],function(){

        Route::get('/','EvaluationController@client_panel');
        Route::get('quiz','EvaluationController@client_quiz');
        Route::get('done_quiz','EvaluationController@done_quiz');
        Route::get('profile','EvaluationController@client_profile');
        Route::get('circle/{circle_id}/view','EvaluationController@client_circle');
        Route::post('/{circle_id}/submit','EvaluationController@client_submit');

    });
});



