@if($item->group!==null)
    <p class="event_section__subtitle">{{getTranslate('event_other_city.events')}}</p>
    <div class="event_section__cities">

        @foreach($item->group->posterWithData as $poster)
            @if($poster->id != $item->id)
                <a href="{{route('events.show',$poster->url)}}"
                   class="event_section__link">{{$poster->city->lang->title??''}}</a><span>/</span>
            @endif
            {{--        <a href="#" class="event_section__link active">Харьков</a><span>/</span>--}}
            {{--        <a href="#" class="event_section__link">Львов</a>--}}
        @endforeach
    </div>
@endif
