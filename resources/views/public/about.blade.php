<main id="about-page">
    <section class="about_section">
        <div class="wrapper">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <p
                        class="about_section__title mb-10 mb-lg-15"
                        data-aos="fade-up"
                        data-aos-once="true"
                        data-aos-delay="30"
                        data-aos-duration="1000"
                    >
                        {{getTranslate('about_company_p.about')}}
                    </p>
                    {!! $item->lang->description !!}
                </div>
            </div>
        </div>
    </section>
    <section class="partners_section"
             class="about_section__text"
             data-aos="fade-up"
             data-aos-once="true"
             data-aos-delay="150"
             data-aos-duration="1000"
    >
        <div class="wrapper position-relative">

            <p class="about_section__title mb-20 mb-lg-25">{{getTranslate('our_partners.about')}}</p>
            <div class="partners_section__slider">
                <div class="slider">
                    @foreach($partners as $item)
                        <div class="slide">
                            <div class="partners_section__slide">
                                <img
                                    src="{{GetPathToPhoto(imgOrig(\Illuminate\Support\Arr::first($item->images)->path??''))}}"
                                    alt=""
                                    class="partners_section__image"
                                />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="partners_section__slider-arrow-box">
                <div class="arrow arrow-prev">
                    <img src="{{asset('img/public/red-arrow.svg')}}" alt=""/>
                </div>
                <div class="arrow arrow-next">
                    <img src="{{asset('img/public/red-arrow.svg')}}" alt=""/>
                </div>
            </div>
        </div>
    </section>
</main>
