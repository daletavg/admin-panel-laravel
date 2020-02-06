<div class="menu">
    <div class="menu__container">
        <div class="menu__list">
            <div class="menu__dropdown  menu__dropdown-main w-100">
                <div class="menu__link menu__main-link justify-content-center">
                    <span class="menu__link-text">Услуги</span>
                    <img src="{{asset('img/menu__arrow.svg')}}" alt="" class="menu__link-icon">
                </div>
                <div class="menu__droplist">
                    @foreach($services as $service)
                        <div class="menu__dropdown menu_subdropdown">
                            <div class="menu__link menu__sublink">
                                <span data-href="{{route('services',$service->getAttribute('url'))}}" class="menu__link-text menu__sublink-text">{{$service->getAttribute('title')}}</span>
                                <img src="{{asset('img/menu__arrow.svg')}}" alt="" class="menu__link-icon">
                            </div>
                            <div class="menu__droplist">
                                @foreach($service->getAttribute('subservices')->sortBy('sort') as $subservice)
                                    <a href="{{route('services',['url'=>$service->getAttribute('url')]).'#'.$subservice->getAttribute('url')}}" class="menu__sublink">
                                        <span class="menu__link-text menu__sublink-text-small">{{$subservice->getAttribute('title')}}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <a href="{{route('about')}}" class="menu__link menu__link-standart" style="display: block;">
                <span class="menu__link-text" style="display: block;">О нас</span>

            </a>
            <a href="{{route('news')}}" class="menu__link menu__link-standart" style="display: block;">
                <span class="menu__link-text" style="display: block;">Новости</span>

            </a>
            <a href="{{route('contact')}}" class="menu__link menu__link-standart" style="display: block;">
                <span class="menu__link-text" style="display: block;">Контакты</span>

            </a>
        </div>
        <div class="menu__contacts">
            <div class="menu__contacts-background"></div>
            <div class="row menu__contacts-row">
                <div class="col-6">
                    <div class="d-flex align-items-center mb-10">
                        <img src="{{asset('img/phone.svg')}}" alt="" class="menu__contacts-icon">
                        <p class="menu__contacts-text menu__contacts-text-big">{{$firstPhone}}</p>
                    </div>
                    <div class="d-flex align-items-center mb-10">
                        <img src="{{asset('img/viber.svg')}}" alt="" class="menu__contacts-icon">
                        <p class="menu__contacts-text menu__contacts-text-big">{{$secondPhone}}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="{{asset('img/mail.svg')}}" alt="" class="menu__contacts-icon">
                        <p class="menu__contacts-text">{{$email}}</p>
                    </div>
                </div>
                <div class="col-6 d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center justify-content-around">
                        <a href="{{$instagram}}" class="menu__contacts-social">
                            <img src="{{asset('img/menu_instagram.svg')}}" alt="" class="menu__contacts-social-icon">
                        </a>
                        <a href="{{$facebook}}" class="menu__contacts-social">
                            <img src="{{asset('img/menu_facebook.svg')}}" alt="" class="menu__contacts-social-icon">
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="{{asset('img/placeholder.svg')}}" alt="" class="menu__contacts-icon">
                        <p class="menu__contacts-text">{{$address}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
