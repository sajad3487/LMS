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
        });

    });
});

Route::get('/', function () {
    return view('welcome');
});

