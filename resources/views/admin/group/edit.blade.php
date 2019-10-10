<form method="post" action="{{route('admin.posters.update',$edit)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="panel-body">
        @include('admin.partner.partials.form')
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    @include('admin.layouts.partials.images.image',['name'=>'image','title'=>'Главное изображение'])
                </div>
                <div class="col-6">
                    @include('admin.layouts.partials.images.image-upload')
                </div>
            </div>
        </div>
    </div>


    @include('admin.layouts.partials.buttons.save-save-close')
</form>
