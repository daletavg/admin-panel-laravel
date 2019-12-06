@extends('admin.layouts.app')
@section('content')
    <div class=" text-right">
        <a href="{{route('admin.translate.create')}}" class="btn btn-primary"
           style="color: white">@lang('admin.create')</a>
    </div>
    <ul class="nav nav-tabs mb-5" role="tablist">

        @foreach($groups as $group)

            <li role="presentation">
                <a class="{{$loop->iteration==1?'active':''}}" href="#group-{{ $group }}" role="tab"
                   data-toggle="tab">{{$group}}</a>
            </li>
        @endforeach

    </ul>
    @php
        use \App\Repository\TranslateRepository;
        $translateRepository = new TranslateRepository(app());
    @endphp

    <section class="tab-content">
        @foreach($groups as $group)
            <div role="tabpanel" class="{{$loop->iteration==1?'show active':''}} tab-pane " id="group-{{ $group }}">
                <div class="panel-body">
                    @include('admin.translates.partials.tab',['items'=>$translateRepository->whereGroupWithLang($group),'group'=>$group])
                </div>
            </div>
        @endforeach
    </section>
@endsection



