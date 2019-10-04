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
    Route::group(['namespace' => 'front'], function () {
        Route::get('/', 'IndexController@index')->name('home');

    });
});
Route::post('/send','Mail\MailController@send')->name('mail.send');







@include ('web_admin.php');
