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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function() {
    Route::group(['namespace' => 'Front'], function () {
        Route::get('/', 'IndexController@index')->name('home.index');
        Route::get('/show-more','IndexController@showMore')->name('home.show-more');
        //Route::get('/events', 'EventsController@index')->name('events.index');
        Route::get('/event/search','EventsController@search')->name('events.search');
        Route::get('/event/{url}', 'EventsController@show')->name('events.show');

        Route::get('/about', 'AboutController@index')->name('about.index');
        Route::get('/history', 'HistoryController@index')->name('history.index');
        Route::get('/partners', 'PartnersController@index')->name('partners.index');
        Route::get('/services', 'ServicesController@index')->name('services.index');
    });
});
Route::post('/send','Mail\MailController@send')->name('mail.send');







@include ('web_admin.php');
