<?php /** @var $edit \App\Models\Model */ ?>
@php
    $value = old(inputLanguageName($name), ($value ?? (isset($edit) ? $edit->getAttribute($name) : '' ) ) );
@endphp
<div class="form-group">
    <label for="{{ $name }}" class=" control-label">{{ $title ?? '' }}</label>
    <textarea
        class="{!! $class ?? 'form-control' !!}"
        name="{{ $name }}"
        id="{{ $name }}"
            {!! $cols ?? 'cols="30"' !!}
        {!! $rows ?? 'rows="10"' !!}
        {!! $props ?? '' !!}

    >{!! $value !!}</textarea>
</div>
@php
    if (isset($props)) unset($props);
@endphp
