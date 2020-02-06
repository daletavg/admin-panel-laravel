{{--<div class="panel panel-default">--}}
{{--    <div class="panel-body clearfix">--}}
{{--        <div class="row">--}}
{{--            <div class="col-8">--}}
{{--                <form action="" method="get">--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-7">--}}
{{--                                --}}{{--                                @include('admin.partials.crud.default', ['name' => 'search', 'title' => 'Search', 'value' => $request->get('search'),])--}}
{{--                            </div>--}}
{{--                            <div class="col-3">--}}
{{--                                <button class="btn btn-danger" type="submit">--}}
{{--                                    <i class="fa fa-search" aria-hidden="true"></i>--}}
{{--                                    Поиск--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="table-responsive">
    <table class="table table-shopping">
        <thead>
        <tr>
            <th>ID</th>
            <th>URL адресс</th>
            <th>Ссылка</th>
            <th>Включен</th>
            <th class="text-right">
                <a href="{{route('admin.seo.meta.create')}}" class="btn btn-primary">@lang('admin.create')</a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php /** @var $item \App\Models\Meta */?>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <input type="text" value="{{ $item->url }}" readonly="" class="form-control">
                </td>
                <td>
                    <a class="btn btn-primary" target="_blank" href="{{langUrl($item->url)}}">Перейти
                        <i class="material-icons">
                            link
                        </i></a>

                </td>
                <td>{{ $item->active??false ?'Да':'Нет' }}</td>
                <td class="text-primary text-right">
                    <div class="dropdown menu_drop">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">menu</i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                            <a href="{{route('admin.seo.meta.edit',$item)}}" class="dropdown-item">@lang('admin.edit')</a>
                            <form method="POST" action={{route('admin.seo.meta.destroy',$item->id)}}
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
    {{ $items->links() }}
</div>
