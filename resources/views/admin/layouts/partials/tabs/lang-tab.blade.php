@if(count($locales)>1)
    <ul class="nav nav-pills nav-pills-primary" role="tablist">
        @foreach($locales as $name=>$locale)
            <li class="nav-item">
                <a class="nav-link {{$loop->iteration==1?'active':''}}" data-toggle="tab" href="#link-{{$locale}}"
                   role="tablist" aria-expanded="true">
                    {{strtoupper($locale??'')}} - {{ucfirst($name??'')}}
                </a>
            </li>
        @endforeach
    </ul>
@endif


<div class="tab-content tab-space">
    @foreach($locales as $name=>$locale)
        @if(\Illuminate\Support\Arr::has($tabs,$locale))
            <div class="tab-pane {{$loop->iteration==1?'active':''}}" id="link-{{$locale}}" aria-expanded="true">

                {!! \Illuminate\Support\Arr::get($tabs,$locale) !!}
            </div>
        @endif
    @endforeach
</div>
