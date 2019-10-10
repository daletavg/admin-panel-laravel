@php
    if(isset($edit))
    {
        $langs = $edit->langs()->get()->toArray();
    }
    $dataLang = [];
    array_push($dataLang,
    view('admin.group.partials.lang-form',['langName'=>'Русский','titleName'=>'data[ru][title]','titleValue'=>$langs[0]['title']??'']),
    view('admin.group.partials.lang-form',['langName'=>'Украинский','titleName'=>'data[uk][title]','titleValue'=>$langs[1]['title']??'']),
    view('admin.group.partials.lang-form',['langName'=>'Английский','titleName'=>'data[en][title]','titleValue'=>$langs[2]['title']??''])
);
@endphp

@include('admin.layouts.partials.tabs.lang-tab',['tabs'=>$dataLang])

<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'link','title'=>'Ссылка на партнера'])
    </div>
</div>
