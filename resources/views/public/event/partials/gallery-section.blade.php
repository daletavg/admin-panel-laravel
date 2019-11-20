@if(isset($item->manyImages) && $item->manyImages !==null)
    <section class="gallery_section"
             class="about_section__text"
             data-aos="fade-up"
             data-aos-once="true"
             data-aos-delay="150"
             data-aos-duration="1000"
    >
        <div class="wrapper">
            <p class="gallery_section__title mb-20">{{getTranslate('gallery.events')}}</p>
        </div>
        <div class="gallery_section__slider">
            <div class="slider">
                @foreach($item->manyImages->images as $image)
                    <div class="slide">
                        <div class="gallery_section__slide">
                            <img src="{{GetPathToPhoto(imgOrig($image->path))}}" alt=""
                                 class="gallery_section__image">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="gallery_section__slider-dots">
            <div class="gallery_section__slider-arrow-prev">
                <img src="{{asset('img/public/red-slick-arrow.svg')}}" alt="">
            </div>
            <div class="dots-wrapper"></div>
            <div class="gallery_section__slider-arrow-next">
                <img src="{{asset('img/public/red-slick-arrow.svg')}}" alt="">
            </div>
        </div>

    </section>
@endif
