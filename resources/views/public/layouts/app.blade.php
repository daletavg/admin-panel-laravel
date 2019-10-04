<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    @include('public.layouts.partials.meta')
    @include('public.layouts.partials.styles')
    <title>{{$pageTitle??env('APP_NAME')}}</title>
    <link rel="shortcut icon" href="{{asset('img/favicon/favicon.ico')}}" type="image/x-icon">
</head>
<body>
<header class="header">
    <div class="container">
        <nav class="mobile-menu d-lg-none">
            <div id="nav-icon1">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a href="{{route('home')}}" class="header-logo header-logo-night">
                <img src="{{asset('img/logoNight.svg')}}" alt="logo">
            </a>
            <a href="{{route('home')}}" class="header-logo header-logo-day">
                <img src="{{asset('img/header-logo.svg')}}" alt="logo">
            </a>
            <a class="phone-day" href="" data-toggle="modal" data-target="#callModal">
                <img src="{{asset('img/phone.svg')}}" alt="">
            </a>
            <a class="phone-night" href="" data-toggle="modal" data-target="#callModal">
                <img src="{{asset('img/phoneNight.svg')}}" alt="">
            </a>
        </nav>
        <div class="container d-none d-lg-flex justify-content-between">
            <nav class="desc-menu-left">
                <a  class="desc-menu-left__item" href="{{route('document')}}">Дипломы</a>
                <a class="desc-menu-left__item" href="{{route('price')}}">Прайс</a>
                <a class="desc-menu-left__item" href="{{route('about')}}">Специалисты</a>
                <a class="desc-menu-left__item" href="{{route('stock')}}">Акции</a>
                <a class="desc-menu-left__item" href="{{route('contacts')}}">Контакты</a>
            </nav>
            <div class="desc-menu-right">
                <a class="desc-logo header-logo-night" href="{{route('home')}}">
                    <img src="{{asset('img/logoNight.svg')}}" alt="">
                </a>
                <a class="desc-logo header-logo-day" href="{{route('home')}}">
                    <img src="{{asset('img/header-logo.svg')}}" alt="">
                </a>
                <span class="call-link" >
                    <img src="{{asset('img/phone-lg.svg')}}" alt="">
                    Связаться
                    <nav class="phone-list list-group">
                        @foreach ($phones as $phone)
                            <a class="list-group-item" href="tel:{{$phone}}">{{$phone}}</a>
                        @endforeach
                    </nav>
                </span>
            </div>
        </div>
    </div>
    <div class="menu-dropdown menu-dropdown_position mb-0 d-lg-none d-flex flex-column justify-content-between menu-mobile">
        <nav class="menu-dropdown__item sub__item text-center">
            <a class="menu-dropdown-link menu-item-text-style_first justify-content-center  " href="{{route('about')}}">О нас</a>
            <div class="something-very-bad-className">
                <div class="d-inline-block">
                        <span class="menu-dropdown-link ">
                            <span class="menu-arrow"></span>
                            <span class="menu-item-text-style_first">Инъекционная косметология</span>
                        </span>
                    <ul class="menu-dropdown sub mb-0 ">
                        <li class="menu-dropdown__item sub__item">
                                      <span class="menu-dropdown-link pl-75">
                                            <span class="menu-arrow menu-arrow_left"></span><span
                                              class="menu-item-text-style_second">Контурная пластика</span>
                                      </span>

                            <ul class="menu-dropdown sub">
                                <li class="menu-dropdown__item sub__item">
                                    <a href="{{route('services',$contourPlasticUrl)}}" class="menu-dropdown-link pl-105 menu-item-text-style_third">
                                        Губы
                                    </a>
                                </li>
                                <li class="menu-dropdown__item sub__item">
                                    <a href="{{route('services',$contourPlasticUrl)}}" class="menu-dropdown-link pl-105 menu-item-text-style_third">
                                        Носогубная складка
                                    </a>
                                </li>
                                <li class="menu-dropdown__item sub__item">
                                    <a href="{{route('services',$contourPlasticUrl)}}" class="menu-dropdown-link pl-105 menu-item-text-style_third">
                                        Скулы
                                    </a>
                                </li>
                                <li class="menu-dropdown__item sub__item">
                                    <a href="{{route('services',$contourPlasticUrl)}}" class="menu-dropdown-link pl-105 menu-item-text-style_third">
                                        Подбородок
                                    </a>
                                </li>
                                <li class="menu-dropdown__item sub__item">
                                    <a href="{{route('services',$contourPlasticUrl)}}" class="menu-dropdown-link pl-105 menu-item-text-style_third">
                                        Углы нижней челюсти
                                    </a>
                                </li>
                                <li class="menu-dropdown__item sub__item">
                                    <a href="{{route('services',$contourPlasticUrl)}}" class="menu-dropdown-link pl-105 menu-item-text-style_third">
                                        Носослезная борозда
                                    </a>
                                </li>
                                <li class="menu-dropdown__item sub__item">
                                    <a href="{{route('services',$contourPlasticUrl)}}" class="menu-dropdown-link pl-105 menu-item-text-style_third">
                                        Комплексная коррекция
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-dropdown__item sub__item">
                            <a href="{{route('services',$butolinUrl)}}" class="menu-dropdown-link pl-75 menu-item-text-style_second">
                                Коррекция мимических морщин
                            </a>
                        </li>
                        <li class="menu-dropdown__item sub__item">
                            <a href="{{route('services',$vectolLiftingUrl)}}" class="menu-dropdown-link pl-75 menu-item-text-style_second">
                                Векторный лифтинг
                            </a>
                        </li>
                        <li class="menu-dropdown__item sub__item">
                            <a href="{{route('services',$biorevitalizationUrl)}}" class="menu-dropdown-link pl-75 menu-item-text-style_second">
                                Биоревитализация
                            </a>
                        </li>
                        <li class="menu-dropdown__item sub__item">
                            <a href="{{route('services',$butolinUrl)}}" class="menu-dropdown-link pl-75 menu-item-text-style_second">
                                Коррекция гипергидроза
                            </a>
                        </li>
                        <li class="menu-dropdown__item sub__item">
                            <a href="{{route('services',$plazmaUrl)}}" class="menu-dropdown-link pl-75 menu-item-text-style_second">
                                Плазмотерапия
                            </a>
                        </li>
                        <li class="menu-dropdown__item sub__item">
                            <a href="{{route('services',$lolitikiUrl)}}" class="menu-dropdown-link pl-75 menu-item-text-style_second">
                                Липолитики
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="d-inline-block">
                        <span class="menu-dropdown-link ">
                            <span class="menu-arrow"></span>
                            <span class="menu-item-text-style_first">Эстетическая косметология</span>
                        </span>

                    <ul class="menu-dropdown sub mb-0 ">
                        <li class="menu-dropdown__item sub__item">
                            <a href="{{route('services',$pilingUrl)}}" class="menu-dropdown-link pl-75 menu-item-text-style_second">
                                Чистка лица
                            </a>
                        </li>
                        <li class="menu-dropdown__item sub__item">
                            <a href="{{route('services',$pilingUrl)}}" class="menu-dropdown-link pl-75 menu-item-text-style_second">
                                Пилинги
                            </a>
                        </li>
                        <li class="menu-dropdown__item sub__item">
                            <a href="{{route('services',$pilingUrl)}}" class="menu-dropdown-link pl-75 menu-item-text-style_second">
                                Другое
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <a class="menu-dropdown-link menu-item-text-style_first  justify-content-center" href="{{route('document')}}">Дипломы</a>
            <a class="menu-dropdown-link menu-item-text-style_first  justify-content-center" href="{{route('price')}}">Прайс</a>
            <a class="menu-dropdown-link menu-item-text-style_first  justify-content-center" href="{{route('stock')}}">Акции</a>
            <a class="menu-dropdown-link menu-item-text-style_first  justify-content-center" href="{{route('contacts')}}">Контакты</a>

        </nav>
        <nav class="footer footer_mob-menu">
            <a href="" data-toggle="modal" data-target="#phoneModal" class="custom-btn custom-btn_mb30">Получить консультацию</a>
            <div class="d-flex justify-content-between align-items-center">
                <span class="theme-icon night">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="22" viewBox="0 0 21 22"><g><g><path
                            d="M4.424 17.696C2.512 15.846 1.556 13.614 1.556 11c0-1.85.486-3.555 1.458-5.117.972-1.563 2.268-2.726 3.889-3.492-.39 1.148-.584 2.423-.584 3.826 0 3.125 1.086 5.835 3.257 8.13 2.172 2.296 4.845 3.572 8.021 3.827-1.75 1.53-3.856 2.296-6.32 2.296-2.657 0-4.941-.925-6.853-2.774zm14.048-1.053c-2.916 0-5.412-1.02-7.486-3.06-2.074-2.041-3.111-4.496-3.111-7.366 0-1.594.356-3.092 1.07-4.495.194-.383.55-.957 1.069-1.722-.908.128-1.62.255-2.139.383-2.333.701-4.23 2.024-5.688 3.97C.73 6.296 0 8.512 0 11c0 3.06 1.102 5.66 3.306 7.796C5.509 20.932 8.166 22 11.278 22c3.5 0 6.352-1.307 8.555-3.922.324-.446.713-1.02 1.167-1.721a7.175 7.175 0 0 1-2.042.286z"/></g></g></svg>
                </span>
                <div class="social-box">
                    <a target="_blank" href="{{url($linkInstagram??'')}}" class="social-box__item">
                        <img src="{{asset('img/inst.svg')}}" alt="">
                    </a>
                    <a target="_blank" href="{{url($linkFacebook??'')}}" class="social-box__item">
                        <img src="{{asset('img/fb.svg')}}" alt="">
                    </a>
                </div>
                <span class="theme-icon day">
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"><g><g><path
                            d="M19.48 11.53c-1.099-1.164-2.424-1.746-3.975-1.746-1.551 0-2.893.566-4.024 1.697-1.131 1.131-1.697 2.473-1.697 4.024 0 1.551.566 2.893 1.697 4.024 1.131 1.131 2.473 1.697 4.024 1.697 1.551 0 2.893-.566 4.024-1.697 1.131-1.131 1.697-2.473 1.697-4.024 0-1.551-.582-2.876-1.746-3.975zm1.243 9.201c-1.42 1.421-3.163 2.131-5.228 2.131s-3.808-.71-5.228-2.13c-1.42-1.422-2.13-3.165-2.13-5.232s.71-3.81 2.13-5.231c1.42-1.421 3.163-2.131 5.228-2.131s3.808.71 5.228 2.13c1.42 1.422 2.13 3.165 2.13 5.232s-.71 3.81-2.13 5.231zM5.038 24.793l3.293-3.287 1.066 1.16L6.2 25.953zM22.184 7.75l3.197-3.294 1.163 1.163-3.294 3.197zM6.197 4.456l3.287 3.197-1.16 1.163-3.286-3.294zm17.053 17.05l3.294 3.287-1.163 1.16-3.197-3.287zM0 16.372v-1.744h5.813v1.744zm25.575 0v-1.744h5.415v1.744zM14.628 31v-5.813h1.744V31zm0-25.565V0h1.744v5.435z"/></g></g></svg>
                </span>
            </div>
        </nav>
    </div>
