<main id="price">
    <section class="">
        <div class="container position-relative">
            <img class="stock-decor stock-decor-1 d-none d-lg-block" src="./img/decor1.svg" alt="">
            <img class="stock-decor stock-decor-2 d-none d-lg-block" src="./img/decor2.svg" alt="">
            <div class="row">
                <div class="offset-lg-1 col-lg-10">
                    <h1 class="priceList-title">Прайс лист</h1>

                    <ul class="list-group list-group-flush  mainPrice">
                        @php
                            $iterator = 1;
                        @endphp
                        @foreach($items as $item)
                            @if(count($item->price))
                            <li class=" mainPrice__item" >

                                <h2 class="priceList-item-title {!! $iterator%2==1?'priceList-item-title_left':'priceList-item-title_right' !!}">{{str_replace('<br>',' / ',$item->title)}}
                                    <span class="accordArrow-wrap accordArrow-wrap_rotate">
                                    <img src="{{asset('img/accordArrow.svg')}}" alt="">
                                </span>
                                </h2>
                                <ul class="list-group list-group-flush price-list price-list-container">
                                    <li class="list-group-item  price-list-item border-bottom">
                                        <span class="price-text">Услуга</span>
                                        <span class="price-text">Стоимость</span>
                                    </li>
                                    @foreach($item->price as $price)
                                        <li class="list-group-item  price-list-item">
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
                            </li>
                            @php
                                $iterator++;
                            @endphp
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>
