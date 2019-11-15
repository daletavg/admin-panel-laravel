function initSlider() {
  $(".first-section__slider .first-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    appendDots: $(".first-section__slider-dots .dots-wrapper"),
    dots: true,
    arrows: true,
    prevArrow: $(".first-section__slider-arrow-prev"),
    nextArrow: $(".first-section__slider-arrow-next"),
    asNavFor:
      ".first-section__slider .second-slider, .first-section__slider .third-slider, .first-section__slider .fourth-slider"
  });
  $(".first-section__slider .second-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    vertical: true,
    speed: 500,
    asNavFor: ".first-section__slider .first-slider"
  });
  $(".first-section__slider .third-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    vertical: true,
    speed: 500,
    asNavFor: ".first-section__slider .second-slider"
  });
  $(".first-section__slider .fourth-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    vertical: true,
    speed: 500,
    asNavFor: ".first-section__slider .second-slider"
  });

  $('.first-section__slider .first-slider').on('afterChange', function(event, slick, currentSlide){
    
    let currentSlideUrl = $(
      `.first-slider .slide[data-slick-index=${currentSlide}]`
    ).attr('data-href');
    
    $('.first-section__bottom-btn').attr('href', currentSlideUrl)
  });
} 

let windowWidth = $(window).width()

function linkTrigger() {
  if(windowWidth < 992){
    $('.first-slider .slide').on('click', function() {
      let url = $(this).attr('data-href')
      window.open(url,"_self")
    })
  }
}

linkTrigger()
initSlider();
// export {initSlider}
