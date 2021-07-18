<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/run-migrations', function () {
    return Artisan::call('migrate', ["--force" => true]);
});


Auth::routes();
//Route::post('login',function (Request $request){
//        dd($request->all());
//});
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'CheckUser'], function () {
//       Route::get('/', 'HomeController@index');

        Route::get('/home', 'HomeController@index')->name('home');

        Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
            Route::get('/', 'HomeController@profile');
            Route::post('/update', 'HomeController@updateProfile');
        });

        Route::group(['prefix' => 'user'], function () {
            Route::get('/','UserController@index');
            Route::get('/{user_id}/delete','UserController@destroy');
            Route::put('/{user_id}/update','UserController@update');
            Route::put('/{user_id}/add_company','UserController@add_company');
            Route::post('store', 'HomeController@add_user');
        });

    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'CheckAdmin'], function () {
        Route::group(['prefix' => 'participant'], function () {
            Route::group(['prefix' => 'profile'], function () {
                Route::post('/update', 'HomeController@updateProfile');
            });
            Route::get('/','UserController@participant_dash');
            Route::get('/{quiz_id}/done_quiz','UserController@participant_done_quiz');
        });
    });
});


Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'CheckClient'], function () {
        Route::group(['prefix' => 'client'], function () {
            Route::group(['prefix' => 'profile'], function () {
                Route::post('/update', 'HomeController@updateProfile');
            });
        });

    });
});

Route::group(['prefix'=>'participant'],function (){
    Route::get('/login','UserController@participant_login');
});


Route::get('/', function () {
    return view('welcome');
});

