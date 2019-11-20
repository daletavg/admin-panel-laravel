@if(isset($item->group) && $item->group!==null)
    <section class="info_section"
             class="about_section__text"
             data-aos="fade-up"
             data-aos-once="true"
             data-aos-delay="150"
             data-aos-duration="1000"
    >
        <div class="wrapper">
            <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1">
                    <p class="info_section__title mb-20">{{$item->lang->title??''}} {{getTranslate('other_city.events')}}</p>

                    <div class="info_section__table d-lg-none">
                        @foreach($item->group->posterWithData as $poster)
                            @if($poster->id == $item->id)
                                @continue
                            @endif
                            <div class="info_section__box">
                                <p class="info_section__city mb-10">{{$poster->city->lang->title??''}}</p>
                                <div class="info_section__row mb-10">
                                    <img src="{{asset('img/public/calendar-event.svg')}}" alt=""
                                         class="info_section__icon">
                                    <p class="info_section__text">{{$poster->date??''}}</p>
                                </div>
                                <div class="info_section__row mb-10">
                                    <img src="{{asset('img/public/calendar-placeholder.svg')}}" alt=""
                                         class="info_section__icon">
                                    <p class="info_section__text">{{$poster->place->lang->title??''}}</p>
                                </div>
                                <p class="info_section__price mb-20">{{$poster->price_before??''}}
                                    - {{$poster->price_to??''}} грн</p>
                                <a href="{{$poster->link??getNonLocaledUrl()}}" class="info_section__btn">{{getTranslate('buy.other')}}</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="info_section__table d-none d-lg-block">
                        <div class="info_section__row shadow-none">
                            <div class="info_section__row-item mr-46 width-85">
                                <p class="info_section__text">{{getTranslate('date.events')}}</p>
                            </div>
                            <div class="info_section__row-item mr-46 width-48">
                                <p class="info_section__text">{{getTranslate('time.events')}}</p>
                            </div>
                            <div class="info_section__row-item mr-46 width-62">
                                <p class="info_section__text">{{getTranslate('city.events')}}</p>
                            </div>
                            <div class="info_section__row-item mr-46 width-175">
                                <p class="info_section__text">{{getTranslate('place.events')}}</p>
                            </div>
                            <div class="info_section__row-item mr-46 width-100">
                                <p class="info_section__text">{{getTranslate('price_table.events')}}</p>
                            </div>
                        </div>
                        @foreach($item->group->posterWithData as $poster)
                            @if($poster->id == $item->id)
                                @continue
                            @endif
                            <div class="info_section__row mb-10">
                                <div class="info_section__row-item mr-46 width-85">
                                    <p class="info_section__text">{{$poster->date??''}}</p>
                                </div>
                                <div class="info_section__row-item mr-46 width-48">
                                    <p class="info_section__text">{{$poster->date??''}}</p>
                                </div>
                                <div class="info_section__row-item mr-46 width-62">
                                    <p class="info_section__text">{{$poster->city->lang->title??''}}</p>
                                </div>
                                <div class="info_section__row-item mr-46 width-175">
                                    <p class="info_section__text">{{$poster->place->lang->title??''}}</p>
                                </div>
                                <div class="info_section__row-item mr-46 width-100">
                                    <p class="info_section__text-price">{{getTranslate('price_second.events',[$poster->price_before??'',$poster->price_to??''])}}</p>
                                </div>
                                <div class="info_section__row-item w-100">
                                    <a href="{{$poster->link??getNonLocaledUrl()}}"
                                       class="info_section__btn">{{getTranslate('buy.other')}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
