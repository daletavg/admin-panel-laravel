@extends('admin.layouts.app')
@section('content')
    <form method="post" action="{{route('admin.news.store')}}" enctype="multipart/form-data">
        @csrf
        @include('admin.news.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@endsection
