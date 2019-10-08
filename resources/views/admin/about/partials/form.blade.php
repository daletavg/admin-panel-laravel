@php
    if(isset($edit))
    {
        $langs = $edit->langs()->get()->toArray();
    }
    $dataLang = [];
    array_push($dataLang,
    view('admin.about.partials.lang-form',['langName'=>'Русский','descriptionName'=>'data[ru][description]','descriptionValue'=>$langs[0]['description']??'']),
    view('admin.about.partials.lang-form',['langName'=>'Украинский','descriptionName'=>'data[uk][description]','descriptionValue'=>$langs[1]['description']??'']),
    view('admin.about.partials.lang-form',['langName'=>'Английский','descriptionName'=>'data[en][description]','descriptionValue'=>$langs[2]['description']??''])
);
@endphp

@include('admin.layouts.partials.tabs.lang-tab',['tabs'=>$dataLang])
@section('javascript')
    <script>
        $(document).ready(function () {
            @foreach(\App\Repository\LanguageRepository::getLanguage() as $i)
            {!! showEditor('data['.$i->locale.'][description]') !!}
            @endforeach
        });
    </script>
@endsection
