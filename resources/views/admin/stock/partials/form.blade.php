<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'title','title'=>'Заголовок'])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.partials.checkboxes.active-checkbox')
    </div>
</div>
<div class="col-md-12">
    @include('admin.layouts.partials.inputs.default-textaria',['name'=>'description','title'=>'Описание'])
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'price','title'=>'Текущая цена'])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'old_price','title'=>'Старая цена'])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'tag','title'=>'Тег'])
    </div>
</div>
