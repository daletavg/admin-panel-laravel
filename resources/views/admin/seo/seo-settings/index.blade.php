<form action="{{route('admin.seo.global-seo.update')}}" method="post">
    @csrf
    @method('put')
    @php
      $yesNoData =['Нет','Да']
    @endphp
{{--    <div class="row">--}}
{{--        <div class="col-md-6">--}}
{{--            @include('admin.layouts.partials.selects.select',['check'=>checkYesNo($edit->end_slesh_redirect),'name'=>'end_slesh_redirect','title'=>'Перенаправлять со слеша на без слеша','values'=>dataWithId($yesNoData)])--}}
{{--        </div>--}}
{{--        <div class="col-md-6">--}}
{{--            @include('admin.layouts.partials.selects.select',['check'=>$edit->end_slesh_code??'','name'=>'end_slesh_code','title'=>'Код перенаправления','values'=>dataWithKeyName($codes)])--}}
{{--        </div>--}}
{{--    </div>--}}
    <hr/>
    <div class="row">
        <div class="col-md-6">
            @include('admin.layouts.partials.selects.select',['check'=>checkYesNo($edit->www_redirect),'name'=>'www_redirect','title'=>'Перенаправлять с www на без www','values'=>dataWithId($yesNoData)])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.partials.selects.select',['check'=>$edit->www_code??'','name'=>'www_code','title'=>'Код перенаправления','values'=>dataWithKeyName($codes)])
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            @include('admin.layouts.partials.selects.select',['check'=>checkYesNo($edit->index_php_redirect),'name'=>'index_php_redirect','title'=>'Перенаправлять с /index.php на без /index.php','values'=>dataWithId($yesNoData)])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.partials.selects.select',['check'=>$edit->index_php_code??'','name'=>'index_php_code','title'=>'Код перенаправления','values'=>dataWithKeyName($codes)])
        </div>
    </div>
    @include('admin.layouts.partials.buttons.save-save-close')
</form>
