@extends('admin.layouts.app')
@section('content')
    <form method="post" action="{{route('admin.testimonials.update',$edit)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admin.testimonials.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@endsection
