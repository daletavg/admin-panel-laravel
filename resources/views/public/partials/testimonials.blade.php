@if(isset($testimonialsText) && count($testimonialsText))
    <section class="testimonials-section">
        <div class="container">
            <p class="testimonials-section__title mb-15 mb-lg-35" data-aos="fade-up">Отзывы</p>
            <div class="testimonials-section__slider" data-aos="">
                <div class="slider">
                    @php
                        $aosDelay = 0;
                    @endphp
                    @foreach($testimonialsText as $testimonial)
                        <div class="slide">
                            <div class="testimonials-section__box" data-aos="fade-up"
                                 data-aos-delay="{{ ($aosDelay+=150)<=600?$aosDelay:''}}">
                                <div class="d-flex justify-content-between align-items-center mb-10">
                                    <p class="testimonials-section__name">{{$testimonial->getAttribute('bio')}}</p>
                                    <p class="testimonials-section__date">{{$testimonial->getDate()}}</p>
                                </div>
                                <p class="testimonials-section__description mb-15">{{$testimonial->getAttribute('testimonial')}}</p>
{{--                                @dd(\Illuminate\Support\Str::length($testimonial->getAttribute('testimonial')))--}}
                                @if(\Illuminate\Support\Str::length($testimonial->getAttribute('testimonial'))>150)
                                    <a class="testimonials-section__btn">развернуть</a>
                                @endif
                                <div class="testimonials-section__back">
                                    <div class="d-flex justify-content-between align-items-center mb-10">
                                        <p class="testimonials-section__name">{{$testimonial->getAttribute('bio')}}</p>
                                        <p class="testimonials-section__date">{{$testimonial->getDate()}}</p>
                                    </div>
                                    <p class="testimonials-section__description testimonials-section__description-full mb-15">
                                        {{$testimonial->getAttribute('testimonial')}}</p>
                                    <a class="testimonials-section__btn">свернуть</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="testimonials-section__pagination" data-aos="fade-up">
                    <div
                        class="d-flex align-items-center testimonials-section__arrow testimonials-section__arrow-prev arrow-prev">
                        <span class="line"></span>
                        <p>назад</p>
                    </div>
                    <div class="testimonials-section__counter">
                        <span
                            class="testimonials-section__counter-text testimonials-section__conter-text-current"></span>
                        <span class="testimonials-section__counter-text">/</span>
                        <span class="testimonials-section__counter-text testimonials-section__conter-text-count"></span>
                    </div>
                    <div
                        class="d-flex align-items-center testimonials-section__arrow testimonials-section__arrow-next arrow-next">
                        <p>далее</p>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
@if(isset($testimonialsDocument) && count($testimonialsDocument))
    <section class="documents-section" data-aos="">
        <div class="container">
            <div class="documents-section__slider">
                <div class="slider">
                    @php
                        $aosDelay = 0;
                    @endphp
                    @foreach($testimonialsDocument as $testimonial)
                        <div class="slide">
                            <img src="{{$testimonial->getImagePath()}}" alt="" class="documents-section__image"
                                 data-aos="fade-up" data-aos-delay="{{ ($aosDelay+=150)<=600?$aosDelay:''}}">
                        </div>
                    @endforeach
                </div>
                <div class="documents-section__pagination">
                    <div
                        class="d-flex align-items-center documents-section__arrow documents-section__arrow-prev arrow-prev">
                        <span class="line"></span>
                        <p>назад</p>
                    </div>
                    <div class="documents-section__counter">
                        <span class="documents-section__counter-text documents-section__conter-text-current"></span>
                        <span class="documents-section__counter-text">/</span>
                        <span class="documents-section__counter-text documents-section__conter-text-count"></span>
                    </div>
                    <div
                        class="d-flex align-items-center documents-section__arrow documents-section__arrow-next arrow-next">
                        <p>далее</p>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
