@extends('admin.layouts.app')
@section('content')
    <form method="post" action="{{route('admin.testimonials.store')}}" enctype="multipart/form-data">
        @csrf
        @include('admin.testimonials.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@endsection
