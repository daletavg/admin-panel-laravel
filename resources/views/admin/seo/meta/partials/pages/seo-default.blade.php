<form action="{{route('admin.seo.meta.store-default-meta')}}" method="post">
    @csrf
    {!! $editLang??'' !!}

    @include('admin.layouts.partials.buttons.save')
</form>
