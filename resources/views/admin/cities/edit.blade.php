<form method="post" action="{{route('admin.cities.update',$edit)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <ul class="nav nav-tabs mb-5" role="tablist">
        <li role="presentation">
            <a class="active" href="#dataDefault" role="tab"
               data-toggle="tab">Основное</a>
        </li>
        <li role="presentation"><a href="#institution" role="tab"
                                   data-toggle="tab">Заведения</a></li>


    </ul>



    <section class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="dataDefault">
            <div class="panel-body">
                @include('admin.cities.partials.form')
            </div>
        </div>
        <div role="tabpanel" class="tab-pane " id="institution">
            <div class="panel-body">
                @include('admin.cities.partials.place')
            </div>
        </div>
    </section>


    @include('admin.layouts.partials.buttons.save-save-close')
</form>
