<div>
    <div class="form-group">
        <label for="gallery" class="col-sm-2 control-label">Дополнительные фотографии</label>
        <div class="col-sm-5">
            <input type="file" name="gallery[]" id="gallery" class="filestyle" data-buttontext="Выберите изображение"
                   data-placeholder="Файла нет" accept="image/*"
                   multiple>
            <div class="bootstrap-filestyle input-group">

                                    <span class="group-span-filestyle input-group-btn" tabindex="0">

                                    </span></div>
        </div>
    </div>

    @php
        $editGallery = $edit->manyImages??null;
        $galleryImages = $editGallery->images??[];
    @endphp
    @foreach ($galleryImages as $image)
        @php
            $name = $loop->index;
        @endphp

        <div class="image-actions" id="imagable">
            @if(!is_null($image)&&FileExists($image->path))
                <div class="position-absolute w-100 d-flex justify-content-end">
                    <a class="btn btn-sm btn-danger" data-img-delete data-name="upload-{{$name}}"
                       data-id="{{$image->id}}" data-edit-id="{{$editGallery->id}}">
                        X
                    </a>
                </div>
            @endif
            <img width="150" id="upload-{{$name}}"
                 src="{{GetPathToPhoto($image->path??'',asset('img/header-logo.svg')) }}" alt="">
        </div>


    @endforeach


</div>
