<?php

//Breadcrumbs::for('home', function ($trail) {
//    $trail->push('Главная', route('home'));
//});
//
//Breadcrumbs::for('about', function ($trail) {
//    $trail->parent('home');
//    $trail->push('О нас', route('about'));
//});
//
//Breadcrumbs::for('contacts', function ($trail) {
//    $trail->parent('home');
//    $trail->push('Контакты', route('contact'));
//});
//
//Breadcrumbs::for('news', function ($trail) {
//    $trail->parent('home');
//    $trail->push('Новости', route('news'));
//});
//Breadcrumbs::for('services', function ($trail,$url) {
//    $trail->parent('home');
//    $service = App\Models\Service\Service::where('url',$url)->first();
//    $trail->push($service->getAttribute('title'), route('services',$url));
//});
//
//Breadcrumbs::for('news.show', function ($trail,$url) {
//    $trail->parent('home');
//    $news = \App\Models\News\News::where('url',$url)->first();
//    $trail->push($news->getAttribute('title'), route('news.show',$url));
//});
//
//


@include('breadcrumbs_admin.php');
