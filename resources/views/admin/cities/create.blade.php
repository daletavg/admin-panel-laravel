<form method="post" action="{{route('admin.cities.store')}}" enctype="multipart/form-data">
    @csrf
    @include('admin.cities.partials.form')
    @include('admin.layouts.partials.buttons.save-save-close')
</form>
