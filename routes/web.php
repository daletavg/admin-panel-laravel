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
Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::group(['namespace' => 'Front'], function () {
        Route::get('/', 'IndexController@index')->name('home');
        Route::get('/about', 'AboutController@index')->name('about');
        Route::post('/testimonial', 'AboutController@testimonial')->name('about.testimonial');
        Route::get('/news', 'NewsController@index')->name('news');
        Route::get('/news/{url}', 'NewsController@show')->name('news.show');
        Route::get('/contacts', 'ContactController@index')->name('contact');
        Route::get('/service/{url}', 'ServicesController@index')->name('services');

    });
});
Route::post('/send', 'Mail\MailController@send')->name('mail.send');


@include('web_admin.php');
