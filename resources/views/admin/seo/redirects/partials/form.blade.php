<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'from','title'=>'FROM','value'=>$edit->from??''])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.partials.checkboxes.active-checkbox')
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'to','title'=>'TO','value'=>$edit->to??''])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.selects.select',['name'=>'code','title'=>'Код перенаправления','values'=>dataWithKeyName($codes)])
    </div>
</div>
