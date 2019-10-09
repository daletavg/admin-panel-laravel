<div class="table-responsive">
    <table class="table table-shopping">
        <thead>
        <tr>

            <th>ID</th>
            <th>Город</th>
            <th>Заведения в городе</th>


            <th class="text-right">
                <a href="{{route('admin.cities.create')}}" class="btn btn-primary">Создать</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @isset($items)
            @foreach($items as $item)
                <tr>

                    <th>{{$loop->iteration}}</th>
                    <td>
                        {{ $item->lang->title }}

                    </td>
                    <td>
{{--                        {{ $item->lang->title }}--}}
                    </td>


                    <td class="text-primary text-right">
                        <div class="dropdown menu_drop">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">menu</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                                <a href="{{route('admin.cities.edit',$item)}}" class="dropdown-item">️Редактировать</a>
                                <form method="POST" action={{route('admin.cities.destroy',$item)}}""
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

