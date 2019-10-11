<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>

            <th>Заголовок</th>
            <th>Город</th>
            <th class="th-description">Описание</th>
            <th class="text-right">

            </th>
        </tr>
        </thead>
        <tbody data-sortable-container="true" data-table="posters">
        @isset($edit->group->poster)
            @foreach($edit->group->poster as $item)
                @if($item->id != $edit->id)
                    <tr>

                        <td>
                            {{ $item->lang->title }}
                        </td>
                        <td>{{$item->city->lang->title ?? ''}}</td>

                        <td> {!! $item->lang->short_description ?? '' !!}</td>

                        <td class="text-primary text-right">
                            <div class="dropdown menu_drop">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton_1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">menu</i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                                    <a href="{{route('admin.posters.edit',$item)}}"
                                       class="dropdown-item">️Редактировать</a>
                                </div>
                            </div>
                        </td>


                    </tr>
                @endif
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
