<!DOCTYPE html>
<html lang="{{app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <title>Админпанель</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
          name="viewport"/>
    <link rel="stylesheet" href="{{ asset('css/admin/admin-main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/admin/material-dashboard.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/admin/styles.css') }}"/>
    <link rel="stylesheet" href="{{asset('css/admin/color-picker.min.css')}}">
    <script type="text/javascript" src="{{ asset( 'js/core/jquery.min.js') }}"></script>

</head>
<body>

<div class="wrapper" >

    <div class="sidebar" data-color="purple" data-background-color="white"
         data-image="">
        <div class="logo text-center">
            <a href="{{ route('home')}}" class="simple-text logo-normal">1618</a>
            <small>{{ Auth::user()->name }}</small>
        </div>
        <div class="sidebar-wrapper position-static">
            @include('admin.layouts.partials.menu')
        </div>
    </div>
    <div class="main-panel">

        @include('admin.layouts.partials.header')

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-10 offset-1 ">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">{{ $cardTitle ?? '' }}</h4>
                                </div>
                                <div class="card-body">
                                    {!! $content ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>


@include('admin.layouts.partials.styles')

@include('admin.layouts.partials.scripts')

@include('admin.layouts.partials.flash-message')
</body>
</html>
















