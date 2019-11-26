<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
{{--            <ol class="breadcrumb">--}}
{{--                @if(isset($breadcrumbs) AND is_array($breadcrumbs))--}}
{{--                    @foreach($breadcrumbs as $num => $crumb)--}}
{{--                        @if(isLast($breadcrumbs, $num))--}}
{{--                            <li class="active"><span class="align-middle"> {{ $crumb['name'] ?? '' }}</span></li>--}}
{{--                        @else--}}
{{--                            <li class="mr-2">--}}
{{--                                <a href="{{ $crumb['url'] ?? '' }}"--}}
{{--                                   class="align-middle text-decorated-hover">{{ $crumb['name'] ?? '' }}</a>--}}
{{--                                <i class="align-middle fa fa-angle-right" aria-hidden="true"></i>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            </ol>--}}
        </div>
        <button class="navbar-toggler d-none" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" title="{{ Auth::user()->email }}"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
{{--                        <a class="dropdown-item" href="{{ route('admin.profile') }}">{{ __('modules.users.profile.title') }}</a>--}}
                        <a class="dropdown-item" href="{{route('admin.profile.index')}}">@lang('admin.profile.profile')</a>
                        {{--<a class="dropdown-item" href="#">Settings</a>--}}
                        <div class="dropdown-divider"></div>
                        <div class="text-center">
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-primary">
                                    <b>@lang('admin.exit')</b>
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
