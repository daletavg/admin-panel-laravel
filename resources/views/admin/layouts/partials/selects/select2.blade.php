<div>
    <label for="{{$name ?? ''}}">{{$title ?? ''}}</label>
    <select class="{{ $inputClass ?? ''  }}" id="{{$name ??''}}" name="{{$name??''}}" {!! $props ?? '' !!}>
        @isset($values)
            @foreach($values as $value)
                @if(isset($check) && $check == $value['id'])
                    <option selected value="{{$value['id']}}">{{$value['value']}}</option>
                @else
                    <option value="{{$value['id']}}">{{$value['value']}}</option>
                @endif
            @endforeach
        @endisset
    </select>
</div>
