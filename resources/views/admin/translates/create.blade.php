<form action="{{route('admin.translate.store')}}" method="post">
    @csrf
    @include('admin.translates.partials.form')
    @include('admin.layouts.partials.buttons.save-save-close')
</form>
