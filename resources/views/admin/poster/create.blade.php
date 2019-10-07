<form method="post" action="{{route('admin.posters.store')}}" enctype="multipart/form-data">
    @csrf
    @include('admin.poster.partials.form')
    <div class="row justify-content-end" >
        <div class="col-6">
            @include('admin.layouts.partials.images.image-upload')
        </div>
    </div>

    @include('admin.layouts.partials.buttons.save-save-close')
</form>
