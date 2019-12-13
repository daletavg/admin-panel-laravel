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
                @include('admin.layouts.partials.inputs.default-input',['name'=>$titleName,'title'=>'Meta title','value'=>$titleValue??''])
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
                @include('admin.layouts.partials.inputs.default-textaria',['name'=>$headerName,'title'=>'Текст в head','value'=>$headerValue??''])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-textaria',['name'=>$footerName,'title'=>'Текст в footer','value'=>$footerValue??''])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-textaria',['name'=>$text_topName,'title'=>'Текст в верху страници','value'=>$text_topValue??''])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-textaria',['name'=>$text_bottomName,'title'=>'Текст в низу страници','value'=>$text_bottomValue??''])
            </div>
        </div>
    </div>
</div>
