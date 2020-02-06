@extends('admin.layouts.app')
@section('content')
    <div class="table-responsive">
        <table class="table table-shopping">
            <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>@lang('admin.image')</th>
                <th>Название</th>
                <th class="text-right">
                </th>
            </tr>
            </thead>
            <tbody data-sortable-container="true" data-table="services">
            @foreach($items as $item)
                <tr class="draggable" data-sort="{{$item->getAttribute('sort')}}" data-id="{{$item->getAttribute('id')}}">
                    <td>
                        <div class="handle">
                            <i class="fa fa-arrows" aria-hidden="true"></i>
                        </div>
                    </td>
                    <th>{{ $loop->iteration }}</th>
                    <td>
                        {!!GetImageAdmin($item->getAttribute('image')->path??'')!!}
                    </td>
                    <td>
                        {{$item->getAttribute('title')}}
                    </td>
                    <td class="text-primary text-right">
                        <div class="dropdown menu_drop">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">menu</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                                <a href="{{route('admin.services.edit',$item)}}"
                                   class="dropdown-item">@lang('admin.edit')</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
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
