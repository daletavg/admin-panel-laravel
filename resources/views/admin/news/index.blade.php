@extends('admin.layouts.app')
@section('content')
    <div class="table-responsive">
        <table class="table table-shopping">
            <thead>
            <tr>
                <th>ID</th>
                <th>@lang('admin.image')</th>
                <th>Заголовок</th>
                <th>Активно</th>
                <th>Дата</th>
                <th class="th-description">Описание</th>
                <th class="text-right">
                    <a href="{{route('admin.news.create')}}" class="btn btn-primary">@lang('admin.create')</a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php /** @var $item \App\Models\Banner\News */?>
            @foreach($items as $item)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>
                        {!!GetImageAdmin($item->getAttribute('image')->path??'')!!}
                    </td>
                    <td>
                        {{$item->getAttribute('title')}}
                    </td>
                    <td>
                        {{activeYesNo($item->getAttribute('active'))}}
                    </td>
                    <td>
                        {{$item->getAttribute('date')}}
                    </td>
                    <td>
                        {{$item->getAttribute('short_description')}}
                    </td>
                    <td class="text-primary text-right">
                        <div class="dropdown menu_drop">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">menu</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                                <a href="{{route('admin.news.edit',$item)}}"
                                   class="dropdown-item">@lang('admin.edit')</a>
                                <form method="POST" action={{route('admin.news.destroy',$item->id)}}
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
            </tbody>
        </table>
        {{$items->links()}}
    </div>

@endsection
@section('javascript')
    <script type="text/javascript" defer>
        $(document).ready(function (e) {
            $sort = sort;
            $sort.url = '{{ route('admin.sort') }}';
            $sort.init();
        });
    </script>
@endsection
