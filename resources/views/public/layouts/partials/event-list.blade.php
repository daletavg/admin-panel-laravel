<section class="events-section">
    <div class="wrapper">
        <p class="events-section__title mb-20 mb-lg-25"
           class="about_section__text"
           data-aos="fade-up"
           data-aos-once="true"
           data-aos-delay="150"
           data-aos-duration="1000"
        >{{getTranslate('poster.general')}}</p>
        <div class="row">
            @foreach($items as $item)
                <div class="col-12 col-md-6 col-lg-3 mb-10 mb-lg-30">
                    <div class="events-section__card"
                         data-aos="fade-up"
                         data-aos-once="true"
                         data-aos-delay="50"
                         data-aos-duration="1000"
                    >
                        <div class="row events-section__box">
                            <div class="col-6 col-lg-12 events-section__image-box">
                                <img src="{{GetPathToPhoto(imgOrig(\Illuminate\Support\Arr::first($item->images)->path??''))}}" alt="" class="events-section__image">
                            </div>
                            <div class="col-6 col-lg-12 events-section__text d-flex flex-column">
                                <p class="events-section__date">{{$item->date??''}}</p>
                                <p class="events-section__name">{{$item->lang->title??''}}</p>
                                <p class="events-section__date">{{$item->lang->title??''}}</p>
                                @php/*todo add translate*/@endphp
                                <p class="events-section__cost mb-15 mb-lg-0">от {{$item->price_before}} грн.</p>
                                <a href="#" class="events-section__btn mb-10 d-lg-none">Купить билет</a>
                                <a href="#" class="events-section__link d-lg-none">Подробнее <img src="{{asset('img/public/arrow-more.svg')}}" alt=""></a>
                            </div>
                        </div>

                        <div class="events-section__overlay d-none d-lg-flex flex-column justify-content-between">
                            <div class="box d-flex flex-column">
                                <p class="events-section__overlay-date mb-15">{{$item->date??''}}</p>
                                <p class="events-section__overlay-name">{{$item->lang->title??''}}</p>
                                <p class="events-section__overlay-text">{{$item->lang->short_description??''}} </p>
                                <p class="events-section__overlay-date">{{$item->city->lang->title??''}}, {{$item->place->lang->title??''}}</p>
                            </div>
                            <div class="box d-flex flex-column">
                                <a href="event.html" class="events-section__overlay-btn blue-btn mb-15">Подробнее</a>
                                <a href="#" class="events-section__overlay-link red-btn">Купить билет</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

