<div class="table-responsive">
    <table class="table table-shopping">
        <thead>
        <tr>
            <th>ID</th>
            <th>Изображение</th>
            <th>Заголовок</th>
            <th >Город</th>
            <th class="th-description">Описание</th>


            <th class="text-right">
                <a href="{{route('admin.posters.create')}}" class="btn btn-primary">Создать</a>
            </th>
        </tr>
        </thead>
        <tbody data-sortable-container="true" data-table="posters">
        @isset($items)
            @foreach($items as $item)
                {{--               <tr --}}{{-- class="draggable" data-sort="{{$item->sort}}" data-id="{{ $item->id }}"--}}{{-->--}}
                <tr>
                    {{--                    <td>--}}
                    {{--                        <div class="handle">--}}
                    {{--                            <i class="fa fa-arrows" aria-hidden="true"></i>--}}
                    {{--                        </div>--}}
                    {{--                    </td>--}}
                    <th>{{$loop->iteration}}</th>
                    <td>
                        {!! GetImageAdmin(\Illuminate\Support\Arr::first($item->images)->path??'',asset('img/header-logo.svg')) !!}

                    </td>
                    <td>
                        {{ $item->lang->title }}
                    </td>
                    <td>{{$item->city->lang->title ?? ''}}</td>
                    <td> {!! $item->lang->description ?? '' !!}</td>

                    <td class="text-primary text-right">
                        <div class="dropdown menu_drop">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">menu</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                                <a href="{{route('admin.posters.edit',$item)}}" class="dropdown-item">️Редактировать</a>
                                <form method="POST" action={{route('admin.posters.destroy',$item)}}""
                                      accept-charset="UTF-8"
                                      onsubmit="return confirm(&quot;Вы уверены что хотите удалить запись?&quot;)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </td>


                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
</div>
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
