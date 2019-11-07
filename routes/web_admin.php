<?php

Route::group(['prefix'=>'admin','namespace'=>'admin','as'=>'admin.'],function() {

    Route::group(['namespace'=>'Auth'],function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login.show');
        Route::post('login', 'LoginController@login')->name('login.login');
        Route::post('logout', 'LoginController@logout')->name('logout');
    });
    Route::group(['middleware'=>'auth'],function (){
        Route::get('/', 'IndexController@index')->name('index');
        Route::get('/clear-cache', 'IndexController@clearCache')->name('index.clear-cache');


        Route::resource('/tour','GroupController',['except'=>['show']]);

        Route::resource('/posters','PosterController',['except'=>['show']]);
        Route::get('/leave-group','PosterController@leaveGroup')->name('posters.leave-group');

        Route::get('/city-places','PosterController@getCityPlaces')->name('posters.city-places');
        Route::resource('/partners','PartnerController',['except'=>['show']]);
        Route::resource('/cities','CityController',['except'=>['show']]);
        Route::group(['as'=>'about.'], function () {
            Route::get('/about', 'AboutController@index')->name('index');
            Route::put('/about', 'AboutController@update')->name('update');
        });


        Route::group(['as'=>'profile.'],function () {
            Route::get('profile', 'ProfileController@index')->name('index');
            Route::put('profile/update-user-data/{user}', 'ProfileController@updateUserData')->name('update.data');
            Route::put('profile/update-user-password/{user}', 'ProfileController@updateUserPassword')->name('update.password');
        });
        Route::group(['as'=>'settings.'],function () {
            Route::get('settings', 'SettingsController@index')->name('index');
            Route::put('settings', 'SettingsController@update')->name('update-all');
        });

        Route::group(['as'=>'seo.','namespace'=>'Seo'],function () {
            Route::resource('/meta','MetaController');
        });

        Route::group(['prefix'=>'ajax'],function () {
            Route::post('delete-image', 'AjaxController@deleteImage')->name('ajax.deleteImage');
            Route::post('sort', 'AjaxController@sort')->name('sort');
            Route::post('group','AjaxController@group')->name('ajax.group');
        });
    });



});

