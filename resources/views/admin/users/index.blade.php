@extends('admin.layouts.app')
@section('content')
    <div class="table-responsive">
        <table class="table table-shopping">
            <thead>
            <tr>
                <th>ID</th>
                <th>E-mail</th>
                <th class="text-right">
{{--                    <a href="{{route('admin.banners.create')}}" class="btn btn-primary">@lang('admin.create')</a>--}}
                </th>
            </tr>
            </thead>
            <tbody>
            <?php /** @var $item \App\Models\Banner\Banner */?>
            @foreach($items as $item)
                <tr>

                    <th>{{ $item->getAttribute('id') }}</th>
                    <td>
                        {{$item->getAttribute('email')}}
                    </td>
                    <td class="text-primary text-right">
                        <div class="dropdown menu_drop">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">menu</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
{{--                                <a href="{{route('admin.banners.edit',$item)}}"--}}
{{--                                   class="dropdown-item">@lang('admin.edit')</a>--}}
{{--                                <form method="POST" action={{route('admin.banners.destroy',$item->id)}}--}}
{{--                                    accept-charset="UTF-8"--}}
{{--                                      onsubmit="return confirm(&quot;Вы уверены что хотите удалить запись?&quot;)">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="dropdown-item">@lang('admin.delete')</button>--}}
{{--                                </form>--}}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

