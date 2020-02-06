
<script type="text/javascript">
    const APP_URL = '{{ env('APP_URL') }}';
</script>
<script type="text/javascript"
        src="{{ asset('js/admin/libraries.js') }}"
        defer></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js" defer></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/flatpickr@4.5.7/dist/flatpickr.min.js" defer></script>
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript" src="{{ asset('js/ckeditor/ckeditor.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('js/admin/globals.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('js/admin/functions.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('js/admin/functions-admin.js') }}" defer></script>

<script type="text/javascript" src="{{ asset('js/admin/admin-triggers.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('js/admin/admin-init.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('js/admin/init.js') }}" defer></script>
<script type="text/javascript" src="{{asset('js/admin/color-picker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/admin/select2.full.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.min.js"></script>
<script type="text/javascript" src="{{asset('js/admin/admin.js')}}"></script>

@yield('javascript')
{{--{!! \Arr::get($sections, 'javascript')!!}--}}

{{--{!! $scripts !!}--}}

{{--{!! $scriptsDefer !!}--}}

{{--<script type="text/javascript" defer>--}}
{{--    $(document).ready(function (e) {--}}
{{--        let $flatpickr = $('.flatpickr');--}}
{{--        if ($flatpickr.length) {--}}
{{--            $.each($flatpickr, function (index, elm) {--}}
{{--                elm = $(elm);--}}
{{--                const type = (typeof elm.data('flatpickr-type') !== 'undefined') ? elm.data('flatpickr-type') : 'date';--}}
{{--                const config = {--}}
{{--                    mode: type--}}
{{--                };--}}
{{--                elm.flatpickr(config);--}}
{{--            });--}}
{{--        }--}}
{{--    });--}}
{{--    $(document).ready(function (e) {--}}
{{--        $sort = sort.getInstance();--}}
{{--        $sort.url = '{{ route('sort') }}';--}}
{{--        $sort.init();--}}
{{--    });--}}
{{--</script>--}}

{{--{!! Arr::get($sections, 'javascript') !!}--}}
