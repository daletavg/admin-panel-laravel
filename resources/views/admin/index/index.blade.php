@extends('admin.layouts.app')
@section("content")
<div class="row">
    <div class="col-3">
        <a href="{{route('admin.index.clear-cache')}}" class="btn btn-danger " style="color: white">@lang('admin.general.clear_app_cache')</a>
    </div>
</div>
@endsection
