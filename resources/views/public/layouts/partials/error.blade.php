@extends('public.layouts.app')
@section('content')
    <main id="not-found-page">
        <div class="not_found__box">
            <p class="not_found__title">{{$errorCode??'404'}}</p>
            <p class="not_found__description">{{$errorMessage??'Страница не найдена'}}</p>
        </div>
    </main>
@endsection
