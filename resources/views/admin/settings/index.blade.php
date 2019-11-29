@extends('admin.layouts.app')
@section('content')
<form method="post" action="{{route('admin.settings.update-all')}}">
    @csrf
    @method('put')

    <ul class="nav nav-tabs mb-5" role="tablist">
        @foreach($groupSettings as $item)

            <li role="presentation">
                <a {!! $loop->iteration==1?'class="active"':'' !!} href="#data{{$item->name_key}}" role="tab"
                   data-toggle="tab">{{$item->name}}</a>
            </li>
        @endforeach


        {{--        <li role="presentation"><a href="#groupAdd" role="tab"--}}
        {{--                                   data-toggle="tab">Добавление в группу</a></li>--}}

    </ul>
    <section class="tab-content">
        @foreach($groupSettings as $item)
            <div role="tabpanel" class="tab-pane {!! $loop->iteration==1?'active':'' !!}" id="data{{$item->name_key}}">
                <div class="panel-body">
                    <div class="row">
                        @foreach($item->settings as $setting)
                            <?php /*todo make check type input */ ?>

                            @if($setting->has_lang_data)
                                <div class="col-md-6">
                                    @php
                                        $langs = \App\Repository\LanguageRepository::getAllLocales()->toArray();
                                    @endphp
                                    @forelse($setting->langs as $lang)
                                        @include('admin.layouts.partials.inputs.default-input',['name'=>$setting->name_key.'['.$langs[$loop->index]['locale'].'][data]','title'=>$setting->name.' - '.$langs[$loop->index]['locale'].'','value'=>$lang->data??''])
                                    @empty
                                        @include('admin.layouts.partials.inputs.default-input',['name'=>$setting->name_key.'[ru][data]','title'=>$setting->name.' - ru','value'=>''])
                                        @include('admin.layouts.partials.inputs.default-input',['name'=>$setting->name_key.'[uk][data]','title'=>$setting->name.' - uk','value'=>''])
                                        @include('admin.layouts.partials.inputs.default-input',['name'=>$setting->name_key.'[en][data]','title'=>$setting->name.' - en','value'=>''])
                                    @endforelse
                                </div>
                            @else
                                <div class="col-md-6">
                                    @include('admin.layouts.partials.inputs.default-input',['name'=>$setting->name_key,'title'=>$setting->name,'value'=>$setting->data])
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach


        {{--        <div role="tabpanel" class="tab-pane active" id="dataDefault">--}}
        {{--            <div class="panel-body">--}}
        {{--                @include('admin.group.partials.form')--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div role="tabpanel" class="tab-pane " id="groupAdd">--}}
        {{--            <div class="panel-body">--}}
        {{--                @include('admin.group.partials.add-group')--}}
        {{--            </div>--}}
        {{--        </div>--}}

    </section>
    @include('admin.layouts.partials.buttons.save')
    {{--        <div class="card">--}}
    {{--            <div class="card-header">--}}
    {{--                <h4 class="card-title">Контакты</h4>--}}
    {{--            </div>--}}
    {{--            <div class="m-4">--}}
    {{--                @dd($settings)--}}
    {{--                <div class="row">--}}
    {{--                    @foreach($settings as $setting)--}}
    {{--                        @if($setting['type']=='input')--}}
    {{--                            <div class="col-md-6">--}}
    {{--                                @include('admin.layouts.partials.inputs.default-input',['name'=>$setting['key'],'title'=>$setting['name'],'value'=>$setting['data']])--}}
    {{--                            </div>--}}
    {{--                        @endif--}}

    {{--                    @endforeach--}}
    {{--                </div>--}}
    {{--                <hr>--}}
    {{--                @include('admin.layouts.partials.buttons.save')--}}


    {{--            </div>--}}
    {{--        </div>--}}
</form>
@endsection
