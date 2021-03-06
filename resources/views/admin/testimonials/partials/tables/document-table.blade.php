<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>

            <th>ID</th>
            <th>@lang('admin.image')</th>
            <th>ФИО</th>
            <th>Дата создания</th>
            <th>Статус</th>
            <th class="text-right">
                <a href="{{route('admin.testimonials.create',['type'=>'document'])}}" class="btn btn-primary">@lang('admin.create')</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($documents as $item)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>
                    {!!GetImageAdmin($item->getAttribute('image')->path??'')!!}
                </td>
                <td>
                    {{$item->getAttribute('bio')}}
                </td>
                <td>
                    {{$item->getDate()}}
                </td>
                <td>@lang('admin.status.'.$item->getAttribute('status'))</td>
                <td class="text-primary text-right">
                    <div class="dropdown menu_drop">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">menu</i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                            <a href="{{route('admin.testimonials.edit',['testimonial'=>$item,'type'=>'document'])}}"
                               class="dropdown-item">@lang('admin.edit')</a>
                            <form method="POST" action={{route('admin.testimonials.destroy',$item->id)}}
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
</div>
