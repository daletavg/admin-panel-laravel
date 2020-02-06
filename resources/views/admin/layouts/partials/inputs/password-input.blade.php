<?php /** @var $edit \App\Models\Model */ ?>
<div class="form-group">
    @if ($errors->has($name)) <p class="text-danger">{{ $errors->first($name) }}</p> @endif

    <label for="{{ $name }}" class=" control-label">{{ $title ?? '' }}</label>

    <input type="password" id="{{ $name }}" name="{{ $name }}"
           class="{{ $inputClass ?? 'form-control' }}"
           autocomplete="{{ $autocomplete ?? 'off' }}"
           {!! $props ?? '' !!}
           value="{{ $value??old($name) }}"
    >
</div>
