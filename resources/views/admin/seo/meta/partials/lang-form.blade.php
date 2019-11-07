<div class="card p-2">
    <div class="card-header">
        <h4 class="card-title">{{$langName??''}}</h4>
    </div>
    <div class="m-4">
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-input',['name'=>$h1Name,'title'=>'h1','value'=>$h1Value??''])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-input',['name'=>$metaName,'title'=>'Meta title','value'=>$metaValue??''])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-input',['name'=>$keywordsName,'title'=>'Meta keywords','value'=>$keywordsValue??''])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-input',['name'=>$descriptionName,'title'=>'Meta description','value'=>$descriptionValue??''])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-textaria',['name'=>$headName,'title'=>'Текст в head','value'=>$headValue??''])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-textaria',['name'=>$footerName,'title'=>'Текст в footer','value'=>$footerValue??''])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-textaria',['name'=>$upTextName,'title'=>'Текст в верху страници','value'=>$upTextValue??''])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-textaria',['name'=>$downTextName,'title'=>'Текст в низу страници','value'=>$downTextValue??''])
            </div>
        </div>
    </div>
</div>
