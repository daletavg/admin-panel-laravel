
<ul class="nav pb-5 sidebar-menu dropdownMenu">

    @foreach($menu as $row)
        <li class="nav-item  drop-item {!! activeLink(route($row['link']),'active')!!}">
            <a class="nav-link" href="{{route($row['link'])}}">
                <span class="icon-left">{!!$row['icon']??''!!}</span>
                <p>{{$row['name']}}</p>
            </a>
        </li>
    @endforeach


    <li class="nav-item mt-5 text-center">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button class="btn btn-primary">
                <b>@lang('admin.exit')</b>
            </button>
        </form>
    </li>
</ul>
