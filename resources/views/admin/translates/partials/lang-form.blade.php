<div class="card p-2">
    <div class="card-header">
        <h4 class="card-title">{{$langName??''}}</h4>
    </div>
    <div class="m-4">
        <div class="row">
            <div class="col-md-12">

                    @include('admin.layouts.partials.inputs.default-input',['name'=>$dataName,'title'=>'Заначение','value'=>$dataValue??'','inputClass'=>'form-control lang-changer'])

            </div>
        </div>
    </div>
</div>
