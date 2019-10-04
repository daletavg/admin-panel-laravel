<div class="table-responsive">
    <table class="table table-shopping">
        <thead>
        <tr>
            <th>ID</th>
            <th>Изображение</th>
            <th>Заголовок</th>
            <th class="th-description">Описание</th>
            <th class="text-right">
                <a href="{{route('admin.stocks.create')}}" class="btn btn-primary">Создать</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>
                    {!! GetImageAdmin(\Illuminate\Support\Arr::first($item->images)->path??'',asset('img/header-logo.svg')) !!}

                </td>
                <td>
                    {{$item->title}}
                </td>
                <td> {{$item->description}}</td>
                <td class="text-primary text-right">
                    <div class="dropdown menu_drop">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">menu</i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                            <a href="{{route('admin.stocks.edit',$item)}}" class="dropdown-item">️Редактировать</a>
                            <form method="POST" action={{route('admin.stocks.destroy',$item)}}"" accept-charset="UTF-8"
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
        </tbody>
    </table>
</div>
