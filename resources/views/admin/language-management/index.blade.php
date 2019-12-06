@extends('admin.layouts.app')
@section('content')
    <div class="table-responsive">
        <table class="table table-hover table-condensed table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th class="w-25">@lang('admin.languages.locale')</th>
                <th>@lang('admin.languages.name')</th>
                <th>@lang('admin.languages.active')</th>

            </tr>
            </thead>
            <tbody data-url-changed="{{route('admin.language-manager.index')}}">
            @php
                $selectData = dataWithId([__('admin.power.disable'),__('admin.power.enable')]);
            @endphp
            @isset($items)
                @foreach($items as $item)

                    <tr>
                        <th width="20">{{$item->id??''}}</th>
                        <td class="w-25">
                            {{$item->locale??''}}
                        </td>
                        <td>
                            {{$item->name??''}}
                        </td>
                        <td>

                            @include('admin.layouts.partials.selects.select',
                            ['inputClass'=>'active-lang form-control', 'name'=>'active','values'=>$selectData,'check'=>$item->active??0,'props'=>'data-id="'.$item->id.'" '.'data-locale="'.$item->locale.'"'])
                            {{--                        {{$item->active??''}}--}}
                        </td>

                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    </div>
@endsection


