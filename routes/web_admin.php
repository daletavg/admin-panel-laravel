<?php

Route::group(['prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function() {

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

        Route::group(['prefix'=>'seo','as'=>'seo.','namespace'=>'Seo'],function () {
            Route::get('/','SeoController@index')->name('index');
            Route::resource('/meta','MetaController');
            Route::post('/meta/store-default-meta','MetaController@storeDefaultMeta')->name('meta.store-default-meta');

            Route::get('/robots','RobotsController@index')->name('robots.index');
            Route::put('/robots/update','RobotsController@update')->name('robots.update');


            Route::get('/sitemap','SitemapController@index')->name('sitemap.index');
            Route::get('/sitemap/edit','SitemapController@edit')->name('sitemap.edit');
            Route::put('/sitemap/update','SitemapController@update')->name('sitemap.update');

            Route::get('/global-seo','GeneralSeoSettingsController@index')->name('global-seo.index');
            Route::put('/global-seo/update','GeneralSeoSettingsController@update')->name('global-seo.update');

            Route::resource('/redirects','RedirectsController');
        });

        Route::resource('/translate','TranslateController',['except'=>['show']]);

        Route::group(['prefix'=>'ajax'],function () {
            Route::post('delete-image', 'AjaxController@deleteImage')->name('ajax.deleteImage');
            Route::post('sort', 'AjaxController@sort')->name('sort');
            Route::post('group','AjaxController@group')->name('ajax.group');
        });
    });



});

