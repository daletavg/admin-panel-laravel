<form method="post" action="{{route('admin.about.update')}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="panel-body">
        @include('admin.about.partials.form')
    </div>


    @include('admin.layouts.partials.buttons.save')
</form>
