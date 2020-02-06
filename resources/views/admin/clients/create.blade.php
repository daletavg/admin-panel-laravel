@extends('admin.layouts.app')
@section('content')
    <form method="post" action="{{route('admin.clients.store')}}" enctype="multipart/form-data">
        @csrf
        @include('admin.clients.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@endsection
