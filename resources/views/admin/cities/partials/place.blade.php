<div class="mb-5" data-place>
    <input type="hidden" data-remove-id name="deleted">
    @php
        $places = $edit->place;
    @endphp
    @if(count($places))
        @foreach($places as $place)
            @php
                $placesTitles = $place->langs;
                $iteration = $loop->iteration;
            @endphp

            <div class="form-group row" data-cloneable-row="">
                <div class="col-12">
                    <hr>
                    <input type="hidden" data-place-id name="place[{!! $loop->iteration !!}][id]" value="{{$place->id}}">
                </div>

                @foreach($placesTitles as $title)
                    <div class="col-10 mb-2">
                        @php
                           $lang = \App\Repository\LanguageRepository::getLocaleById($title->language_id);
                        @endphp
                        <input class="form-control" data-send type="text" name="place[{!! $iteration !!}][{{$lang}}][title]"
                               value="{{$title->title}}" placeholder="Место проведения {{strtoupper($lang)}}">
                    </div>
                @endforeach

                <div class="col-2">
                    <div class="deleteRow row">
                        <a href="#" class="btn btn-dark btn-sm" data-remove-suffix-place="" title=" ">
                            <i class="fa fa-minus-circle"></i>
                        </a>
                        <button type="button" class="btn btn-success btn-sm" data-additional-field-place="">
                            <i class="fa fa-plus-circle"></i>
                        </button>
                    </div>
                </div>

            </div>
        @endforeach
    @else

        <div class="form-group row" data-cloneable-row="">
            <div class="col-12">
                <hr>
            </div>
            <div class="col-10 mb-2">
                <input class="form-control" data-send type="text" name="place[1][ru][title]"
                        placeholder="Место проведения RU">
            </div>
            <div class="col-10 mb-2">
                <input class="form-control" data-send type="text" name="place[1][uk][title]"
                        placeholder="Место проведения UK">
            </div>
            <div class="col-10 mb-2">
                <input class="form-control" data-send type="text" name="place[1][en][title]"
                        placeholder="Место проведения EN">
            </div>
            <div class="col-2">
                <div class="deleteRow row">
                    <a href="#" class="btn btn-dark btn-sm" data-remove-suffix-place="" title=" ">
                        <i class="fa fa-minus-circle"></i>
                    </a>
                    <button type="button" class="btn btn-success btn-sm" data-additional-field-place="">
                        <i class="fa fa-plus-circle"></i>
                    </button>
                </div>
            </div>

        </div>
    @endif
</div>


@section('javascript')
    <script defer>
        $(document).ready(function () {
            var i = {!! count($places)?count($places)+1:2 !!};
            $(document).on('click', '[data-additional-field-place]', function (e) {

                e.preventDefault();
                let data = getDataSend(i);
                $('[data-place]').append(data);
                i++;
            });
            $(document).on('click', '[data-remove-suffix-place]', function (e) {
                e.preventDefault();
                let findParent = $(this).parents('[data-cloneable-row]');
                let placeId  = findParent.find('[data-place-id]').val();
                let deletableInput =  $('[data-remove-id ]');
                let dataRemove ;
                if(deletableInput.val() ==="")
                {
                    dataRemove= [];
                    deletableInput.val(dataRemove.toString());
                }
                else{
                    dataRemove = deletableInput.val().split(',');
                }




                if (confirm('Удалить запись?')){
                    if(placeId!==undefined){
                        dataRemove.push(placeId) ;

                        deletableInput.val(dataRemove.toString());
                    }
                    findParent.remove();
                }
            });
        });

        function getDataSend(ind) {
            return `
            <div class="form-group row" data-cloneable-row="">
                <div class="col-12">
                    <hr>
                </div>
                 <div class="col-10 mb-2">
                    <input class="form-control" data-send type="text" name="place[`+ind+`][ru][title]"
                            placeholder="Место проведения RU">
                </div>
                <div class="col-10 mb-2">
                    <input class="form-control" data-send type="text" name="place[`+ind+`][uk][title]"
                            placeholder="Место проведения UK">
                </div>
                <div class="col-10 mb-2">
                    <input class="form-control" data-send type="text" name="place[`+ind+`][en][title]"
                            placeholder="Место проведения EN">
                </div>
                <div class="col-2">
                    <div class="deleteRow row">
                        <a href="#" class="btn btn-dark btn-sm" data-remove-suffix-place="" title=" ">
                            <i class="fa fa-minus-circle"></i>
                        </a>
                        <button type="button" class="btn btn-success btn-sm" data-additional-field-place="">
                            <i class="fa fa-plus-circle"></i>
                        </button>
                </div>
        </div>
</div>
            `
        }
    </script>
@endsection
