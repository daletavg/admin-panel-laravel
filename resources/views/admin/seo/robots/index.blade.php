@extends('admin.layouts.app')
@section('content')
<form method="post" action="{{route('admin.seo.robots.update')}}">
    @csrf
    @method('put')

    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.partials.inputs.default-textaria',['title'=>'Редактирование robots.txt','name'=>'robots','value'=>$item])
        </div>
    </div>
    @include('admin.layouts.partials.buttons.save')
</form>
@endsection
