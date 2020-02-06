<form action="{{route('admin.seo.meta.store-default-meta')}}" method="post">
    @csrf
    {!! $langData??'' !!}

    @include('admin.layouts.partials.buttons.save')
</form>
