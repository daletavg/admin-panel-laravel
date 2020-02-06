@extends('admin.layouts.app')
@section('content')
    <form action="{{route('admin.subservices.store',['service'=>$service])}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.services.subservice.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@stop
