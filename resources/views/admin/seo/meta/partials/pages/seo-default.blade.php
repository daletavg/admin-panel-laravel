<form action="{{route('admin.seo.meta.store-default-meta')}}" method="post">
    @csrf
    @include('admin.seo.meta.partials.seo-lang-form')

    @include('admin.layouts.partials.buttons.save')
</form>
