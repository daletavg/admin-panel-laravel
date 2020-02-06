@if (count($breadcrumbs))
    <div class="breadcrumbs" data-aos="fade-right">
        <div class="wrapper">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <a href="{{ $breadcrumb->url }}" class="breadcrumbs__text">{{ $breadcrumb->title }}</a>
                    <span class="breadcrumbs__text"> / </span>
                @else
                    <a class="breadcrumbs__text">{{ $breadcrumb->title }}</a>
                @endif

            @endforeach
        </div>
    </div>
@endif
