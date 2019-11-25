<div class="table-responsive">
    <table class="table">
        @isset($items)
            @foreach($items as $item)
                <tr>
                    <th>{{\Arr::get($item,'name')}}</th>
                    <td class="text-primary text-right">
                        <div class="dropdown menu_drop">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">menu</i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_1">
                                <a href="{{\Arr::get($item,'url')}}" class="dropdown-item">@lang('admin.open')</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endisset
    </table>
</div>

