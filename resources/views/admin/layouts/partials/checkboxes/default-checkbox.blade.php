<div class="form-group">
    <label for="{{ $id }}" class=" control-label">{{ $title ?? '' }}</label>
    <div class="col px-0">
        <div class="check-styled ">
            <input type="checkbox" value="1" id="{{ $id }}"
                   name="{{ $name }}"
                   @if ($checked) checked="checked" @endif/>
            <label for="{{ $name }}"></label>
        </div>
    </div>
</div>
