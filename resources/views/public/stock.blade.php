<main id="stock">
    <section class="about-service ">
        <div class="container position-relative">
            <img class="stock-decor stock-decor-1 d-none d-lg-block" src="./img/decor1.svg" alt="">
            <img class="stock-decor stock-decor-2 d-none d-lg-block" src="./img/decor2.svg" alt="">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 ">
                    <h1 class="stock-title"><span>Акции</span></h1>

                    @foreach ($stocks as $stock)
                        <div data-id="{{$loop->iteration}}" class="stock__item">
                            <div class="row">
                                <div class="col-md-6 order-2 order-md-0">
                                    <h3 class="stock-item-title">
                                        {{$stock->title}}
                                    </h3>
{{--                                <span class="stock-item-title-desc">(механическая + ультразвуковая)</span>--}}
                                    <p class="stock-text">
                                        {{$stock->description}}
                                    </p>
                                </div>
                                <div class="col-md-2 d-flex flex-column justify-content-between order-1">
                                    <div class="stock-price-box">
                                        <span class="stock-new-price">{{$stock->price}} руб</span>
                                        <span class="stock-old-price">{{$stock->old_price}} руб</span>
                                    </div>
                                    <span class="stock-type">{{$stock->tag}}</span>
                                </div>
                                <div class="col-md-4 order-0 order-md-2">
                                    <div class="stock-img-box">
                                        @php
                                            $image = $stock->getAttribute('images')->first()->path ?? '';
                                        @endphp
                                        <img src="{{GetPathToPhoto($image,asset('img/header-logo.svg'))}}" alt="">
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                    
                </div>
            </div>
           <div class="show-more">
                <a  class="show-more-link" data-url="{{route('stock.get-more')}}" href="#">Смотреть еще</a>
                <img class="show-more-arrow" src="{{asset('img/showMore.svg')}}" alt="">
            </div>
        </div>
    </section>
</main>
