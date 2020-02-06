@extends('admin.layouts.app')
@section('content')
    <form method="post" action="{{route('admin.clients.update',$edit)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admin.clients.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@endsection
