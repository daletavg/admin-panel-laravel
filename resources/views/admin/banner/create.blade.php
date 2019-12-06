@extends('admin.layouts.app')
@section('content')
    <form method="post" action="{{route('admin.banners.store')}}" enctype="multipart/form-data">
        @csrf
        @include('admin.banner.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@endsection
