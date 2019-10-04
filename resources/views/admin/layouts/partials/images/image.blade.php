@isset($edit)

    <?php /** @var $edit \App\Models\Model */ ?>
    @php
        $image = $edit->getAttribute('images')->first() ?? null;
    @endphp

        <div class="form-group">
            <label for="{{$name}}" class="control-label">{{$title}}</label>
            <div class="col" id="{{$name}}">
                <div class="image-actions" id="imagable">

                    @if(!is_null($image)&&FileExists($image->path))
                    <div class="position-absolute w-100 d-flex justify-content-end">
                        <a class="btn btn-sm btn-danger" data-img-delete data-name="upload-{{$name}}" data-id="{{$image->id}}" data-edit-id="{{$edit->id}}">
                            X
                        </a>
                    </div>
                    @endif
                    <img width="150" id="upload-{{$name}}" src="{{GetPathToPhoto($image->path??'',asset('img/header-logo.svg')) }}" alt="">
                </div>
            </div>
        </div>

@endisset


