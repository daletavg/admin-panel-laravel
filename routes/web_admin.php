<?php

Route::group(['prefix'=>'admin','namespace'=>'admin','as'=>'admin.'],function() {

    Route::group(['namespace'=>'Auth'],function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login.show');
        Route::post('login', 'LoginController@login')->name('login.login');
        Route::post('logout', 'LoginController@logout')->name('logout');
    });
    Route::group(['middleware'=>'auth'],function (){
        Route::get('/', 'IndexController@index')->name('index');
        Route::resource('stocks', 'StockController',['except'=>['show']]);
        Route::resource('services', 'ServiceController',['except'=>['show','create','store','destroy']]);
        Route::group(['as'=>'settings.'],function () {
            Route::get('settings', 'SettingsController@index')->name('index');
            Route::put('settings', 'SettingsController@update')->name('update-all');
        });
        Route::group(['as'=>'settings.'],function () {
            Route::get('settings', 'SettingsController@index')->name('index');
            Route::put('settings', 'SettingsController@update')->name('update-all');
        });
        Route::group(['as'=>'profile.'],function () {
            Route::get('profile', 'ProfileController@index')->name('index');
            Route::put('profile/update-user-data/{user}', 'ProfileController@updateUserData')->name('update.data');
            Route::put('profile/update-user-password/{user}', 'ProfileController@updateUserPassword')->name('update.password');
        });

        Route::group(['prefix'=>'ajax'],function () {
            Route::post('delete-image', 'AjaxController@deleteImage')->name('ajax.deleteImage');
        });
    });
    Route::group(['prefix' => 'ajax'], function () {
        Route::post('/sort', 'AjaxController@sort')->name('sort');
    });


});

