<?php /** @var $edit \App\Models\Model */ ?>
@php
    $outputLabel = $labelValue ?? true;

    if($outputLabel){
        echo $value = old($name, ($value ?? (isset($edit) ? $edit->getAttribute($name) : '' ) ) );
    }

@endphp
<div class="form-group">
    @if ($errors->has($name)) <p class="text-danger">{{ $errors->first($name) }}</p> @endif

    <label for="{{ $name }}" class=" control-label">{{ $title ?? '' }}</label>

    <input type="{{ $type ?? 'text' }}" id="{{ $name }}" name="{{ $name }}"
           class="{{ $inputClass ?? 'form-control' }}"
           autocomplete="{{ $autocomplete ?? 'off' }}"
           {!! $props ?? '' !!}
           value="{{ $value }}"
    >
</div>

