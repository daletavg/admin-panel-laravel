<main id="event-page">
    <section class="event_section">
        <div class="wrapper">
            <div class="row align-items-lg-center">
                <div class="col-12 col-lg-4 offset-lg-1 p-0 px-lg-3"
                     class="about_section__text"
                     data-aos="fade-up"
                     data-aos-once="true"
                     data-aos-delay="50"
                     data-aos-duration="1000"
                >
                    <img src="img/oskar_2019.jpg" alt="" class="event_section__image">
                </div>
                <div class="col-12 col-lg-5 offset-lg-1"
                     class="about_section__text"
                     data-aos="fade-up"
                     data-aos-once="true"
                     data-aos-delay="150"
                     data-aos-duration="1000"
                >
                    <p class="event_section__title mb-25 mb-lg-20">{{$item->lang->title??''}}</p>
                    <div class="event_section__box mb-10 mb-lg-1">
                        <img src="img/calendar-event.svg" alt="" class="event_section__icon">
                        <p class="event_section__text">{{$item->date??''}}</p>
                    </div>
                    <div class="event_section__box mb-20">
                        <img src="img/calendar-placeholder.svg" alt="" class="event_section__icon">
                        <p class="event_section__text">{{$item->city->lang->title??''}}
                            , {{$item->place->lang->title??''}}</p>
                    </div>
                    <p class="event_section__price mb-20 mb-lg-35">{{getTranslate('price_second.events',[$item->price_before??'',$item->price_to??''])}}</p>
                    <a href="#" class="event_section__btn mb-30 mb-lg-20 red-btn">{{getTranslate('buy.other')}}</a>

                    @include('public.event.partials.other-cities')

                </div>
            </div>
        </div>
    </section>
    <section class="description_section"
             class="about_section__text"
             data-aos="fade-up"
             data-aos-once="true"
             data-aos-delay="150"
             data-aos-duration="1000">
        <div class="wrapper">
            <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1">
                    <span class="description_section__line description_section__line-top d-lg-none"></span>
                    <span class="description_section__line description_section__line-bottom d-lg-none"></span>
                    <div class="description_section__box">
                        {!! $item->lang->description??'' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('public.event.partials.gallery-section')
    @include('public.event.partials.video-section')
    @include('public.event.partials.group-section')
</main>
