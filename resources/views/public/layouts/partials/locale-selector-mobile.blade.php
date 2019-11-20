<div class="menu__languages">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
           class="menu__languages-item {!! LaravelLocalization::getCurrentLocale()==$localeCode?'active':''!!}">{{ucfirst($localeCode)}}</a>
    @endforeach
</div>
