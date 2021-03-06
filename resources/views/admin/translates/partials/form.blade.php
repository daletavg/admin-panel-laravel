
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'comment','title'=>'Коментарий','value'=>$edit->comment??''])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.selects.select2',['name'=>'group','inputClass'=>'group-select','check'=>$edit->group??$checkGroup??'','title'=>'Группа', 'values'=>dataWithId($groups,true)])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.selects.select',['name'=>'type','check'=>$edit->type??'', 'title'=>'Тип поля',
        'values'=>[
            [
                'id'=>'input',
                'value'=>'input',
            ],
           [
                'id'=>'textaria',
                'value'=>'textaria',
            ],
            [
                'id'=>'ckeditor',
                'value'=>'ckeditor',
            ],
        ]])
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @include('admin.layouts.partials.inputs.default-input',['name'=>'key','title'=>'Ключ','value'=>$edit->key??''])
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! $langData??'' !!}
    </div>
</div>


@section('javascript')

    <script defer>
        $( document ).ready(function () {
            $('.group-select').select2({
                tags:[],
                formatNoMatches: function() {
                    return '';
                },
                dropdownCssClass: 'select2-hidden'
            });




            let number = $('#type').children("option:selected").val();
            let langs =['ru','uk','en'];
            checkInput(number,langs)
        });
        $('#type').on('change', function () {
            let number = $(this).children("option:selected").val();
            let langs =['ru','uk','en'];
            checkInput(number,langs)

        });

        function checkInput(val,langs) {
            if (val === 'textaria') {
                setNewInput(langs, getTextariaLang);
            }
            if (val === 'input') {
                setNewInput(langs, getInputLang);
            }
            if(val === 'ckeditor')
            {
                setNewInput(langs,getCKEDitorLang);
                setCKEDITOR(langs);
            }
        }

        function getTextariaLang(lang, value) {
            let data = `
                    <div class="form-group">
                        <label for="`+lang+`" class=" control-label">Заначение</label>
                        <textarea class="form-control lang-changer" name="`+lang+`" id="`+lang+`" cols="30" rows="10">`+value+`</textarea>
                    </div>`;
            return data;
        }

        function getInputLang(lang,value) {
            let data = `<div class="form-group">
                            <label for="`+lang+`" class=" control-label">Заначение</label>
                            <input type="text" id="`+lang+`" name="`+lang+`" class="form-control lang-changer" autocomplete="off" value="`+value+`">
                        </div>`;
            return data;
        }

        function getCKEDitorLang(lang, value) {
            let data = `
                    <div class="form-group">
                        <label for="`+lang+`" class=" control-label">Заначение</label>
                        <textarea class="form-control lang-changer" name="`+lang+`" id="`+lang+`" cols="30" rows="10">`+value+`</textarea>
                    </div>`;
            // for(name in CKEDITOR.instances)
            // {
            //     CKEDITOR.instances[name].destroy(true);
            // }
            return data;
        }

        function setNewInput(languages, inputFunc) {

            $('.lang-changer').map(function () {
                let name = $(this).attr('name');

                let parent =$(this).parent();
                let data = $(this).val();
                parent.children().remove();

                 $(parent).append(inputFunc(name,data))
            });
        }

        function setCKEDITOR(langs) {
            langs.map(function (lang) {
                let id = "data[" + lang + "][data]";
                CKEDITOR.replace(id, {
                    filebrowserBrowseUrl: '/elfinder/ckeditor',
                    filebrowserImageBrowseUrl: '/elfinder/ckeditor',
                    uiColor: '#9AB8F3',
                    height: 300
                });
            });
        }
    </script>
@endsection
