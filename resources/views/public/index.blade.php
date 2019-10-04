<main id="main-page">

  <div id="stories">
  </div>
  <section class="service-grid">
    <a href="{{route('services',$services[0]->url)}}" class="service-grid__item marLeftTop  ml-0 ">
      <img src="{{GetPathToPhoto(\Illuminate\Support\Arr::first($services[0]->images)->path??'',asset('img/header-logo.svg'))}}" alt="" class="service-grid__img">
      <span class="service-grid__text service-grid__text_bottom service-grid__text_black"  style="color:{{$services[0]->title_color}} !important">{!! $services[0]->title !!}</span>
    </a>
    <a href="{{route('services',$services[1]->url)}}" class="service-grid__item marTop ">
      <img src="{{GetPathToPhoto(\Illuminate\Support\Arr::first($services[1]->images)->path??'',asset('img/header-logo.svg'))}}" alt="" class="service-grid__img ">
      <span class="service-grid__text service-grid__text_top service-grid__text_white text-right" style="color:{{$services[1]->title_color}} !important">{!! $services[1]->title !!}</span>
    </a>
    <a href="{{route('services',$services[2]->url)}}" class="service-grid__item mr-0 marRightTop ">
      <img src="{{GetPathToPhoto(\Illuminate\Support\Arr::first($services[2]->images)->path??'',asset('img/header-logo.svg'))}}" alt="" class="service-grid__img">
      <span class="service-grid__text service-grid__text_bottom service-grid__text_black service-grid__text_wordBreak" style="color:{{$services[2]->title_color}} !important">{!! $services[2]->title !!}</span>
    </a>
    <a href="{{route('services',$services[3]->url)}}" class="service-grid__item marLeft ml-0 ">
      <img src="{{GetPathToPhoto(\Illuminate\Support\Arr::first($services[3]->images)->path??'',asset('img/header-logo.svg'))}}" alt="" class="service-grid__img">
      <span  class="service-grid__text service-grid__text_bottom service-grid__text_black" style="color:{{$services[3]->title_color}} !important">{!! $services[3]->title !!}</span>
    </a>
    <a href="{{route('about')}}" class="service-grid__item service-grid__item_center">
      <img src="{{asset('img/zvolskaya.jpg')}}" alt="" class="service-grid__img">
      <span class="service-grid__text  service-grid__text_orange">О нас</span>
    </a>
    <a href="{{route('services',$services[4]->url)}}" class="service-grid__item mr-0 marRight ">
      <img src="{{GetPathToPhoto(\Illuminate\Support\Arr::first($services[4]->images)->path??'',asset('img/header-logo.svg'))}}" alt="" class="service-grid__img">
      <span class="service-grid__text service-grid__text_bottom service-grid__text_black" style="color:{{$services[4]->title_color}} !important">{!! $services[4]->title !!}</span>
    </a>
    <a href="{{route('services',$services[5]->url)}}" class="service-grid__item marLeftBottom ml-0 ">
      <img src="{{GetPathToPhoto(\Illuminate\Support\Arr::first($services[5]->images)->path??'',asset('img/header-logo.svg'))}}" alt="" class="service-grid__img">
      <span class="service-grid__text  service-grid__text_bottom service-grid__text_black" style="color:{{$services[5]->title_color}} !important">{!! $services[5]->title !!}</span>
    </a>
    <a href="{{route('services',$services[6]->url)}}" class="service-grid__item marBottom ">
      <img src="{{GetPathToPhoto(\Illuminate\Support\Arr::first($services[6]->images)->path??'',asset('img/header-logo.svg'))}}" alt="" class="service-grid__img">
      <span class="service-grid__text service-grid__text_top service-grid__text_white" style="color:{{$services[6]->title_color}} !important">{!! $services[6]->title !!}</span>
    </a>
    <a href="{{route('services',$services[7]->url)}}" class="service-grid__item mr-0 marRightBottom ">
      <img src="{{GetPathToPhoto(\Illuminate\Support\Arr::first($services[7]->images)->path??'',asset('img/header-logo.svg'))}}" alt="" class="service-grid__img">
      <span class="service-grid__text service-grid__text_bottom service-grid__text_black" style="color:{{$services[7]->title_color}} !important">{!! $services[7]->title !!}</span>
    </a>

  </section>
</main>
