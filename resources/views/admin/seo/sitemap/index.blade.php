<div class="row">
    <div class="col-md-3">
        <a class="btn btn-warning" href="{{route('admin.seo.sitemap.index',['generate'=>true])}}" style="color: white">Сгенерировать sitemap</a>
    </div>
    <div class="col-md-3">
        <a class="btn btn-danger" style="color: white" href="{{route('admin.seo.sitemap.edit')}}">Редактировать вручную</a>
    </div>
    <div class="col-md-3">
        <a class="btn btn-primary" target="_blank" href="{{env('APP_URL').'/sitemap.xml'}}">Перейти на карту сайта
            <i class="material-icons">
                link
            </i></a>
    </div>

</div>
