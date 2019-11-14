<form action="{{route('admin.seo.redirects.update',$edit)}}" method="post">
    @csrf
    @method('put')
    @include('admin.seo.redirects.partials.form')
    @include('admin.layouts.partials.buttons.save-save-close')
</form>
