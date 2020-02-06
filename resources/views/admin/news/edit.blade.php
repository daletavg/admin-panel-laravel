@extends('admin.layouts.app')
@section('content')
    <form method="post" action="{{route('admin.news.update',$edit)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admin.news.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@endsection
