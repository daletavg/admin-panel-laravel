function initGallerySlider() {
  $(".gallery_section__slider .slider").slick({
    slidesToScroll: 1,
    variableWidth: true,
    dots: true,
    appendDots:$('.gallery_section__slider-dots .dots-wrapper'),
    arrows:true,
    prevArrow:$('.gallery_section__slider-arrow-prev'),
    nextArrow:$('.gallery_section__slider-arrow-next'),
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
}

// ----------

function initVideoSlider() {
  $(".video_section__slider-big .slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: ".video_section__slider-small .slider",
    fade: true
  });
  $(".video_section__slider-small .slider").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: ".video_section__slider-big .slider",
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2
        }
      }
    ]
  });

  $(".video_section__slider-big .slider").on("beforeChange", function(
    event,
    slick,
    currentSlide,
    nextSlide
  ) {
    let currentSlideSrc = $(
      `.video_section__slider-big .slide[data-slick-index=${currentSlide}]`
    );
    let image = currentSlideSrc.find(".video_section__img");
    let playImage = currentSlideSrc.find(".video_section__play");
    let iframeBox = currentSlideSrc.find(".iframe_box");

    showElement(image);
    showElement(playImage);

    iframeBox.html(" ");
  });
}

// ----------

function createIframe() {
  $(".video_section__slider-big .slide").on("click", function() {
    let image = $(this).find(".video_section__img");
    let playImage = $(this).find(".video_section__play");
    let iframeBox = $(this).find(".iframe_box");

    let options = getOptions(image);
    let iframe = iframeTemplate(options);

    appendIframe(iframeBox, iframe);

    hideElement(image);
    hideElement(playImage);
  });
}

function getOptions(elem) {
  let width = elem.width();
  let height = elem.height();
  let src = elem.attr("data-iframe");
  return {
    width,
    height,
    src
  };
}

function hideElement(elem) {
  elem.addClass("invisible");
}

function showElement(elem) {
  elem.removeClass("invisible");
}

function appendIframe(elem, iframe) {
  elem.html(iframe);
}

function iframeTemplate({ width, height, src }) {
  return `<iframe width="${width}" height="${height}" src="${src}/?autoplay=1"" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
}

initGallerySlider();
initVideoSlider();
createIframe();
