<div class="table-responsive">
    <table class="table table-hover table-condensed table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th class="w-25">Ключ</th>
            <th>Значение</th>
            <th>Группа</th>
            <th class="text-right">
                @can('create_translate')
                    <a href="{{route('admin.translate.create',['group'=>$group])}}" class="btn btn-primary">@lang('admin.create')</a>
                @endcan
            </th>
        </tr>
        </thead>
        <tbody>
        @isset($items)
            @foreach($items as $item)

                <tr>
                    <th width="20">{{$loop->iteration}}</th>
                    <td class="w-25">
                        <input disabled class="get-translate-code form-control"
                               data-value='getTranslate("{{getTranslateKey($item)}}")'
                               value="{{getTranslateKey($item)}}">
                    </td>
                    <td>
                        {{ $item->lang->data??'' }}
                    </td>
                    <td>
                        {{$item->group}}
                    </td>

                    <td class="text-primary text-right">
                        @if(auth()->user()->can('edit_translate')|| auth()->user()->can('remove_translate'))
                            <div class="dropdown menu_drop">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton_1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">menu</i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                                    @can('edit_translate')
                                        <a href="{{route('admin.translate.edit',$item)}}"
                                           class="dropdown-item">@lang('admin.delete')</a>
                                    @endcan
                                    @can('remove_translate')
                                        <form method="POST" action="{{route('admin.translate.destroy',$item)}}"
                                              accept-charset="UTF-8"
                                              onsubmit="return confirm(&quot;Вы уверены что хотите удалить запись?&quot;)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">@lang('admin.edit')</button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        @endif
                    </td>


                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
</div>

@section('javascript')
    <script>
        // $(document).ready(function () {
        //    $('.get-translate-code').on('click',function () {
        //        console.log(1);
        //        let value = $(this).attr('data-value');
        //        document.execCommand('copy')
        //    });
        // });
    </script>
@endsection
