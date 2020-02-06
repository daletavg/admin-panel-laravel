<!--   Core JS Files   -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script defer src="{{asset('libs/jquery.mask.min.js')}}"></script>
<script>
    AOS.init({
        once: true,
        easing: 'new-easing',
        duration: 2000
    });
</script>
<script defer src="{{asset('js/public/index.js')}}"></script>
@yield('javascript')