</header>

<span class="line line_top"></span>
<span class="line line_bottom"></span>
<span class="line-left"></span>
<span class="line-right"></span>
 {!! $content ?? ''!!}
@include('public.layouts.partials.modal')

<footer class="">
    <div class="footer d-lg-none">
        <a href="" data-toggle="modal" data-target="#phoneModal" class="custom-btn custom-btn_mb30">Получить консультацию</a>
        <div class="d-flex justify-content-between align-items-center">
                <span class="theme-icon night">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="22" viewBox="0 0 21 22"><g><g><path  d="M4.424 17.696C2.512 15.846 1.556 13.614 1.556 11c0-1.85.486-3.555 1.458-5.117.972-1.563 2.268-2.726 3.889-3.492-.39 1.148-.584 2.423-.584 3.826 0 3.125 1.086 5.835 3.257 8.13 2.172 2.296 4.845 3.572 8.021 3.827-1.75 1.53-3.856 2.296-6.32 2.296-2.657 0-4.941-.925-6.853-2.774zm14.048-1.053c-2.916 0-5.412-1.02-7.486-3.06-2.074-2.041-3.111-4.496-3.111-7.366 0-1.594.356-3.092 1.07-4.495.194-.383.55-.957 1.069-1.722-.908.128-1.62.255-2.139.383-2.333.701-4.23 2.024-5.688 3.97C.73 6.296 0 8.512 0 11c0 3.06 1.102 5.66 3.306 7.796C5.509 20.932 8.166 22 11.278 22c3.5 0 6.352-1.307 8.555-3.922.324-.446.713-1.02 1.167-1.721a7.175 7.175 0 0 1-2.042.286z"/></g></g></svg>
                </span>
            <div class="social-box">
                <a target="_blank" href="{{url($linkInstagram??'')}}" class="social-box__item">
                    <img src="{{asset('img/inst.svg')}}" alt="">
                </a>
                <a target="_blank" href="{{url($linkFacebook??'')}}" class="social-box__item">
                    <img src="{{asset('img/fb.svg')}}" alt="">
                </a>
            </div>
            <span class="theme-icon day">
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"><g><g><path  d="M19.48 11.53c-1.099-1.164-2.424-1.746-3.975-1.746-1.551 0-2.893.566-4.024 1.697-1.131 1.131-1.697 2.473-1.697 4.024 0 1.551.566 2.893 1.697 4.024 1.131 1.131 2.473 1.697 4.024 1.697 1.551 0 2.893-.566 4.024-1.697 1.131-1.131 1.697-2.473 1.697-4.024 0-1.551-.582-2.876-1.746-3.975zm1.243 9.201c-1.42 1.421-3.163 2.131-5.228 2.131s-3.808-.71-5.228-2.13c-1.42-1.422-2.13-3.165-2.13-5.232s.71-3.81 2.13-5.231c1.42-1.421 3.163-2.131 5.228-2.131s3.808.71 5.228 2.13c1.42 1.422 2.13 3.165 2.13 5.232s-.71 3.81-2.13 5.231zM5.038 24.793l3.293-3.287 1.066 1.16L6.2 25.953zM22.184 7.75l3.197-3.294 1.163 1.163-3.294 3.197zM6.197 4.456l3.287 3.197-1.16 1.163-3.286-3.294zm17.053 17.05l3.294 3.287-1.163 1.16-3.197-3.287zM0 16.372v-1.744h5.813v1.744zm25.575 0v-1.744h5.415v1.744zM14.628 31v-5.813h1.744V31zm0-25.565V0h1.744v5.435z"/></g></g></svg>
            </span>
        </div>
    </div>
    <div class="container d-none d-lg-flex justify-content-between align-items-center footer-desctop">
        <div class="theme-box">
            <span class="theme-icon night">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="22" viewBox="0 0 21 22"><g><g><path  d="M4.424 17.696C2.512 15.846 1.556 13.614 1.556 11c0-1.85.486-3.555 1.458-5.117.972-1.563 2.268-2.726 3.889-3.492-.39 1.148-.584 2.423-.584 3.826 0 3.125 1.086 5.835 3.257 8.13 2.172 2.296 4.845 3.572 8.021 3.827-1.75 1.53-3.856 2.296-6.32 2.296-2.657 0-4.941-.925-6.853-2.774zm14.048-1.053c-2.916 0-5.412-1.02-7.486-3.06-2.074-2.041-3.111-4.496-3.111-7.366 0-1.594.356-3.092 1.07-4.495.194-.383.55-.957 1.069-1.722-.908.128-1.62.255-2.139.383-2.333.701-4.23 2.024-5.688 3.97C.73 6.296 0 8.512 0 11c0 3.06 1.102 5.66 3.306 7.796C5.509 20.932 8.166 22 11.278 22c3.5 0 6.352-1.307 8.555-3.922.324-.446.713-1.02 1.167-1.721a7.175 7.175 0 0 1-2.042.286z"/></g></g></svg>
            </span>
            <span class="theme-icon theme-icon_active day">
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"><g><g><path  d="M19.48 11.53c-1.099-1.164-2.424-1.746-3.975-1.746-1.551 0-2.893.566-4.024 1.697-1.131 1.131-1.697 2.473-1.697 4.024 0 1.551.566 2.893 1.697 4.024 1.131 1.131 2.473 1.697 4.024 1.697 1.551 0 2.893-.566 4.024-1.697 1.131-1.131 1.697-2.473 1.697-4.024 0-1.551-.582-2.876-1.746-3.975zm1.243 9.201c-1.42 1.421-3.163 2.131-5.228 2.131s-3.808-.71-5.228-2.13c-1.42-1.422-2.13-3.165-2.13-5.232s.71-3.81 2.13-5.231c1.42-1.421 3.163-2.131 5.228-2.131s3.808.71 5.228 2.13c1.42 1.422 2.13 3.165 2.13 5.232s-.71 3.81-2.13 5.231zM5.038 24.793l3.293-3.287 1.066 1.16L6.2 25.953zM22.184 7.75l3.197-3.294 1.163 1.163-3.294 3.197zM6.197 4.456l3.287 3.197-1.16 1.163-3.286-3.294zm17.053 17.05l3.294 3.287-1.163 1.16-3.197-3.287zM0 16.372v-1.744h5.813v1.744zm25.575 0v-1.744h5.415v1.744zM14.628 31v-5.813h1.744V31zm0-25.565V0h1.744v5.435z"/></g></g></svg>
            </span>
        </div>
        <a href="" data-toggle="modal" data-target="#phoneModal" class="custom-btn">Получить консультацию</a>
        <div class="social-box social-box-fixed">
            <a target="_blank" href="{{url($linkInstagram??'')}}" class="social-box__item">
                <img src="{{asset('img/inst.svg')}}" alt="">
            </a>
            <a target="_blank" href="{{url($linkFacebook??'')}}" class="social-box__item">
                <img src="{{asset('img/fb.svg')}}" alt="">
            </a>
        </div>
    </div>
</footer>

<!--   Core JS Files   -->
@include('public.layouts.partials.scripts')
</body>
</html>
