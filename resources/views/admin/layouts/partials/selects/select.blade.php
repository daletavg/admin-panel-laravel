<div class="form-group">
    @if ($errors->has($name)) <p class="text-danger">{{ $errors->first($name) }}</p> @endif
    <label for="{{$name ?? ''}}">{{$title ?? ''}}</label>
    <select class="{{ $inputClass ?? 'form-control' }}" id="{{$name ??''}}" name="{{$name??''}}" {!! $props ?? '' !!}>
        @foreach($values as $value)
            @if(isset($check) && $check == $value['id'])
                <option selected value="{{$value['id']}}">{{$value['value']}}</option>
            @else
                <option value="{{$value['id']}}">{{$value['value']}}</option>
            @endif
        @endforeach
    </select>
</div>
{{--<div class="form-group">--}}
{{--    @if ($errors->has($name)) <p class="text-danger">{{ $errors->first($name) }}</p> @endif--}}

{{--    <label for="{{ $name }}" class=" control-label">{{ $title ?? '' }}</label>--}}

{{--    <input type="{{ $type ?? 'text' }}" id="{{ $name }}" name="{{ $name }}"--}}
{{--           class="{{ $inputClass ?? 'form-control' }}"--}}
{{--           autocomplete="{{ $autocomplete ?? 'off' }}"--}}
{{--           {!! $props ?? '' !!}--}}
{{--           value="{{ $value }}"--}}
{{--    >--}}
{{--</div>--}}
