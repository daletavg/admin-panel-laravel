@php
    if(isset($edit))
    {
        $langs = $edit->langs()->get()->toArray();
    }
    $dataLang = [];
    //short_description
    array_push($dataLang,
    view('admin.poster.partials.lang-form',['langName'=>'Русский','titleName'=>'data[ru][title]','descriptionName'=>'data[ru][description]','titleValue'=>$langs[0]['title']??'','descriptionValue'=>$langs[0]['description']??'','shortDescriptionName'=>'data[ru][short_description]','shortDescriptionValue'=>$langs[0]['short_description']??'']),
    view('admin.poster.partials.lang-form',['langName'=>'Украинский','titleName'=>'data[uk][title]','descriptionName'=>'data[uk][description]','titleValue'=>$langs[1]['title']??'','descriptionValue'=>$langs[1]['description']??'','shortDescriptionName'=>'data[uk][short_description]','shortDescriptionValue'=>$langs[1]['short_description']??'']),
    view('admin.poster.partials.lang-form',['langName'=>'Английский','titleName'=>'data[en][title]','descriptionName'=>'data[en][description]','titleValue'=>$langs[2]['title']??'','descriptionValue'=>$langs[2]['description']??'','shortDescriptionName'=>'data[en][short_description]','shortDescriptionValue'=>$langs[2]['short_description']??''])
);
@endphp

@include('admin.layouts.partials.tabs.lang-tab',['tabs'=>$dataLang])


<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'price_before','title'=>'Цена от:'])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'price_to','title'=>'Цена до:'])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.date-time',['name'=>'date','title'=>'Дата:'])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.partials.selects.select',['title'=>'Город','name'=>'city','values'=>$cities, 'check'=>$edit->city_id??''])
    </div>
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'pay_link','title'=>'Ссылка на страницу оплаты:'])
    </div>
    <div class="col-md-6 d-flex flex-column justify-content-end">
        @include('admin.layouts.partials.checkboxes.active-checkbox')
    </div>
</div>


@section('javascript')
    <script>
        $(document).ready(function () {
            @foreach(\App\Repository\LanguageRepository::getLanguage() as $i)
            {!! showEditor('data['.$i->locale.'][description]') !!}
            @endforeach
        });
    </script>
@endsection
