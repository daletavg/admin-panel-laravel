@extends('admin.layouts.app')
@section('content')
    <div class="table-responsive">
        <table class="table table-hover table-condensed table-striped">
            <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th class="w-25">Name</th>
                <th class="text-right">
                        <a href="{{route('admin.services.create')}}"
                           class="btn btn-primary">@lang('admin.create')</a>
                </th>
            </tr>
            </thead>
            <tbody data-sortable-container="true" data-table="services">
            @isset($items)
                @foreach($items as $item)
                    <tr class="draggable" data-sort="{{$item->getAttribute('sort')}}" data-id="{{$item->getAttribute('id')}}">
                        <td>
                            <div class="handle">
                                <i class="fa fa-arrows" aria-hidden="true"></i>
                            </div>
                        </td>

                        <th>{{$loop->iteration}}</th>
                        <td class="w-25">
                            {{$item->lang->name ?? ''}}
                        </td>

                        <td class="text-primary text-right">
                            <div class="dropdown menu_drop">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton_1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">menu</i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                                    <a href="{{route('admin.services.edit',$item)}}"
                                       class="dropdown-item">@lang('admin.edit')</a>
                                    <form method="POST" action="{{route('admin.services.destroy',$item)}}"
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
