<ul class="nav nav-tabs mb-5" role="tablist">
    <li role="presentation">
        <a class="active" href="#dataDefault" role="tab"
           data-toggle="tab">Основное</a>
    </li>

    <li role="presentation"><a href="#historyTab" role="tab"
                               data-toggle="tab">История</a></li>
</ul>

<section class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="dataDefault">
        <div class="panel-body">
            <div class="row">
                <div class="col-8">
                    <form action="{{route('admin.posters.index')}}" method="get">
                        <input type="hidden" name="type" value="new">
                        <div class="row align-items-end">
                            <div class="col-md-7">
                                @include('admin.layouts.partials.inputs.default-input',['title'=>'Поиск по заголовку','name'=>'search','labelValue'=>false,'value'=>$search??''])
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Поиск
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('admin.poster.partials.table',['items'=>$items??[]])
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="historyTab">
        <div class="panel-body">
            <div class="row">
                <div class="col-8">
                    <form action="{{route('admin.posters.index')}}" method="get">
                        <input type="hidden" name="type" value="history">
                        <div class="row align-items-end">
                            <div class="col-md-7">
                                @include('admin.layouts.partials.inputs.default-input',['title'=>'Поиск по заголовку','name'=>'search','outputLabel'=>false,'value'=>$searchHistory??''])
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Поиск
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('admin.poster.partials.table',['items'=>$history??[]])
        </div>
    </div>
</section>

@section('javascript')
    <script type="text/javascript" defer>
        $(document).ready(function (e) {
            var $selectpicker = $('.selectpicker');
            if ($selectpicker.length) $selectpicker.selectpicker();
            //
            $sort = sort;
            $sort.url = '{{ route('admin.sort') }}';
            $sort.init();
        });
    </script>
@endsection
