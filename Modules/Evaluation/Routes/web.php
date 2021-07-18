<?php


Route::group(['middleware'=>'auth'],function(){
    Route::group(['middleware'=>'CheckUser'],function (){
        Route::group(['prefix'=>'evaluation'],function (){

            Route::get('/','EvaluationController@index');
            Route::get('/create','EvaluationController@create');
            Route::post('/store','EvaluationController@store');
            Route::put('/{evaluation_id}/update','EvaluationController@update');
            Route::get('/{evaluation_id}/edit','EvaluationController@edit');

            Route::group(['prefix'=>'setting'],function (){
                Route::get('email_template','NoteController@email_template_edit');
                Route::post('email_template/{note_id}/update','NoteController@email_template_update');
                Route::post('email_template/store','NoteController@email_template_store');
                Route::post('/{circle_id}/update','NoteController@circle_email_temp');
            });


            Route::get('/{quiz_id}/copy','QuizController@copy');


        });

        Route::group(['prefix'=>'circle'],function(){

            Route::post('store','CircleController@store');
            Route::post('new_user','CircleController@new_user');
            Route::post('delete_user','CircleController@delete_user');
            Route::post('{circle_id}/duplicate','CircleController@duplicate');
            Route::post('new_question','NoteController@new_question');
            Route::post('new_scroller','ScrollerController@store');
            Route::put('{scroller_id}/edit_scroller','ScrollerController@update');
            Route::get('{scroller_id}/delete_scroller','ScrollerController@destroy');
            Route::put('{question_id}/edit_question','NoteController@edit_question');
            Route::get('{question_id}/delete','NoteController@destroy');

        });


        Route::group(['prefix'=>'evaluation_result'],function(){

            Route::get('{evaluation_id}/show','EvaluationController@show');
            Route::get('{circle_id}/edit_email','EvaluationController@edit_email');
            Route::post('{circle_id}/send_user','EvaluationController@send_user');

            Route::group(['prefix'=>'report'],function (){
                Route::get('{circle_id}/show','CircleController@show_report');
                Route::post('{circle_id}/store','CircleController@store_report');
                Route::post('{report_id}/update','CircleController@update_report');
                Route::post('{circle_id}/send_client','CircleController@send_report');
            });

            Route::group(['prefix'=>'answers'],function (){
                Route::get('{circle_id}/show','CircleController@show_answers');
            });

            Route::group(['prefix'=>'message'],function(){
                Route::post('/store','MessageController@store');
            });

            Route::group(['prefix'=>'behavior'],function (){
                Route::post('/store','BehaviorController@store');
                Route::post('/template/{evaluation_id}/store','NoteController@store_behavior_template');
                Route::post('/template/{note_id}/update','NoteController@update_behavior_template');
            });


        });

        Route::group(['prefix'=>'company'],function (){
            Route::get('/','CompanyController@index');
            Route::post('/store','CompanyController@store');
            Route::put('/{company_id}/update','CompanyController@update');
            Route::get('/{company_id}/delete','CompanyController@destroy');
        });
    });
});

Route::group(['middleware'=>'CheckAdmin'],function (){
    Route::group(['prefix'=>'participant'],function(){

//        Route::get('/','EvaluationController@participant_panel');
        Route::get('quiz','EvaluationController@participant_quiz');
        Route::get('done_quiz','EvaluationController@done_quiz');
        Route::get('profile','EvaluationController@participant_profile');
        Route::get('circle/{circle_id}/view','EvaluationController@participant_circle');
        Route::post('/{circle_id}/submit','AnswerEvaluationController@store');

        Route::post('message/store','MessageController@store');
    });
});

Route::group(['middleware'=>'CheckClient'],function (){
    Route::group(['prefix'=>'client'],function(){

        Route::get('/','EvaluationController@client_panel');
        Route::get('quiz','EvaluationController@client_quiz');
        Route::get('done_quiz','EvaluationController@done_quiz');
        Route::get('profile','EvaluationController@client_profile');
        Route::get('circle/{circle_id}/view','EvaluationController@client_circle');
        Route::post('/{circle_id}/submit','AnswerEvaluationController@store');

        Route::group(['prefix'=>'journal'],function (){
            Route::post('store','NoteController@store_journal');
        });

        Route::post('message/store','MessageController@store');

    });
});

Route::group(['prefix'=>'target'],function(){

    Route::get('panel','EvaluationController@target_panel');

});

