{{--@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--    <li>--}}
{{--        <a rel="alternate" hreflang="{{ $localeCode }}"--}}
{{--           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--            {{ $properties['native'] }}--}}
{{--        </a>--}}
{{--    </li>--}}
{{--@endforeach--}}
<div class="header__languages d-none d-lg-flex">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
           class="header__languages-item {!! LaravelLocalization::getCurrentLocale()==$localeCode?'active':''!!}">
            {{ucfirst($localeCode)}}</a>
    @endforeach
{{--    <a href="#" class="header__languages-item active">Ru</a>--}}
{{--    <a href="#" class="header__languages-item">En</a>--}}
</div>
