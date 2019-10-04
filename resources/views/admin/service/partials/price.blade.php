<div class="mb-5" data-price>
    @php
        $prices = $edit->price;
    @endphp
    @if(count($prices))
        @foreach($prices as $price)
            <div class="form-group row" data-cloneable-row="">
                <div class="col-12">
                    <hr>
                    <input type="hidden" name="data-price[{!! $loop->iteration !!}][price-id]" value="{{$price->id}}">
                </div>
                <div class="col-10 mb-2">
                    <input class="form-control" data-send type="text" name="data-price[{!! $loop->iteration !!}][title]"
                           value="{{$price->title}}" placeholder="Услуга">
                </div>
                <div class="col-10 mb-2">
                    <input class="form-control" data-send type="number" name="data-price[{!! $loop->iteration !!}][price]"
                           value="{{$price->price}}" placeholder="Цена">
                </div>
                <div class="col-10 ">
                    <input type="checkbox" data-send name="data-price[{!! $loop->iteration !!}][stock]" value="1"
                           {!! $price->stock?'checked':'' !!} class="checkbox" id="stock">
                    <label class="form-check-label" for="stock">Акционное предложение</label>
                </div>
                <div class="col-2">
                    <div class="deleteRow row">
                        <a href="#" class="btn btn-dark btn-sm" data-remove-suffix-price="" title=" ">
                            <i class="fa fa-minus-circle"></i>
                        </a>
                        <button type="button" class="btn btn-success btn-sm" data-additional-field-price="">
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
                <input class="form-control" data-send type="text" name="data-price[1][title]" placeholder="Услуга">
            </div>
            <div class="col-10 mb-2">
                <input class="form-control" data-send type="number" name="data-price[1][price]" placeholder="Цена">
            </div>
            <div class="col-10 ">
                <input type="checkbox" data-send name="data-price[1][stock]" value="1" class="checkbox" id="stock">
                <label class="form-check-label" for="stock">Акционное предложение</label>
            </div>
            <div class="col-2">
                <div class="deleteRow row">
                    <a href="#" class="btn btn-dark btn-sm" data-remove-suffix-price="" title=" ">
                        <i class="fa fa-minus-circle"></i>
                    </a>
                    <button type="button" class="btn btn-success btn-sm" data-additional-field-price="">
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
            var i = {!! count($prices)?count($prices)+1:2 !!};
            $(document).on('click', '[data-additional-field-price]', function (e) {

                e.preventDefault();
                let data = getDataSend(i);
                $('[data-price]').append(data);
                i++;
            });
            $(document).on('click', '[data-remove-suffix-price]', function (e) {
                e.preventDefault();
                $findParent = $(this).parents('[data-cloneable-row]');
                if (confirm('Удалить запись?')) $findParent.remove();
            });
        });

        function getDataSend(ind) {
            return `
            <div class="form-group row" data-cloneable-row="">
                <div class="col-12">
                    <hr>
                </div>
                <div class="col-10 mb-2">
                    <input class="form-control" data-send type="text" name="data-price[` + ind + `][title]" placeholder="Услуга">
                </div>
                <div class="col-10 mb-2">
                    <input class="form-control" data-send type="number" name="data-price[` + ind + `][price]" placeholder="Цена">
                </div>
                <div class="col-10 ">
                    <input type="checkbox" data-send name="data-price[` + ind + `][stock]" value="1"  class="checkbox" id="stock">
                    <label class="form-check-label" for="stock">Акционное предложение</label>
                </div>
                <div class="col-2">
                    <div class="deleteRow row">
                        <a href="#" class="btn btn-dark btn-sm" data-remove-suffix-price="" title=" ">
                            <i class="fa fa-minus-circle"></i>
                        </a>
                        <button type="button" class="btn btn-success btn-sm" data-additional-field-price="">
                            <i class="fa fa-plus-circle"></i>
                        </button>
                </div>
        </div>
</div>
            `
        }
    </script>
@endsection
