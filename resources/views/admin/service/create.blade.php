@extends('admin.layouts.app')
@section('content')
    <form method="post" action="{{route('admin.services.store')}}">
        @csrf
        @include('admin.service.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@endsection
