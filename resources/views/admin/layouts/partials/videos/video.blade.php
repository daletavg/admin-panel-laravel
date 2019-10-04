<div class="mb-5">

    @if(!empty($edit->video) AND is_array(json_decode($edit->video)))

        @foreach(json_decode($edit->video) as $link)
            <div class="row mt-3 clearfix" data-cloneable-row="">
                <div class="col-8 vertical-align-bottom">
                    <input class="form-control" type="text" name="video[]" value="{{ $link }}" placeholder="@lang('modules._.tabs.video-youtube-link')">
                </div>
                <div class="col-2 vertical-align-bottom">
                    <a href="{{$link}}" class="fancy" data-fancybox="cats_video">
                        <img src="{{ getPreviewYoutubeFromLink($link) }}" alt="" class="img-fluid" width="85">
                    </a>
                </div>
                <div class="col-2 vertical-align-bottom">

                    @include('admin.layouts.partials.buttons.key-value-buttons')
                </div>
            </div>
        @endforeach
    @else
        <div class="form-group row" data-cloneable-row="">
            <div class="col-10">
                <input class="form-control" type="text" name="video[]" placeholder="Ссылка на видео">
            </div>
            <div class="col-2">
                @include('admin.layouts.partials.buttons.key-value-buttons')
            </div>
        </div>
    @endif
</div>
