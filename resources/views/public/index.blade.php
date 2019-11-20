<main id="main-page">
    <section class="first-section">
        <div class="first-section__background-overlay"></div>
        @if(count($general))
            <div class="first-section__slider">
            <div class="slider first-slider">
                @foreach($general as $item)
                    <div class="slide" data-href="{{route('events.show',$item->url)}}">
                        <div class="first-section__box">
                            <img src="{{GetPathToPhoto(imgOrig(\Illuminate\Support\Arr::first($item->images)->path??''))}}" alt="" class="first-section__image">
                            <div class="first-section__text d-lg-none">
                                <p class="first-section__subtitle">{{$item->date??''}}</p>
                                <p class="first-section__title">{{$item->lang->title??''}}</p>
                                <p class="first-section__description">{{$item->city->lang->title??''}}
                                    , {{$item->place->lang->title??''}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="first-section__bottom">
                <div class="first-section__desktop d-none d-lg-flex flex-column">
                    <div class="slider second-slider">
                        @foreach($general as $item)
                            <div class="slide">
                                <p style="color: {{$item->color}};" class="first-section__desktop-title">{{$item->lang->title??''}}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider third-slider">
                        @foreach($general as $item)
                            <div class="slide">
                                <p style="color: {{$item->color}};" class="first-section__desktop-desc">{{$item->date??''}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="first-section__bottom-background"></div>
                <div class="wrapper d-none d-lg-flex h-100 align-items-center">
                    <div class="d-flex align-items-center w-100 justify-content-between">
                        <div class="fourth-slider slider">
                            @foreach($general as $item)
                                <div class="slide">
                                    <div class="first-section__bottom-box">
                                        <p class="first-section__bottom-text">{{$item->city->lang->title??''}}
                                            , {{$item->place->lang->title??''}}</p>
                                        <p class="first-section__bottom-text-second">{!!getTranslate('price.events',[$item->price_before??'',$item->price_to??''])!!}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{route('events.show',$item->url)}}" class="first-section__bottom-btn red-btn">{{getTranslate('more.other')}}</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="first-section__slider-dots">
            <div class="first-section__slider-arrow-prev">
                <img src="{{asset('img/public/slick-arrow.svg')}}" alt="">
            </div>
            <div class="dots-wrapper"></div>
            <div class="first-section__slider-arrow-next">
                <img src="{{asset('img/public/slick-arrow.svg')}}" alt="">
            </div>
        </div>
    </section>
    @include('public.partials.event-list')
</main>
