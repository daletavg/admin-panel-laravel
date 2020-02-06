@extends('admin.layouts.app')
@section('content')
    <form action="{{route('admin.stage.store',['service'=>$service,'subservice'=>$subservice])}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.services.subservice.stage.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@stop
