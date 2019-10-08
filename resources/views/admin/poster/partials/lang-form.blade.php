<div class="card p-2">
    <div class="card-header">
        <h4 class="card-title">{{$langName??''}}</h4>
    </div>
    <div class="m-4">
        <div class="row">
            <div class="col-md-6">
                @include('admin.layouts.partials.inputs.default-input',['name'=>$titleName,'title'=>'Заголовок','value'=>$titleValue??''])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-textaria',['name'=>$shortDescriptionName,'title'=>'Краткое описание','value'=>$shortDescriptionValue??''])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-textaria',['name'=>$descriptionName,'title'=>'Описание','value'=>$descriptionValue??''])
            </div>
        </div>
    </div>
</div>
