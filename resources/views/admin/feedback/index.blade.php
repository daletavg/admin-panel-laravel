@extends('admin.layouts.app')
@section('content')
<div class="table-responsive">
    <table class="table table-shopping">
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Телефон</th>
            <th>Дата</th>
            <th class="th-description">Cообщение</th>

            <th class="text-right">

            </th>
        </tr>
        </thead>
        <tbody data-sortable-container="true" data-table="posters">
        @isset($items)
            @foreach($items as $item)
                  <tr>
                    <th>{{$item->id}}</th>
                    <td>
                        {{$item->name}}
                    </td>
                    <td>
                        {{ $item->phone }}
                    </td>
                      <td>
                          {{ $item->created_at }}
                      </td>
                    <td>{{$item->message}}</td>

                    <td class="text-primary text-right">
                        <div class="dropdown menu_drop">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">menu</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                                <form method="POST" action={{route('admin.feedback.destroy',$item)}}
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
@endsection

