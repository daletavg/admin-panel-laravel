<form method="post" action="{{route('admin.seo.sitemap.update')}}">
    <div class="alert alert-danger" role="alert">
        При новой генерации sitemap.xml, прошлый будет затерт!
    </div>
    @csrf
    @method('put')

    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.partials.inputs.default-textaria',['title'=>'Редактирование sitemap.xml','name'=>'sitemap','value'=>$item])
        </div>
    </div>
    @include('admin.layouts.partials.buttons.save')
</form>
