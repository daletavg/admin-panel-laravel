{{--@php--}}
{{--    $props =" data-multiple-dates='3'--}}
{{--    data-multiple-dates-separator=', '--}}
{{--    data-position='right top'";--}}
{{--@endphp--}}
{{--@include('admin.layouts.partials.inputs.default-input',['outputLabel'=>false,'props'=>$props,'name'=>'date','inputClass'=>'datepickr-inline'])--}}
@php
    $value = $value??'';
    $value = isset($edit)?$edit->getAttribute($name??'date')->format($format??'d.m.Y H:m'):$value;
    echo $value ;
@endphp
<div class="form-group">
    @isset($title)
        <label for="{{$name??''}}">{{$title??''}}</label>
    @endisset
    @if(isset($type) && $type === 'text')
        <input type='text' class='datepicker-here form-control' data-url="{{$url??''}}" value="{{$value}}" name="{{$name??'date'}}" {!! $props??'' !!}
        data-language='{{getCurrentLocale()}}' />
    @else
        <div class="datepicker-here" data-url="{{$url??''}}" name="{{$name??'date'}}" {!! $props??'' !!}
        data-language='{{getCurrentLocale()}}'></div>
    @endif
</div>
