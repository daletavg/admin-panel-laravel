@extends('admin.layouts.app')
@section('content')
    <form method="post" action="{{route('admin.stocks.store')}}" enctype="multipart/form-data">
        @csrf
        @include('admin.stocks.partials.form')
        @include('admin.layouts.partials.buttons.save-save-close')
    </form>
@endsection
