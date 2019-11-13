<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>FROM</th>
            <th>TO</th>
            <th>Код редиректа</th>
            <th class="text-right">
                <a href="{{route('admin.seo.redirects.create')}}" class="btn btn-primary">Создать</a>
            </th>
        </tr>
        </thead>
        <tbody >
        @isset($items)
            @foreach($items as $item)
                <tr>
                    <th>{{$loop->iteration}}</th>

                    <td>
                        {{ $item->from }}
                    </td>
                    <td>
                        {{ $item->to }}
                    </td>
                    <td>
                        {{ $item->code }}
                    </td>

                    <td class="text-primary text-right">
                        <div class="dropdown menu_drop">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">menu</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                                <a href="{{route('admin.seo.redirects.edit',$item)}}" class="dropdown-item">️Редактировать</a>
                                <form method="POST" action={{route('admin.seo.redirects.destroy',$item)}}""
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
    {{$items->links()}}
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
{{--<div class="card">--}}
{{--    <section id="connected" class=" justify-content-center m-4">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 min-vh-100">--}}
{{--                <label for="all-items" class=" control-label">Все афиши</label>--}}
{{--                <ul id="all-items" style="min-height: 200px" class="connected list card  min-vh-100 m-2">--}}
{{--                    <li class="card bg-secondary rounded m-2 p-1" data-id="">Item 1</li>--}}
{{--                    <li class="card bg-secondary rounded m-2 p-1" data-id="">Item 2</li>--}}
{{--                    <li class="card bg-secondary rounded m-2 p-1" data-id="">Item 3</li>--}}
{{--                    <li class="card bg-secondary rounded m-2 p-1" data-id="">Item 4</li>--}}
{{--                    <li class="card bg-secondary rounded m-2 p-1" data-id="">Item 5</li>--}}
{{--                    <li class="card bg-secondary rounded m-2 p-1" data-id="">Item 6</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 min-vh-100">--}}
{{--                <label for="current-items" class=" control-label">Афиши в текущщей группе</label>--}}
{{--                <ul id="current-items" style="min-height: 200px" class="connected list card m-2">--}}
{{--                    <li class="card bg-secondary rounded m-2 p-1">--}}
{{--                        Item 1--}}
{{--                    </li>--}}
{{--                    <li class="card bg-secondary rounded m-2 p-1" data-id="">Item 2</li>--}}
{{--                    <li class="card bg-secondary rounded m-2 p-1" data-id="">Item 3</li>--}}
{{--                    <li class="card bg-secondary rounded m-2 p-1" data-id="">Item 4</li>--}}
{{--                    <li class="card bg-secondary rounded m-2 p-1" data-id="">Item 5</li>--}}
{{--                    <li class="card bg-secondary rounded m-2 p-1" data-id="">Item 6</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--</div>--}}


