@extends('admin.layouts.app')
@section('content')
    <ul class="nav nav-tabs mb-5" role="tablist">
        <li role="presentation">
            <a class="active" href="#dataDefault" role="tab"
               data-toggle="tab">SEO</a>
        </li>
        <li role="presentation"><a href="#dataDefaultSeo" role="tab"
                                   data-toggle="tab">SEO по умолчанию</a></li>


    </ul>
    <section class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="dataDefault">
            @include('admin.seo.meta.partials.pages.seo-from-page')
        </div>
        <div role="tabpanel" class="tab-pane" id="dataDefaultSeo">
            @include('admin.seo.meta.partials.pages.seo-default')
        </div>
    </section>
@endsection

{{--{{$items->render()}}--}}
