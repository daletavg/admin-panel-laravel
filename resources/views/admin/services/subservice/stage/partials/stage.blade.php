<div class="table-responsive">
    <table class="table table-shopping">
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Активно</th>
            <th class="th-description">Описание</th>
            <th class="text-right">
                <a href="{{route('admin.stage.create',['service'=>$service,'subservice'=>$edit])}}" class="btn btn-primary">@lang('admin.create')</a>
            </th>
        </tr>
        </thead>
        <tbody data-sortable-container="true" data-table="stages">
        @isset($items)
            @foreach($items as $item)
                <tr class="draggable" data-sort="{{$item->getAttribute('sort')}}"
                    data-id="{{$item->getAttribute('id')}}">
                    <td>
                        <div class="handle">
                            <i class="fa fa-arrows" aria-hidden="true"></i>
                        </div>
                    </td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$item->getAttribute('title')}}</td>
                    <td>
                        {{activeYesNo($item->getAttribute('active'))}}
                    </td>
                    <td>{{$item->getAttribute('description')}}</td>
                    <td class="text-primary text-right">
                        <div class="dropdown menu_drop">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">menu</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                                <a href="{{route('admin.stage.edit',['subservice'=>$edit,'service'=>$service,'stage'=>$item])}}"
                                   class="dropdown-item">@lang('admin.edit')</a>
                                <form method="POST" action="{{route('admin.stage.destroy',['subservice'=>$edit,'service'=>$service,'stage'=>$item])}}"
                                          accept-charset="UTF-8"
                                      onsubmit="return confirm(&quot;Вы уверены что хотите удалить запись?&quot;)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item">@lang('admin.delete')</button>
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
            $sort = sort;
            $sort.url = '{{ route('admin.sort') }}';
            $sort.init();
        });
    </script>
@endsection