{{--            <div class="col-12 col-md-6 col-lg-3 mb-10 mb-lg-30">--}}
{{--                <div class="events-section__card"--}}
{{--                     data-aos="fade-up"--}}
{{--                     data-aos-delay="100"--}}
{{--                     data-aos-once="true"--}}
{{--                     data-aos-duration="1000"--}}
{{--                >--}}
{{--                    <div class="row events-section__box">--}}
{{--                        <div class="col-6 col-lg-12 events-section__image-box">--}}
{{--                            <img src="img/oskar_2019.jpg" alt="" class="events-section__image">--}}
{{--                        </div>--}}
{{--                        <div class="col-6 col-lg-12 events-section__text d-flex flex-column">--}}
{{--                            <p class="events-section__date">13 октября 19:00</p>--}}
{{--                            <p class="events-section__name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__date">Одесса, Театр Оперы и Балета</p>--}}
{{--                            <p class="events-section__cost mb-15 mb-lg-0">от 250 грн.</p>--}}
{{--                            <a href="#" class="events-section__btn mb-10 d-lg-none">Купить билет</a>--}}
{{--                            <a href="event.html" class="events-section__link d-lg-none">Подробнее <img src="img/arrow-more.svg" alt=""></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="events-section__overlay d-none d-lg-flex flex-column justify-content-between">--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <p class="events-section__overlay-date mb-15">13 октября 19:00</p>--}}
{{--                            <p class="events-section__overlay-name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__overlay-text">Специально для Одесситов и гостей города в период Предновогодних и Рождественских праздников! <br>--}}
{{--                                17 декабря 2019 в театре Оперы и Балета - Большое симфоническое шоу -  «New Year Oscar». </p>--}}
{{--                            <p class="events-section__overlay-date">Театр Оперы и Балета</p>--}}
{{--                        </div>--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <a href="event.html" class="events-section__overlay-btn blue-btn mb-15">Подробнее</a>--}}
{{--                            <a href="#" class="events-section__overlay-link red-btn">Купить билет</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-6 col-lg-3 mb-10 mb-lg-30">--}}
{{--                <div class="events-section__card"--}}
{{--                     data-aos="fade-up"--}}
{{--                     data-aos-delay="150"--}}
{{--                     data-aos-once="true"--}}
{{--                     data-aos-duration="1000"--}}
{{--                >--}}
{{--                    <div class="row events-section__box">--}}
{{--                        <div class="col-6 col-lg-12 events-section__image-box">--}}
{{--                            <img src="img/oskar_2019.jpg" alt="" class="events-section__image">--}}
{{--                        </div>--}}
{{--                        <div class="col-6 col-lg-12 events-section__text d-flex flex-column">--}}
{{--                            <p class="events-section__date">13 октября 19:00</p>--}}
{{--                            <p class="events-section__name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__date">Одесса, Театр Оперы и Балета</p>--}}
{{--                            <p class="events-section__cost mb-15 mb-lg-0">от 250 грн.</p>--}}
{{--                            <a href="#" class="events-section__btn mb-10 d-lg-none">Купить билет</a>--}}
{{--                            <a href="event.html" class="events-section__link d-lg-none">Подробнее <img src="img/arrow-more.svg" alt=""></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="events-section__overlay d-none d-lg-flex flex-column justify-content-between">--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <p class="events-section__overlay-date mb-15">13 октября 19:00</p>--}}
{{--                            <p class="events-section__overlay-name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__overlay-text">Специально для Одесситов и гостей города в период Предновогодних и Рождественских праздников! <br>--}}
{{--                                17 декабря 2019 в театре Оперы и Балета - Большое симфоническое шоу -  «New Year Oscar». </p>--}}
{{--                            <p class="events-section__overlay-date">Театр Оперы и Балета</p>--}}
{{--                        </div>--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <a href="event.html" class="events-section__overlay-btn blue-btn mb-15">Подробнее</a>--}}
{{--                            <a href="#" class="events-section__overlay-link red-btn">Купить билет</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-6 col-lg-3 mb-10 mb-lg-30">--}}
{{--                <div class="events-section__card"--}}
{{--                     data-aos="fade-up"--}}
{{--                     data-aos-delay="200"--}}
{{--                     data-aos-once="true"--}}
{{--                     data-aos-duration="1000"--}}
{{--                >--}}
{{--                    <div class="row events-section__box">--}}
{{--                        <div class="col-6 col-lg-12 events-section__image-box">--}}
{{--                            <img src="img/oskar_2019.jpg" alt="" class="events-section__image">--}}
{{--                        </div>--}}
{{--                        <div class="col-6 col-lg-12 events-section__text d-flex flex-column">--}}
{{--                            <p class="events-section__date">13 октября 19:00</p>--}}
{{--                            <p class="events-section__name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__date">Одесса, Театр Оперы и Балета</p>--}}
{{--                            <p class="events-section__cost mb-15 mb-lg-0">от 250 грн.</p>--}}
{{--                            <a href="#" class="events-section__btn mb-10 d-lg-none">Купить билет</a>--}}
{{--                            <a href="event.html" class="events-section__link d-lg-none">Подробнее <img src="img/arrow-more.svg" alt=""></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="events-section__overlay d-none d-lg-flex flex-column justify-content-between">--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <p class="events-section__overlay-date mb-15">13 октября 19:00</p>--}}
{{--                            <p class="events-section__overlay-name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__overlay-text">Специально для Одесситов и гостей города в период Предновогодних и Рождественских праздников! <br>--}}
{{--                                17 декабря 2019 в театре Оперы и Балета - Большое симфоническое шоу -  «New Year Oscar». </p>--}}
{{--                            <p class="events-section__overlay-date">Театр Оперы и Балета</p>--}}
{{--                        </div>--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <a href="event.html" class="events-section__overlay-btn blue-btn mb-15">Подробнее</a>--}}
{{--                            <a href="#" class="events-section__overlay-link red-btn">Купить билет</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-6 col-lg-3 mb-10 mb-lg-30">--}}
{{--                <div class="events-section__card"--}}
{{--                     data-aos="fade-up"--}}
{{--                     data-aos-once="true"--}}
{{--                     data-aos-delay="50"--}}
{{--                     data-aos-duration="1000"--}}
{{--                >--}}
{{--                    <div class="row events-section__box">--}}
{{--                        <div class="col-6 col-lg-12 events-section__image-box">--}}
{{--                            <img src="img/oskar_2019.jpg" alt="" class="events-section__image">--}}
{{--                        </div>--}}
{{--                        <div class="col-6 col-lg-12 events-section__text d-flex flex-column">--}}
{{--                            <p class="events-section__date">13 октября 19:00</p>--}}
{{--                            <p class="events-section__name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__date">Одесса, Театр Оперы и Балета</p>--}}
{{--                            <p class="events-section__cost mb-15 mb-lg-0">от 250 грн.</p>--}}
{{--                            <a href="#" class="events-section__btn mb-10 d-lg-none">Купить билет</a>--}}
{{--                            <a href="#" class="events-section__link d-lg-none">Подробнее <img src="img/arrow-more.svg" alt=""></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="events-section__overlay d-none d-lg-flex flex-column justify-content-between">--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <p class="events-section__overlay-date mb-15">13 октября 19:00</p>--}}
{{--                            <p class="events-section__overlay-name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__overlay-text">Специально для Одесситов и гостей города в период Предновогодних и Рождественских праздников! <br>--}}
{{--                                17 декабря 2019 в театре Оперы и Балета - Большое симфоническое шоу -  «New Year Oscar». </p>--}}
{{--                            <p class="events-section__overlay-date">Театр Оперы и Балета</p>--}}
{{--                        </div>--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <a href="event.html" class="events-section__overlay-btn blue-btn mb-15">Подробнее</a>--}}
{{--                            <a href="#" class="events-section__overlay-link red-btn">Купить билет</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-6 col-lg-3 mb-10 mb-lg-30">--}}
{{--                <div class="events-section__card"--}}
{{--                     data-aos="fade-up"--}}
{{--                     data-aos-once="true"--}}
{{--                     data-aos-delay="100"--}}
{{--                     data-aos-duration="1000"--}}
{{--                >--}}
{{--                    <div class="row events-section__box">--}}
{{--                        <div class="col-6 col-lg-12 events-section__image-box">--}}
{{--                            <img src="img/oskar_2019.jpg" alt="" class="events-section__image">--}}
{{--                        </div>--}}
{{--                        <div class="col-6 col-lg-12 events-section__text d-flex flex-column">--}}
{{--                            <p class="events-section__date">13 октября 19:00</p>--}}
{{--                            <p class="events-section__name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__date">Одесса, Театр Оперы и Балета</p>--}}
{{--                            <p class="events-section__cost mb-15 mb-lg-0">от 250 грн.</p>--}}
{{--                            <a href="#" class="events-section__btn mb-10 d-lg-none">Купить билет</a>--}}
{{--                            <a href="event.html" class="events-section__link d-lg-none">Подробнее <img src="img/arrow-more.svg" alt=""></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="events-section__overlay d-none d-lg-flex flex-column justify-content-between">--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <p class="events-section__overlay-date mb-15">13 октября 19:00</p>--}}
{{--                            <p class="events-section__overlay-name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__overlay-text">Специально для Одесситов и гостей города в период Предновогодних и Рождественских праздников! <br>--}}
{{--                                17 декабря 2019 в театре Оперы и Балета - Большое симфоническое шоу -  «New Year Oscar». </p>--}}
{{--                            <p class="events-section__overlay-date">Театр Оперы и Балета</p>--}}
{{--                        </div>--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <a href="event.html" class="events-section__overlay-btn blue-btn mb-15">Подробнее</a>--}}
{{--                            <a href="#" class="events-section__overlay-link red-btn">Купить билет</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-6 col-lg-3 mb-10 mb-lg-30">--}}
{{--                <div class="events-section__card"--}}
{{--                     data-aos="fade-up"--}}
{{--                     data-aos-once="true"--}}
{{--                     data-aos-delay="150"--}}
{{--                     data-aos-duration="1000"--}}
{{--                >--}}
{{--                    <div class="row events-section__box">--}}
{{--                        <div class="col-6 col-lg-12 events-section__image-box">--}}
{{--                            <img src="img/oskar_2019.jpg" alt="" class="events-section__image">--}}
{{--                        </div>--}}
{{--                        <div class="col-6 col-lg-12 events-section__text d-flex flex-column">--}}
{{--                            <p class="events-section__date">13 октября 19:00</p>--}}
{{--                            <p class="events-section__name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__date">Одесса, Театр Оперы и Балета</p>--}}
{{--                            <p class="events-section__cost mb-15 mb-lg-0">от 250 грн.</p>--}}
{{--                            <a href="#" class="events-section__btn mb-10 d-lg-none">Купить</a>--}}
{{--                            <a href="event.html" class="events-section__link d-lg-none">Подробнее <img src="img/arrow-more.svg" alt=""></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="events-section__overlay d-none d-lg-flex flex-column justify-content-between">--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <p class="events-section__overlay-date mb-15">13 октября 19:00</p>--}}
{{--                            <p class="events-section__overlay-name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__overlay-text">Специально для Одесситов и гостей города в период Предновогодних и Рождественских праздников! <br>--}}
{{--                                17 декабря 2019 в театре Оперы и Балета - Большое симфоническое шоу -  «New Year Oscar». </p>--}}
{{--                            <p class="events-section__overlay-date">Театр Оперы и Балета</p>--}}
{{--                        </div>--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <a href="event.html" class="events-section__overlay-btn blue-btn mb-15">Подробнее</a>--}}
{{--                            <a href="#" class="events-section__overlay-link red-btn">Купить билет</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-6 col-lg-3 mb-10 mb-lg-30">--}}
{{--                <div class="events-section__card"--}}
{{--                     data-aos="fade-up"--}}
{{--                     data-aos-once="true"--}}
{{--                     data-aos-delay="200"--}}
{{--                     data-aos-duration="1000"--}}
{{--                >--}}
{{--                    <div class="row events-section__box">--}}
{{--                        <div class="col-6 col-lg-12 events-section__image-box">--}}
{{--                            <img src="img/oskar_2019.jpg" alt="" class="events-section__image">--}}
{{--                        </div>--}}
{{--                        <div class="col-6 col-lg-12 events-section__text d-flex flex-column">--}}
{{--                            <p class="events-section__date">13 октября 19:00</p>--}}
{{--                            <p class="events-section__name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__date">Одесса, Театр Оперы и Балета</p>--}}
{{--                            <p class="events-section__cost mb-15 mb-lg-0">от 250 грн.</p>--}}
{{--                            <a href="#" class="events-section__btn mb-10 d-lg-none">Купить</a>--}}
{{--                            <a href="event.html" class="events-section__link d-lg-none">Подробнее <img src="img/arrow-more.svg" alt=""></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="events-section__overlay d-none d-lg-flex flex-column justify-content-between">--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <p class="events-section__overlay-date mb-15">13 октября 19:00</p>--}}
{{--                            <p class="events-section__overlay-name">МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА</p>--}}
{{--                            <p class="events-section__overlay-text">Специально для Одесситов и гостей города в период Предновогодних и Рождественских праздников! <br>--}}
{{--                                17 декабря 2019 в театре Оперы и Балета - Большое симфоническое шоу -  «New Year Oscar». </p>--}}
{{--                            <p class="events-section__overlay-date">Театр Оперы и Балета</p>--}}
{{--                        </div>--}}
{{--                        <div class="box d-flex flex-column">--}}
{{--                            <a href="event.html" class="events-section__overlay-btn blue-btn mb-15">Подробнее</a>--}}
{{--                            <a href="#" class="events-section__overlay-link red-btn">Купить билет</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
        <a href="#"
           data-aos="fade-up"
           data-aos-once="true"
           data-aos-delay="200"
           data-aos-duration="1000"
           class="events-section__more blue-btn">{{getTranslate('show_more.general')}}</a>
    </div>
</section>
