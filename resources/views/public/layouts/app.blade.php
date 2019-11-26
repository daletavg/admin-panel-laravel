<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    {!! SEOMeta::generate() !!}
    @include('public.layouts.partials.meta')
    @include('public.layouts.partials.styles')
    <title>{{$pageTitle??env('APP_NAME')}}</title>
    <link rel="shortcut icon" href="{{asset('img/favicon/favicon.ico')}}" type="image/x-icon">
    {!! showMeta('', 'header') !!}
</head>
<body>
@include('public.partials.header')

 {!! $content ?? ''!!}


@include('public.partials.footer')
@include('public.partials.menu')
@include('public.partials.modal')
<!--   Core JS Files   -->
@include('public.layouts.partials.scripts')
{!! showMeta('', 'footer') !!}
</body>
</html>
