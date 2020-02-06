@isset($type)
    <input type="hidden" name="type" value="{{$type}}"/>
    @if($type === \App\Models\Testimonial::TYPE_DOCUMENT)
        @include('admin.testimonials.partials.forms.document-form')
    @elseif($type === \App\Models\Testimonial::TYPE_TEXT)
        @include('admin.testimonials.partials.forms.text-form')
    @endif
    <div class="row">
        <div class="col-md-6">
            @include('admin.layouts.partials.date.inline-date',['title'=>'Дата','type'=>'text','props'=>'data-position="right bottom"','format'=>'d.m.Y'])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.partials.selects.select',['name'=>'status','values'=>$status,'title'=>'Статус','check'=>isset($edit)?$edit->getAttribute('status'):'moderation'])
        </div>
    </div>
@endisset
