<section class="mobile-feedback d-lg-none" data-aos="fade-up"

         data-aos-delay="50"
         data-aos-duration="1000"
         data-aos-once=true>
    <div class="wrapper">
        <form action="" class="mobile-feedback__form d-flex flex-column align-items-center">
            <p class="mobile-feedback__title">{{getTranslate('send_as.form')}}</p>
            <input type="text" class="mobile-feedback__input mb-15" placeholder="{{getTranslate('name.form')}}">
            <input type="tel" class="mobile-feedback__input mb-15" placeholder="{{getTranslate('phone.form')}}">
            <input type="text" class="mobile-feedback__input mb-30" placeholder="{{getTranslate('message.form')}}">
            <button type="submit" class="mobile-feedback__btn">{{getTranslate('send.form')}}</button>
        </form>
    </div>
</section>

<footer class="footer"
        data-aos="fade-up"

        data-aos-delay="100"
        data-aos-duration="1000"
        data-aos-once=true
>
    <div class="wrapper">
        <div class="row">
            <div class="col-3 pt-3 footer-nav d-lg-flex flex-column d-none">
                <a href="{{route('home.index')}}" class="footer-nav__logo mb-20">
                    <img src="img/XL/Logo/logo_artpoint.svg" alt="" class="footer-nav__logo-image">
                </a>
                <a href="{{route('about.index')}}" class="footer-nav__link mb-20">{{getTranslate('about_company.global')}}</a>
                <a href="{{route('services.index')}}" class="footer-nav__link mb-20">{{getTranslate('partners.global')}}</a>
                <a href="{{route('history.index')}}" class="footer-nav__link mb-20">{{getTranslate('project_history.global')}}</a>
                <a href="{{route('partners.index')}}" class="footer-nav__link">{{getTranslate('our_services.global')}}</a>
            </div>
            <div class="col-4 pt-4 offset-lg-1 d-none d-lg-block">
                <form action="" class="mobile-feedback__form d-flex flex-column align-items-center">
                    <p class="mobile-feedback__title">{{getTranslate('send_as.form')}}</p>
                    <input type="text" class="mobile-feedback__input mb-15" placeholder="{{getTranslate('name.form')}}">
                    <input type="tel" class="mobile-feedback__input mb-15" placeholder="{{getTranslate('phone.form')}}">
                    <input type="text" class="mobile-feedback__input mb-30" placeholder="{{getTranslate('message.form')}}">
                    <button type="submit" class="mobile-feedback__btn"><span>{{getTranslate('send.form')}}</span></button>
                </form>
            </div>
            <div class="col-8 offset-2 col-lg-3 offset-lg-1 footer-contacts d-flex flex-column align-items-center align-items-lg-end">
                <p class="footer-contacts__title mb-10">{{getTranslate('contacts.global')}}</p>
                <a class="footer-contacts__box d-flex align-items-center mb-15">
                    <img src="img/XL/mail.svg" alt="" class="footer-contacts__icon">
                    <span class="footer-contacts__text">artpoint2004@gmail.com</span>
                </a>
                <a class="footer-contacts__box d-flex align-items-center mb-20">
                    <img src="img/XL/mail.svg" alt="" class="footer-contacts__icon">
                    <span class="footer-contacts__text">titar.yura@gmail.com</span>
                </a>
                <a class="footer-contacts__box d-flex align-items-start mb-15">
                    <img src="img/XL/Phone.svg" alt="" class="footer-contacts__icon">
                    <span class="footer-contacts__text text-lg-right">+38 (066) 634-09-55 <br> Юрий Иванов </span>
                </a>
                <a class="footer-contacts__box d-flex align-items-start">
                    <img src="img/XL/Phone.svg" alt="" class="footer-contacts__icon">
                    <span class="footer-contacts__text text-lg-right">+38 (063) 181-87-28 <br> Юрий Титарь </span>
                </a>
                <p class="footer-social__title mt-4">{{getTranslate('social.global')}}</p>
                <div class="footer-social w-100 mb-10">

                    <div class="d-flex align-items-center justify-content-between">
                        <a href="#" class="footer-social__icon">
                            <svg width="25px" height="24px" viewBox="0 0 25 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 58 (84663) - https://sketch.com -->
                                <title>1384031</title>
                                <desc>Created with Sketch.</desc>
                                <g id="Symbols" stroke="none" stroke-width="1"  fill-rule="evenodd">
                                    <g id="Футер" transform="translate(-1086.000000, -260.000000)"  fill-rule="nonzero">
                                        <g id="Group-18" transform="translate(1082.000000, 35.000000)">
                                            <g id="Group-16" transform="translate(0.000000, 189.000000)">
                                                <g id="Group-14" transform="translate(4.000000, 36.000000)">
                                                    <g id="1384031">
                                                        <path d="M24.3004237,7.04091279 C24.2443093,5.76843884 24.0384958,4.89362442 23.7436672,4.135586 C23.4395166,3.33094679 22.9715926,2.61055437 22.358539,2.01168937 C21.7595598,1.40350421 21.0342776,0.93091805 20.2388068,0.631576895 C19.4762368,0.336804473 18.6058251,0.131030264 17.3331083,0.0749266337 C16.0508869,0.01407158 15.6438296,0 12.3917577,0 C9.13968591,0 8.73262857,0.01407158 7.45515949,0.0701752105 C6.18244275,0.126278841 5.3074614,0.332235739 4.54946106,0.626825471 C3.74448559,0.93091805 3.02395572,1.39875279 2.42497645,2.01168937 C1.81667524,2.61055437 1.34418163,3.33569821 1.04460063,4.13101726 C0.749771964,4.89362442 0.543958492,5.76368742 0.487844156,7.03616136 C0.426977491,8.31813816 0.412903226,8.72511784 0.412903226,11.9765693 C0.412903226,15.2280207 0.426977491,15.6350004 0.483091826,16.9122257 C0.539206162,18.1846997 0.745202359,19.0595141 1.04003103,19.8175525 C1.34418163,20.6221917 1.81667524,21.3425842 2.42497645,21.9414492 C3.02395572,22.5496343 3.74923792,23.0222205 4.54470873,23.3215616 C5.3074614,23.616334 6.17769042,23.8221083 7.45058989,23.8782119 C8.72787624,23.9344982 9.1351163,23.9483871 12.3871881,23.9483871 C15.63926,23.9483871 16.0463173,23.9344982 17.3237864,23.8782119 C18.5965031,23.8221083 19.4714845,23.616334 20.2294848,23.3215616 C21.839253,22.6993049 23.1119698,21.4268309 23.7343452,19.8175525 C24.0289912,19.0549454 24.2349874,18.1846997 24.2911017,16.9122257 C24.3472161,15.6350004 24.3612903,15.2280207 24.3612903,11.9765693 C24.3612903,8.72511784 24.356538,8.31813816 24.3004237,7.04091279 Z M22.1434036,16.8186588 C22.0918589,17.9882456 21.8953674,18.6198225 21.731594,19.0408738 C21.3291062,20.0841818 20.5009173,20.9122127 19.4574102,21.3146237 C19.0362786,21.4783658 18.4000116,21.6748199 17.2347712,21.7261721 C15.9713764,21.7824584 15.5924676,21.7963473 12.3965101,21.7963473 C9.20055258,21.7963473 8.81689144,21.7824584 7.55806623,21.7261721 C6.38825622,21.6748199 5.75655881,21.4783658 5.33542721,21.3146237 C4.8161412,21.1227384 4.34346486,20.8186458 3.95980373,20.4209863 C3.56206832,20.0326469 3.25791772,19.5648122 3.06599579,19.0456252 C2.90222239,18.6245739 2.70573085,17.9882456 2.65436884,16.8234102 C2.59807178,15.5602564 2.58418024,15.1812372 2.58418024,11.9858894 C2.58418024,8.79054163 2.59807178,8.40695368 2.65436884,7.14855131 C2.70573085,5.97896447 2.90222239,5.34738758 3.06599579,4.92633632 C3.25791772,4.40696668 3.56206832,3.93456321 3.96455605,3.55079258 C4.3527868,3.15313305 4.8207108,2.84904047 5.34017954,2.65733784 C5.76131114,2.49359568 6.39776088,2.29714163 7.56281856,2.24560674 C8.82621337,2.18950311 9.20530491,2.17543153 12.4010797,2.17543153 C15.6017895,2.17543153 15.9806983,2.18950311 17.2395235,2.24560674 C18.4093335,2.29714163 19.0410309,2.49359568 19.4621625,2.65733784 C19.9814486,2.84904047 20.4541249,3.15313305 20.837786,3.55079258 C21.2355214,3.93913195 21.539672,4.40696668 21.731594,4.92633632 C21.8953674,5.34738758 22.0918589,5.98353321 22.1434036,7.14855131 C22.199518,8.4117051 22.2135922,8.79054163 22.2135922,11.9858894 C22.2135922,15.1812372 22.199518,15.555505 22.1434036,16.8186588 Z" id="Shape"></path>
                                                        <path d="M12.3870968,5.78064516 C8.96780323,5.78064516 6.19354839,8.55471608 6.19354839,11.9741935 C6.19354839,15.393671 8.96780323,18.1677419 12.3870968,18.1677419 C15.8065742,18.1677419 18.5806452,15.393671 18.5806452,11.9741935 C18.5806452,8.55471608 15.8065742,5.78064516 12.3870968,5.78064516 Z M12.3870968,15.9917944 C10.1688335,15.9917944 8.3694959,14.1926407 8.3694959,11.9741935 C8.3694959,9.75574637 10.1688335,7.95659268 12.3870968,7.95659268 C14.6055439,7.95659268 16.4046976,9.75574637 16.4046976,11.9741935 C16.4046976,14.1926407 14.6055439,15.9917944 12.3870968,15.9917944 L12.3870968,15.9917944 Z" id="Shape"></path>
                                                        <path d="M20.2322581,5.36774194 C20.2322581,6.05179843 19.6776402,6.60645161 18.9934696,6.60645161 C18.3094566,6.60645161 17.7548387,6.05179843 17.7548387,5.36774194 C17.7548387,4.68352784 18.3094566,4.12903226 18.9934696,4.12903226 C19.6776402,4.12903226 20.2322581,4.68352784 20.2322581,5.36774194 L20.2322581,5.36774194 Z" id="Path"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a href="#" class="footer-social__icon">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 58 (84663) - https://sketch.com -->
                                <title></title>
                                <desc>Created with Sketch.</desc>
                                <g id="Symbols" stroke="none" stroke-width="1"  fill-rule="evenodd">
                                    <g id="Футер" transform="translate(-1139.000000, -260.000000)"  fill-rule="nonzero">
                                        <g id="Group-18" transform="translate(1082.000000, 35.000000)">
                                            <g id="Group-16" transform="translate(0.000000, 189.000000)">
                                                <g id="Group-14" transform="translate(4.000000, 36.000000)">
                                                    <path d="M72.5,0 C74.984375,0 77,2.015625 77,4.5 L77,19.5 C77,21.984375 74.984375,24 72.5,24 L69.5625,24 L69.5625,14.703125 L72.671875,14.703125 L73.140625,11.078125 L69.5625,11.078125 L69.5625,8.765625 C69.5625,7.75752315 69.8233025,7.06817987 71.1960035,7.01850026 L73.265625,7 L73.265625,3.765625 L73.1270362,3.74845679 C72.6819059,3.69907407 71.6510417,3.625 70.484375,3.625 C67.71875,3.625 65.8125,5.3125 65.8125,8.40625 L65.8125,11.078125 L62.6875,11.078125 L62.6875,14.703125 L65.8125,14.703125 L65.8125,24 L57.5,24 C55.015625,24 53,21.984375 53,19.5 L53,4.5 C53,2.015625 55.015625,0 57.5,0 L72.5,0 Z" id=""></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a href="#" class="footer-social__icon">
                            <svg width="32px" height="24px" viewBox="0 0 32 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 58 (84663) - https://sketch.com -->
                                <title></title>
                                <desc>Created with Sketch.</desc>
                                <g id="Symbols" stroke="none" stroke-width="1"  fill-rule="evenodd">
                                    <g id="Футер" transform="translate(-1191.000000, -260.000000)"  fill-rule="nonzero">
                                        <g id="Group-18" transform="translate(1082.000000, 35.000000)">
                                            <g id="Group-16" transform="translate(0.000000, 189.000000)">
                                                <g id="Group-14" transform="translate(4.000000, 36.000000)">
                                                    <path d="M121.5625,0 C125.604187,0 129.145818,0.0833325 132.1875,0.25 C133.479173,0.25 134.572912,0.739578438 135.46875,1.71875 C136.364588,2.69792156 136.8125,3.89582625 136.8125,5.3125 C136.937501,7.56251125 137,9.79165562 137,12 C137,14.2083444 136.937501,16.4374887 136.8125,18.6875 C136.8125,20.1041737 136.364588,21.3020784 135.46875,22.28125 C134.572912,23.2604216 133.479173,23.75 132.1875,23.75 C128.979151,23.9166675 125.250021,24 121,24 L119.327772,23.9955556 C115.764803,23.9762965 112.593069,23.8944452 109.8125,23.75 C108.520827,23.75 107.427088,23.2604216 106.53125,22.28125 C105.635412,21.3020784 105.1875,20.1041737 105.1875,18.6875 C105.0875,16.887491 105.0275,15.1008368 105.0075,13.3275032 L105,12 C105,10.5416594 105.083332,8.312515 105.25,5.3125 C105.25,3.89582625 105.687496,2.69792156 106.5625,1.71875 C107.437504,0.739578438 108.520827,0.25 109.8125,0.25 C112.651403,0.0944436667 115.925818,0.0114813778 119.63583,0.00111110074 L121.5625,0 Z M117.9375,5.8125 L117.9375,18.125 L127,12 L117.9375,5.8125 Z" id=""></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a href="#" class="footer-social__icon">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 58 (84663) - https://sketch.com -->
                                <title></title>
                                <desc>Created with Sketch.</desc>
                                <g id="Symbols" stroke="none" stroke-width="1"  fill-rule="evenodd">
                                    <g id="Футер" transform="translate(-1251.000000, -260.000000)"  fill-rule="nonzero">
                                        <g id="Group-18" transform="translate(1082.000000, 35.000000)">
                                            <g id="Group-16" transform="translate(0.000000, 189.000000)">
                                                <g id="Group-14" transform="translate(4.000000, 36.000000)">
                                                    <path d="M177,0 C183.629464,0 189,5.37053571 189,12 C189,18.6294643 183.629464,24 177,24 C170.370536,24 165,18.6294643 165,12 C165,5.37053571 170.370536,0 177,0 Z M182.892857,8.22321429 C183.066964,7.40625 182.598214,7.08482143 182.0625,7.28571429 L182.0625,7.28571429 L170.491071,11.7455357 C169.700893,12.0535714 169.714286,12.4955357 170.357143,12.6964286 L170.357143,12.6964286 L173.316964,13.6205357 L180.1875,9.29464286 C180.508929,9.08035714 180.803571,9.20089286 180.5625,9.41517857 L180.5625,9.41517857 L175.004464,14.4375 L174.790179,17.4910714 C175.098214,17.4910714 175.232143,17.3571429 175.392857,17.1964286 L175.392857,17.1964286 L176.839286,15.8035714 L179.839286,18.0133929 C180.388393,18.3214286 180.776786,18.1607143 180.924107,17.5044643 L180.924107,17.5044643 Z" id=""></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="footer-contacts__time d-flex align-items-baseline">
                    <img src="img/XL/Clock.svg" alt="" class="footer-contacts__time-icon">
                    <span class="footer-contacts__time-text">09:00-21:00 Пн.-Пт. <br> 10:00-19:00 Сб.-Вс. </span>
                </div>
                <a class="footer-contacts__text mt-4 d-block d-lg-none">Полная версия сайта</a>
            </div>
        </div>
    </div>
</footer>

<div class="copyright">
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-between">
            <p class="copyright__text">ArtPoint Concert Agency / 2019 </p>
            <a target="_blank" href="https://comnd-x.com/" class="copyright__text">by Command+X</a>
        </div>
    </div>
</div>

<div class="modal-k">
    <div class="modal-k__overlay"></div>
    <div class="modal-k__box">
        <p class="modal-k__title">Спасибо за Вашу заявку!</p>
        <p class="modal-k__text mb-15">Наш менеджер скоро с Вами свяжется</p>
        <p class="modal-k__btn">Окей</p>
    </div>
</div>
