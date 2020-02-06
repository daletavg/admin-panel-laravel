<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    {!! SEOMeta::generate() !!}
    @include('public.layouts.partials.meta')
    @include('public.layouts.partials.styles')
    <title>{{$pageTitle??env('APP_NAME')}}</title>
    {!! showMeta('', 'header') !!}
</head>
<body>
@include('public.partials.header')

@yield('content')

@include('public.partials.menu')
@include('public.partials.modal')
@include('public.partials.footer')
<!--   Core JS Files   -->
@include('public.layouts.partials.scripts')
{!! showMeta('', 'footer') !!}
</body>
</html>
