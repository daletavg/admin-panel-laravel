<div class="card p-2">
    <div class="card-header">
        <h4 class="card-title">{{$langName??''}}</h4>
    </div>
    <div class="m-4">
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.partials.inputs.default-input',['name'=>$nameName,'title'=>__('admin.setvices.name'),'value'=>$nameValue??''])
            </div>
        </div>
    </div>
</div>
