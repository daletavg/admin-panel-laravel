<form action="{{route('admin.seo.redirects.store')}}" method="post">
    @csrf
    @include('admin.seo.redirects.partials.form')
    @include('admin.layouts.partials.buttons.save-save-close')
</form>
