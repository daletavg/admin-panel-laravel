<div class="menu">
    <div class="menu__container">
        @include('public.layouts.partials.locale-selector-mobile')
        <div class="menu__list">
            <a href="{{route('home.index')}}" class="menu__list-item">{{getTranslate('posters.global')}}</a>
            <a href="{{route('about.index')}}" class="menu__list-item">{{getTranslate('about_company.global')}}</a>
            <a href="{{route('services.index')}}" class="menu__list-item active">{{getTranslate('our_services.global')}}</a>
            <a href="{{route('history.index')}}" class="menu__list-item">{{getTranslate('project_history.global')}}</a>
            <a href="{{route('partners.index')}}" class="menu__list-item">{{getTranslate('partners.global')}}</a>
        </div>
        <div class="menu__social">
            <div class="menu__icons mb-20">
                <a href="#" class="menu__icons-item">
                    <img src="{{asset('img/public/XL/instagram.svg')}}" alt="">
                </a>
                <a href="#" class="menu__icons-item">
                    <img src="{{asset('img/public/XL/facebook.svg')}}" alt="">
                </a>
                <a href="#" class="menu__icons-item">
                    <img src="{{asset('img/public/XL/youtube.svg')}}" alt="">
                </a>
                <a href="#" class="menu__icons-item">
                    <img src="{{asset('img/public/XL/telegram.svg')}}" alt="">
                </a>
            </div>
            <a class="menu__mail">
                <img class="menu__mail-icon" src="{{asset('img/public/XL/mail.svg')}}" alt="">
                <p class="menu__mail-text">artpoint2004@gmail.com</p>
            </a>
            <a class="menu__mail">
                <img class="menu__mail-icon" src="{{asset('img/public/XL/mail.svg')}}" alt="">
                <p class="menu__mail-text">titar.yura@gmail.com</p>
            </a>
        </div>
    </div>
</div>
