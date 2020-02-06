@extends('admin.layouts.app')
@section('content')
    <form method="post" action="{{route('admin.staff.store')}}" enctype="multipart/form-data">
        @csrf
        @include('admin.staff.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@endsection
