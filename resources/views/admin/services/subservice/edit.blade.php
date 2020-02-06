@extends('admin.layouts.app')
@section('content')
    <ul class="nav nav-tabs mb-5" role="tablist">
        <li role="presentation">
            <a class="active" href="#dataDefault" role="tab"
               data-toggle="tab">Текущая подуслуга</a>
        </li>
        <li role="presentation">
            <a href="#subServices" role="tab"
               data-toggle="tab">Этапы работ</a></li>


    </ul>
    <section class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="dataDefault">
            <form action="{{route('admin.subservices.update',['subservice'=>$edit,'service'=>$service])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                @include('admin.services.subservice.partials.form')
                @include('admin.layouts.partials.buttons.save-save-close')
            </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="subServices">
            @include('admin.services.subservice.stage.partials.stage')
        </div>
    </section>
@stop
