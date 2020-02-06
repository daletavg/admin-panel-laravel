<footer class="footer">
    <div class="container" data-aos="fade-in">
        <div class="footer__container">
            <a href="{{route('home')}}" class="footer__logo order-2 order-lg-0" data-aos="fade-up" data-aos-offset="0"
               data-aos-delay="">
                <img src="{{asset('img/footer-logo.svg')}}" alt="" class="footer__logo-icon">
            </a>
            <div class="footer__list d-none d-lg-flex" data-aos="fade-up" data-aos-offset="0" data-aos-delay="150">
                <p class="footer__subtitle">Разделы</p>
                <a href="{{route('about')}}" class="footer__link">О нас</a>
                <a href="{{route('news')}}" class="footer__link">Новости </a>
                <a href="{{route('contact')}}" class="footer__link">Контакты</a>
            </div>
            <div class="footer__list d-none d-lg-flex" data-aos="fade-up" data-aos-offset="0" data-aos-delay="300">
                <p class="footer__subtitle">Услуги</p>
                @foreach($services as $service)
                    <a href="{{route('services',['url'=>$service->getAttribute('url')])}}" class="footer__link">{{$service->getAttribute('title')}}</a>
                @endforeach
            </div>
            <div class="footer__contacts order-1" data-aos="fade-up" data-aos-offset="0" data-aos-delay="450">
                <a href="tel:{{$firstPhone}}" class="d-flex align-items-center mb-lg-15">
                    <img src="{{asset('img/phone.svg')}}" alt="" class="footer__contacts-icon">
                    <span class="footer__contacts-text">{{$firstPhone}}</span>
                </a>
                <a href="tel:{{$secondPhone}}" class="d-flex align-items-center mb-lg-15">
                    <img src="{{asset('img/viber.svg')}}" alt="" class="footer__contacts-icon">
                    <span class="footer__contacts-text">{{$secondPhone}}</span>
                </a>
                <div class="d-flex align-items-center mb-lg-15">
                    <!-- <img src="img/viber.svg" alt="" class="footer__contacts-icon"> -->
                    <span class="footer__contacts-text d-none d-lg-block">{{$address}}</span>
                </div>
                <a href="mailto:{{$email}}" class="d-flex align-items-center">
                    <img src="{{asset('img/mail.svg')}}" alt="" class="footer__contacts-icon">
                    <span class="footer__contacts-text">{{$email}}</span>
                </a>
            </div>
            <div class="footer__social d-none d-lg-flex order-lg-2" data-aos="fade-up" data-aos-offset="0"
                 data-aos-delay="600">
                <a href="{{$instagram}}" target="_blank" class="footer__social-link">
                    <img src="{{asset('img/insta.svg')}}" alt="" class="footer__social-icon">
                </a>
                <a href="{{$facebook}}" target="_blank" class="footer__social-link">
                    <img src="{{asset('img/facebook.svg')}}" alt="" class="footer__social-icon">
                </a>
            </div>
        </div>
        <div class="footer__line" data-aos="fade-in" data-aos-delay="750" data-aos-easing="ease-in-out"
             data-aos-duration="800" data-aos-offset="0"></div>
        <div class="footer__copyright" data-aos="fade-in" data-aos-delay="750" data-aos-easing="ease-in-out"
             data-aos-duration="800" data-aos-offset="0">
            <p class="footer__copyright-text">ООО Единый Центр Кадастровых Работ</p>
            <a href="http://micorestudio.com" target="_blank" class="footer__copyright-text footer__copyright-link">by
                MantiCore</a>
        </div>
    </div>
</footer>
