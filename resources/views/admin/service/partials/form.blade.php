<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'title','title'=>'Заголовок'])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'title_color','title'=>'Цвет заголовка'])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'url','title'=>'URL(Ссылка)'])
    </div>
    <div class="col-md-6 d-flex flex-column justify-content-end">
        @include('admin.layouts.partials.checkboxes.active-checkbox')
    </div>
</div>
<div class="row">
<div class="col-md-12">
    @include('admin.layouts.partials.inputs.default-textaria',['name'=>'description_first','title'=>'Первое описание'])
</div>
<div class="col-md-12">
    @include('admin.layouts.partials.inputs.default-textaria',['name'=>'description_second','title'=>'Второе описание'])
</div>
</div>
@section('javascript')
    <script>
        ////dwadadwadwadwadwa
        var picker = new CP(document.getElementById('title_color'));

        picker.on("change", function(color) {
            this.source.value = '#' + color;
            document.getElementById('title').style.color = '#' + color;
        });

    </script>
@endsection
