@extends('admin.layouts.app')
@section('content')
    <form method="post" action="{{route('admin.banners.update',$edit)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admin.banner.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@endsection
