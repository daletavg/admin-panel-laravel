<form action="{{route('admin.translate.update',$edit)}}" method="post">
    @csrf
    @method('put')
    @include('admin.translates.partials.form')
    @include('admin.layouts.partials.buttons.save-save-close')
</form>
