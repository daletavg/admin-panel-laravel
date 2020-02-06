@extends('admin.layouts.app')
@section('content')
    <form action="{{route('admin.stage.update',['stage'=>$edit,'subservice'=>$subservice,'service'=>$service])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admin.services.subservice.stage.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@stop
