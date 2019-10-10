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
        <label for="check-color" class=" control-label">Цвет заголовка на главной</label>
        <div class="form-check" id="check-color">
            <label  class="form-check-label d-flex align-items-center">
                <input style="max-width:40px;" type="radio" class="form-control" {!! isset($edit)?$edit->color == "black"?'checked':'':'checked' !!} name="color" value="black">Черный
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label d-flex align-items-center">
                <input type="radio" style="max-width:40px;" class="form-control" {!! isset($edit)?$edit->color == "white"?'checked':'':'' !!} name="color" value="white">Белый
            </label>
        </div>
    </div>
    <div class="col-md-6 d-flex flex-column justify-content-end">
        @include('admin.layouts.partials.checkboxes.default-checkbox',['title'=>'Вывести на главную','name'=>'on_general','id'=>'on_general','checked'=>$edit->on_general??false])
    </div>
</div>
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
</div>
<div class="row">
    <div class="col-md-6">
        <input type="hidden" id="get-place-link" value="{{route('admin.posters.city-places')}}">
        @include('admin.layouts.partials.selects.select',['title'=>'Город','name'=>'city','values'=>$cities, 'check'=>$edit->city_id??''])
    </div>
    <div class="col-md-6">
        <input type="hidden" id="selected-place" value="{{$edit->place->id??''}}">
        @include('admin.layouts.partials.selects.select',['title'=>'Заведение','name'=>'place', 'check'=>$edit->city_id??''])
    </div>
</div>
<div class="row">
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
            let id = $('#city').val();
            let link = $('#get-place-link').val();
            getDataFromLink(link,id);
            @foreach(\App\Repository\LanguageRepository::getLanguage() as $i)
            {!! showEditor('data['.$i->locale.'][description]') !!}
            @endforeach


            $('#city').on('change', function () {
                let link = $('#get-place-link').val();
                let id = $(this).val();
                getDataFromLink(link,id);
            });


            function getDataFromLink(link,id){
                let selected =$('#selected-place').val();
                $.ajax({
                    url: link,
                    data: {
                        id
                    },
                    success: function (res) {
                        $('#place').find('option')
                            .remove()
                            .end();

                        $.each(res, function(i, item) {
                            if(item.id==selected) {
                                $('#place')
                                    .append($("<option selected></option>")
                                        .attr("value", item.id)
                                        .text(item.title));
                            }
                            else {
                                $('#place')
                                    .append($("<option></option>")
                                        .attr("value", item.id)
                                        .text(item.title));
                            }
                        });
                    }
                })
            }


        });

    </script>
@endsection
