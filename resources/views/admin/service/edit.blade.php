@extends('admin.layouts.app')
@section('content')
    <form action="{{route('admin.services.update',$edit)}}" method="post">
        @csrf
        @method('put')
        @include('admin.service.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')

    </form>
@endsection
