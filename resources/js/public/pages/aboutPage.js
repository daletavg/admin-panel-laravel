function initSlider() {
  $(".partners_section__slider .slider").slick({
    slidesToShow: 4,
    centerMode: false,
    centerPadding: 0,
    arrows: true,
    prevArrow: $(".partners_section__slider-arrow-box .arrow-prev"),
    nextArrow: $(".partners_section__slider-arrow-box .arrow-next"),

    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          centerMode: true,
          centerPadding: "60px"
        }
      }
    ]
  });
}

initSlider();
