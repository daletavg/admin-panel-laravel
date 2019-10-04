$('.document-slider').on('init', function (event, slick) {
    const count = slick.$slides.length;
    $('.count').text(count);
    $('.current').text($(slick.$slides[slick.currentSlide]).index());
}).on("beforeChange", function(event, slick, currentSlide, nextSlide) {
    $('.current').text(nextSlide + 1);
   });
$('.document-slider').slick({
    arrow:true,
    prevArrow: "<div class='document-slider-arrow document-slider-arrow_prev'><img src='./img/doc-arrow.svg' alt=''></div>",
    nextArrow: "<div class='document-slider-arrow document-slider-arrow_next'><img src='./img/doc-arrow.svg' alt=''></div>",
});
