<main id="services">
    <section class="about-service">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 ">
                    <div class="row my-container">
                        <img class="decor1 d-none d-xl-block" src="{{asset('img/decor1.svg')}}" alt="">
                        <img class="decor2 d-none d-xl-block" src="{{asset('img/decor2.svg')}}" alt="">
                        <div class="col-lg-5 order-lg-2">
                            <h1 class="service-title service-title_mb pl-lg-15">
                                {{str_replace('<br>','',$service->title)}}
                            </h1>
                        </div>
                        <div class="col-lg-12 order-lg-1">

                            <div class="about-service-img">
                                @php
                                    $image = \Illuminate\Support\Arr::first($service->images)??'';
                                @endphp

                                <img  src="{{GetPathToPhoto(imgOrig($image->path??''),asset('img/header-logo.svg'))}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 order-lg-3">
                            <p class="service-line-height  pr-lg-15 mb-lg-5">
                                {{$service->description_first}}
                            </p>
                        </div>
                        <div class="col-lg-7 order-lg-4">
                            <p class="service-line-height  pl-lg-15 mb-4">
                                {{$service->description_second}}
                            </p>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </section>

    @php
        $serviceSlider = $service->manyImages??null;
    @endphp
    @if(!is_null($serviceSlider)&& count($serviceSlider->images))
        <section class="service-gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 ">
                    <h2 class="service-title service-title_mb">Галерея</h2>
                    <div class="row">
                        <div class="col-9 p-0">
                            <div class="service-gallery-slider">

                                @foreach ($service->manyImages->images as $slider)
                                    <div class="service-gallery-slider__item">

                                        <img  src="{{GetPathToPhoto(imgOrig($slider->path??''),asset('img/header-logo.svg'))}}" alt="">
                                    </div>
                                @endforeach



                            </div>

                        </div>
                        <div class="col-3 p-0 position-relative">
                            <div class="slick-arrow next-arrow"><img class="w-100" src="{{asset('img/slider-arrow.svg')}}" alt=""></div>
                            <div class="service-gallery-next-slide">
                                <img src="" alt="">
                                <div class="service-gallery-slider-count-box">
                                    <span class="current"></span>
                                    <span>/</span>
                                    <span class="count"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="about-service-video">
        <div class="container">
            @php
                $video = getLinkVideo( \Illuminate\Support\Arr::first(json_decode($service->video)));
            @endphp
            <div class="row">
                <div class="col-lg-8 offset-lg-2 ">
                    <h2 class="service-title service-title_mb">Об услуге</h2>
                    <div class="service-iframe-box">
                        <img class="play-icon" src="{{asset('img/play.svg')}}" alt="">
                        <img class="service-iframe-img" src="//img.youtube.com/vi/{{$video}}/0.jpg"  alt="" data-src="https://www.youtube.com/embed/{{$video}}?autoplay=1">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="service-price">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 ">
                    <div class="row">
                        <div class="col-lg-3 position-relative">
                            <h2 class="service-title service-title_mb mt-lg-3">Прайс лист</h2>
{{--                            <img src="{{asset('img/decor3.svg')}}" class="decor3 d-none d-xl-block" alt="">--}}
                        </div>
                        <div class="col-lg-9">
                            <ul class="list-group list-group-flush price-list">
                                @foreach ($service->price as $price)
                                    <li class="list-group-item  price-list-item price-list-item_grey">
                                        <span class="price-text">{{$price->title}}</span>
                                        <span class="price-text">{{$price->price}} руб</span>
                                        @if($price->stock)
                                            <span class="price-stock price-stock_active"> <span class="price-stock-text">акция</span> </span>
                                        @else
                                            <span class="price-stock "></span>
                                        @endif
                                    </li>
                                @endforeach



                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
