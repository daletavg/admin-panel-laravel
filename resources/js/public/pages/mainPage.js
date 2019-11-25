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

function eventTemplate({image, date, title, description, place, city, priceBefore, payLink, eventUrl}) {
    const template = `<div class="col-12 col-md-6 col-lg-3 mb-10 mb-lg-30">
                    <div class="events-section__card aos-init aos-animate" data-aos="fade-up" data-aos-once="true" data-aos-delay="50" data-aos-duration="1000">
                        <div class="row events-section__box">
                            <div class="col-6 col-lg-12 events-section__image-box">
                                <img src="${image}" alt="" class="events-section__image">
                            </div>
                            <div class="col-6 col-lg-12 events-section__text d-flex flex-column">
                                <p class="events-section__date">${date}</p>
                                <p class="events-section__name">${title}</p>
                                <p class="events-section__date">${city}, ${place}</p>
                                <p class="events-section__cost mb-15 mb-lg-0">${priceBefore}</p>
                                <a href="${payLink}" class="events-section__btn mb-10 d-lg-none">Купить билет</a>
                                <a href="${eventUrl}" class="events-section__link d-lg-none">Подробнее <img src="./img/public/arrow-more.svg" alt=""></a>
                            </div>
                        </div>

                        <div class="events-section__overlay d-none d-lg-flex flex-column justify-content-between">
                            <div class="box d-flex flex-column">
                                <p class="events-section__overlay-date mb-15">${date}</p>
                                <p class="events-section__overlay-name">${title}</p>
                                <p class="events-section__overlay-text">${description} </p>
                                <p class="events-section__overlay-date">${place}</p>
                            </div>
                            <div class="box d-flex flex-column">
                                <a href="${eventUrl}" class="events-section__overlay-btn blue-btn mb-15">Подробнее</a>
                                <a href="${payLink}" class="events-section__overlay-link red-btn">Купить билет</a>
                            </div>
                        </div>
                    </div>
                </div>`
    return template
}

function appendElem(parent, elem) {
    parent.append(elem);
}

function showMore() {
    $('.events-section__more').on('click', function () {
        const that = $(this)
        const url = that.attr('data-url')
        let dataId = that.attr('data-id')
        const parent = $('.events-section .event-section-parent')
        $.ajax({
            method:'GET',
            data: {dataId},
            url,
            success(data) {
                data.forEach(item => {
                    appendElem(parent, eventTemplate(item))
                })
                dataId = Number(dataId) + data.length

                that.attr('data-id', dataId)

                if(data.length < 1) {
                    that.remove()
                }
            },
            erorr(err) {
                console.log(err)
            }
        })
    })
}
showMore()
linkTrigger()
initSlider();
// export {initSlider}
