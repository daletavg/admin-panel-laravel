@if(!empty($item->video) AND is_array($videos = json_decode($item->video)))
    <section class="video_section"
             class="about_section__text"
             data-aos="fade-up"
             data-aos-once="true"
             data-aos-delay="150"
             data-aos-duration="1000"
    >
        <div class="wrapper">
            <p class="gallery_section__title mb-20">{{getTranslate('video.events')}}</p>
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="video_section__slider-big mb-10">
                        <div class="slider">
                            @foreach($videos as $video)
                                <div class="slide position-relative">
                                    <img src="https://img.youtube.com/vi/{!! getLinkVideo($video) !!}/0.jpg"
                                         data-iframe="https://www.youtube.com/embed/{{getLinkVideo($video)}}" alt=""
                                         class="video_section__img">
                                    <img src="{{asset('img/public/play-stop.svg')}}" alt=""
                                         class="video_section__play">
                                    <div class="iframe_box"></div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="video_section__slider-small">
                        <div class="slider">
                            @foreach($videos as $video)
                                <div class="slide position-relative">
                                    <img src="https://img.youtube.com/vi/{!! getLinkVideo($video) !!}/0.jpg"
                                         data-iframe="https://www.youtube.com/embed/{!! getLinkVideo($video) !!}"
                                         alt=""
                                         class="video_section__img">
                                    <img src="{{asset('img/public/play-stop.svg')}}" alt=""
                                         class="video_section__play">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endif
