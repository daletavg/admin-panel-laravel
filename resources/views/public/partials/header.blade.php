<header class="header">
    <div class="wrapper position-relative" data-aos="fade-in">
        <div class="header__container">
            <div class="header__burger d-xl-none">
                <span class="header__burger-item header__burger-item-first"></span>
                <span class="header__burger-item header__burger-item-second"></span>
                <span class="header__burger-item header__burger-item-third"></span>
            </div>
            <div class="d-flex align-items-center">
                <a href="{{route('home')}}" class="header__logo">
                    <img src="{{asset('img/logo.svg')}}" alt="" class="header__logo-img">
                </a>
                <div class="header__list d-none d-xl-flex">
                    <div class="header__list-item cursor-pointer">
                        <div class="d-flex align-items-center header__dropdown">
                            <p class="header__link">Услуги</p>
                            <!-- <img src="img/arrow_down-white.svg" alt="" class="header__list-item-img"> -->
                            <svg class="header__list-item-img" xmlns="http://www.w3.org/2000/svg" width="13" height="8"
                                 viewBox="0 0 13 8">
                                <g>
                                    <g>
                                        <path fill="#fff"
                                              d="M.224.978A.509.509 0 0 1 .343.659.387.387 0 0 1 .627.54c.111 0 .206.04.285.12L6.27 6.652l5.275-5.9A.369.369 0 0 1 11.83.62c.11 0 .205.044.284.132a.461.461 0 0 1 .119.318c0 .124-.04.23-.119.319l-5.56 6.218a.369.369 0 0 1-.284.133.369.369 0 0 1-.285-.133L.343 1.31a.442.442 0 0 1-.09-.152.547.547 0 0 1-.029-.18z"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="header__droplist">
                            <div class="row position-relative">
                                <div class="col-5">
                                    @foreach($services as $service)
                                        <a href="{{route('services',$service->getAttribute('url'))}}"
                                           class="header__droplist-item {{$loop->iteration===1?'active':''}}"
                                           data-drop="#drop{{$loop->iteration}}">
                                            <span class="header__droplist-line"></span>
                                            <p class="header__droplist-text">{{$service->getAttribute('title')}}</p>
                                        </a>
                                    @endforeach
                                </div>
                                @foreach($services as $service)
                                    <div class="col-7 header__droplist-body {{$loop->iteration===1?'active':''}}"
                                         id="drop{{$loop->iteration}}">
                                        @foreach($service->getAttribute('subservices') as $subservice)
                                            <a href="{{route('services',['url'=>$service->getAttribute('url')]).'#'.$subservice->getAttribute('url')}}" class="header__droplist-item">
                                                <span class="header__droplist-line"></span>
                                                <p class="header__droplist-text">{{$subservice->getAttribute('title')}}</p>
                                            </a>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <a href="{{route('about')}}" class="header__link">О нас</a>
                    <a href="{{route('news')}}" class="header__link">Новости</a>
                    <a href="{{route('contact')}}" class="header__link">Контакты</a>
                </div>
            </div>
            <div class="header__contact d-none d-xl-flex">
                <div class="header__row">
                    <img style="width: 25px; height: 18px;" src="{{asset('img/mail.svg')}}" alt=""
                         class="header__row-icon">
                    <a href="mailto:{{$email}}" class="header__row-text">{{$email}}</a>
                </div>
                <div class="header__row">
                    <img style="width: 13px; height: 24px;" src="{{asset('img/header__phone.svg')}}" alt=""
                         class="header__row-icon">
                    <div class="d-flex flex-column">
                        <a href="tel:{{$firstPhone}}" class="header__row-text header__row-text-small">{{$firstPhone}}</a>
                        <a href="tel:8 (965) 763 07 05" class="header__row-text header__row-text-small">{{$secondPhone}}</a>
                    </div>
                </div>
            </div>
            <a data-toggle="modal" data-target="#phoneModal" class="header__phone cursor-pointer d-xl-none">
                <img src="{{asset('img/header__phone.svg')}}" alt="" class="header__phone-img">
            </a>
        </div>
        <div class="header__line d-none d-xl-block"></div>
    </div>
</header>
