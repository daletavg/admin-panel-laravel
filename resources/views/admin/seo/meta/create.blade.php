<form method="post" action="{{route('admin.seo.meta.store')}}">
    @csrf
    @include('admin.seo.meta.partials.form')

    @include('admin.layouts.partials.buttons.save-save-close')
</form>
