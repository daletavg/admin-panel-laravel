


<ul class="nav nav-tabs mb-5" role="tablist">

    @foreach($groups as $group)

        <li role="presentation">
            <a class="{{$loop->iteration==1?'active':''}}" href="#group-{{ $group }}" role="tab"
               data-toggle="tab">{{$group}}</a>
        </li>
    @endforeach

</ul>
<section class="tab-content">
    @foreach($groups as $group)
        <div role="tabpanel" class="{{$loop->iteration==1?'show active':''}} tab-pane " id="group-{{ $group }}">
            <div class="panel-body">
                @include('admin.translates.partials.tab',['items'=>\App\Models\Translate\Translate::WhereGroupWithLang($group)->get(),'group'=>$group])
            </div>
        </div>
    @endforeach
</section>


