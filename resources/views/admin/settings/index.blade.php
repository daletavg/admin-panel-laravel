<div class="card">
    <div class="card-header">
        <h4 class="card-title">Контакты</h4>
    </div>
    <form method="post" action="{{route('admin.settings.update-all')}}" class="m-4">
        @csrf
        @method('put')
        <div class="row">
            @foreach($settings as $setting)
                @if($setting['type']=='input')
                    <div class="col-md-6">
                        @include('admin.layouts.partials.inputs.default-input',['name'=>$setting['key'],'title'=>$setting['name'],'value'=>$setting['data']])
                    </div>
                @endif

            @endforeach
        </div>
        <hr>
        @include('admin.layouts.partials.buttons.save')
    </form>

</div>
