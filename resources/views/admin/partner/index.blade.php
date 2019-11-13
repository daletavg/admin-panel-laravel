<div class="table-responsive">
    <table class="table table-shopping">
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Изображение</th>
            <th>Название партнера</th>


            <th class="text-right">
                <a href="{{route('admin.partners.create')}}" class="btn btn-primary">Создать</a>
            </th>
        </tr>
        </thead>
        <tbody data-sortable-container="true" data-table="partners">
        @isset($items)
            @foreach($items as $item)
                <tr class="draggable" data-sort="{{$item->sort}}" data-id="{{ $item->id }}">

                    <td>
                        <div class="handle">
                            <i class="fas fa-arrows-alt" aria-hidden="true"></i>
                        </div>
                    </td>
                    <th>{{$loop->iteration}}</th>
                    <td>
                        {!! GetImageAdmin(\Illuminate\Support\Arr::first($item->images)->path??'') !!}

                    </td>
                    <td>
                        {{ $item->lang->title }}
                    </td>


                    <td class="text-primary text-right">
                        <div class="dropdown menu_drop">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">menu</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                                <a href="{{route('admin.partners.edit',$item)}}" class="dropdown-item">️Редактировать</a>
                                <form method="POST" action={{route('admin.partners.destroy',$item)}}""
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
