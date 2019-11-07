<form method="post" action="{{route('admin.seo.meta.update',$edit)}}">
    @csrf
    @method('put')
    @include('admin.seo.meta.partials.form')

    @include('admin.layouts.partials.buttons.save-save-close')
</form>
