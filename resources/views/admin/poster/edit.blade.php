<form method="post" action="{{route('admin.posters.update',$edit)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <ul class="nav nav-tabs mb-5" role="tablist">
        <li role="presentation">
            <a class="active" href="#dataDefault" role="tab"
               data-toggle="tab">Основное</a>
        </li>


        <li role="presentation"><a href="#videoTab" role="tab"
                                   data-toggle="tab">Видео</a></li>
        <li role="presentation"><a href="#galleryTab" role="tab"
                                   data-toggle="tab">Галерея</a></li>
        @if(!is_null($edit->poster_group_id))
            <li role="presentation"><a href="#tourTab" role="tab"
                                       data-toggle="tab">Тур</a></li>
        @endif

    </ul>
    <section class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="dataDefault">
            <div class="panel-body">
                @include('admin.poster.partials.form')
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            @include('admin.layouts.partials.images.image',['name'=>'image','title'=>'Главное изображение'])
                        </div>
                        <div class="col-6">
                            @include('admin.layouts.partials.images.image-upload')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane " id="videoTab">
            <div class="panel-body">
                @include('admin.layouts.partials.videos.video')
            </div>
        </div>
        <div role="tabpanel" class="tab-pane " id="galleryTab">
            <div class="panel-body">
                @include('admin.layouts.partials.other.gallery')
            </div>
        </div>
        <div role="tabpanel" class="tab-pane " id="tourTab">
            <div class="panel-body">
                @include('admin.poster.partials.tour')
            </div>
        </div>

    </section>


    @include('admin.layouts.partials.buttons.save-save-close')
</form>
