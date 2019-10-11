<form method="post" action="{{route('admin.tour.store')}}" enctype="multipart/form-data">
    @csrf
    @include('admin.group.partials.form')

    @include('admin.layouts.partials.buttons.save-save-close')
</form>
