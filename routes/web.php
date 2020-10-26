<?php

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

Route::get('/', 'TsubuyakiController@index');

Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::get('logout','Auth\LoginController@logout')->name('logout.get');


Route::group(['middleware'=>['auth']],function(){
    Route::resource('users','UsersController');
    Route::resource('tsubuyakis','TsubuyakiController');
    
    Route::group(['prefix'=>'user/{id}'],function(){
        Route::post('follow','OmoibitoController@store')->name('omoibito.follow');
        Route::delete('unfollow','OmoibitoController@destroy')->name('omoibito.unfollow');
        Route::get('followings','OmoibitoController@followings')->name('omoibito.followings');
        Route::get('followers','OmoibitoController@followers')->name('omoibito.followers');
        Route::get('sasatteru','UsersController@sasatteru')->name('users.sasatteru');
    });
    Route::group(['prefix'=>'tsubuyakis/{id}'],function(){
        Route::post('sasatta','SasattaController@store')->name('sasatta.sasatta');
        Route::delete('mouii','SasattaController@destroy')->name('sasatta.mouii');
    });
});

    