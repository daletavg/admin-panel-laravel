<div class="card p-2">
    <div class="m-4">
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-input',['name'=>'title','title'=>'Название'])
            </div>
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-textaria',['name'=>'description','title'=>'Название'])
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.checkboxes.active-checkbox')
    </div>
</div>
