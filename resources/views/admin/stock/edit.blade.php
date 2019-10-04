<form method="post" action="{{route('admin.stocks.update',$edit)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    @include('admin.stock.partials.form')
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                @include('admin.layouts.partials.images.image',['name'=>'image','title'=>'Изображение'])
            </div>
            <div class="col-6">
                @include('admin.layouts.partials.images.image-upload')
            </div>
        </div>
    </div>
    @include('admin.layouts.partials.buttons.save-save-close')
</form>


