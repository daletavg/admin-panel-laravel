@extends('admin.layouts.app')
@section('content')
    <ul class="nav nav-tabs mb-5" role="tablist">
        <li role="presentation">
            <a class="active" href="#text" role="tab"
               data-toggle="tab">Текстовый отзыв</a>
        </li>
        <li role="presentation">
            <a href="#document" role="tab"
               data-toggle="tab">Отзыв документ</a></li>


    </ul>
    <section class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="text">
           @include('admin.testimonials.partials.tables.text-table')
        </div>
        <div role="tabpanel" class="tab-pane" id="document">
           @include('admin.testimonials.partials.tables.document-table')
        </div>
@endsection
