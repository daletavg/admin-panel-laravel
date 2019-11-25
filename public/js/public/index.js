/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/public/functions.js":
/*!******************************************!*\
  !*** ./resources/js/public/functions.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(".header__burger").on("click", function () {
  $(this).toggleClass("active");
  $(".menu").toggleClass("active");
});
$(".modal-k__btn, .modal-k__overlay").on("click", function () {
  $(".modal-k").removeClass("active");
});
$(".search-field").on("click", function (e) {
  $(".header__search__input").toggleClass("active");
  $(this).toggleClass("active");

  if ($(window).width() < 768) {
    $(".modal-k__overlay").toggleClass("active");
  }
}); //

$("main, .modal-k__overlay").on("click", function () {
  $(".header__search__input,.search-field,.modal-k__overlay").removeClass("active");
});

function clearValue(elem) {
  elem.val("");
}

$(".header__search__input-close").on("click", function () {
  var input = $(".header__search__input-item");

  if (input.val().length > 0) {
    clearValue(input);
  } else {
    $(".header__search__input,.search-field").removeClass("active");

    if ($(window).width() < 768) {
      $(".modal-k__overlay").toggleClass("active");
    }
  }
});
var timer = null;
$(".header__search__input-item").on("input", function () {
  clearInterval(timer);
  var search = $(this).val();
  var url = $(".header__search__input").attr("data-submit");
  var parent = $(".header__search__list-box");
  console.log(search);
  timer = setTimeout(function () {
    $('.header__search__list-box').html('');
    $.ajax({
      method: 'GET',
      data: {
        search: search
      },
      url: url,
      success: function success(data) {
        data.forEach(function (item) {
          appendElem(parent, itemTemplate(item));
        });
      },
      erorr: function erorr(err) {
        console.log(err);
      }
    }); // dataArray.forEach(item => {
    //    $('.header__search__list-box').append(itemTemplate(item))
    //   appendElem(parent, itemTemplate(item));
    // });
  }, 500);
});
var dataArray = [{
  title: "1 МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА",
  date: "13 октября 19:00",
  image: "img/oskar_2019.jpg",
  place: "Одесса, Театр Оперы и Балета",
  url: "event.html"
}, {
  title: "2 МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА",
  date: "13 октября 19:00",
  image: "img/oskar_2019.jpg",
  place: "Одесса, Театр Оперы и Балета",
  url: "event.html"
}, {
  title: "3 МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА",
  date: "13 октября 19:00",
  image: "img/oskar_2019.jpg",
  place: "Одесса, Театр Оперы и Балета",
  url: "event.html"
}, {
  title: "4 МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА",
  date: "13 октября 19:00",
  image: "img/oskar_2019.jpg",
  place: "Одесса, Театр Оперы и Балета",
  url: "event.html"
}];

function appendElem(parent, elem) {
  parent.append(elem);
}

function itemTemplate(_ref) {
  var title = _ref.title,
      date = _ref.date,
      image = _ref.image,
      place = _ref.place,
      url = _ref.url;
  var template = "<div class=\"header__search__list-item\">\n    <img src=\"".concat(image, "\" alt=\"\" class=\"search__image\">\n    <div class=\"search_container\">\n      <p class=\"search_container__text\">").concat(date, "</p>\n      <p class=\"search_container__title\">").concat(title, "</p>\n      <p class=\"search_container__text\">").concat(place, "</p>\n      <a href=\"").concat(url, "\" class=\"search_container__btn align-self-end\">\n        <span>\u041F\u043E\u0434\u0440\u043E\u0431\u043D\u0435\u0435</span>\n        <img src=\"img/arrow-more.svg\" alt=\"\">\n      </a>\n    </div>\n  </div>");
  return template;
}

$('.modal-k__btn, .modal-k__overlay').on('click', function () {
  $('.modal-k').removeClass('active');
});
$("form").on("submit", function (e) {
  // НАЗВАНИЕ КЛАССА ФОРМЫ
  e.preventDefault(); // let response = grecaptcha.getResponse();
  // if(response.length == 0) {
  //   alert("Пожалуйста, подтвердите что вы не робот")
  //   return false
  // }

  var url = $(this).attr('action');
  var switcher;
  var thatForm = $(this); // let url = "/";

  var $inputArr = $(this).find(".required_input"); // МАССИВ ИНПУТОВ ИЛИ СЕЛЕКТОВ (КОТОРЫЕ ДОЛЖНЫ ВАЛИДИРОВАТЬСЯ)

  var dataObject = {};
  $inputArr.each(function (key, el) {
    var inputName = $(el).attr("name");
    var inputVal = $(el).val();

    if ($(el).val() === "" || $(el).val() === null) {
      $(el).addClass("error"); // ПОВЕСИТЬ СТИЛИ НА ЭТОТ КЛАСС

      $(el).removeClass("success");
    } else {
      $(el).removeClass("error");
      $(el).addClass("success"); //   console.log(inputName);

      dataObject[inputName] = inputVal; // ОБЯЗАТЕЛЬНО ВСЕМ ИНПУТАМИ ПРИСВОИТЬ АТТРИБУТ "name"
    }
  });
  switcher = !$inputArr.hasClass("error");

  if (switcher === true) {
    //     var msg   = $('#formX').serialize();
    $.ajax({
      // url: url,
      type: "POST",
      url: url,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: dataObject,
      success: function success(data) {
        thatForm.find('input').val('');
        $('.modal-k').addClass('active');
      },
      error: function error() {
        alert("Ошибка при отправке данных"); // ДЕЙСТВИЕ ПРИ ОШИБКЕ ОТПРАВКИ
      }
    }); //.then(responce => console.log(responce))
    //.catch(err => console.log(err))
  }
});

/***/ }),

/***/ "./resources/js/public/index.js":
/*!**************************************!*\
  !*** ./resources/js/public/index.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
* IMPORTS LIBS
* */

/*
* IMPORTS MY SCRIPT
* */

/*
* CONSTANTS
* */
// INIT CUSTOM PAGES
__webpack_require__(/*! ./initPages */ "./resources/js/public/initPages.js");

/***/ }),

/***/ "./resources/js/public/initPages.js":
/*!******************************************!*\
  !*** ./resources/js/public/initPages.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var main = document.querySelector("main");
var pageId = main.getAttribute("id");

__webpack_require__(/*! ./functions */ "./resources/js/public/functions.js");

pageId === "main-page" && __webpack_require__(/*! ./pages/mainPage.js */ "./resources/js/public/pages/mainPage.js");
pageId === "about-page" && __webpack_require__(/*! ./pages/aboutPage.js */ "./resources/js/public/pages/aboutPage.js");
pageId === "event-page" && __webpack_require__(/*! ./pages/eventPage.js */ "./resources/js/public/pages/eventPage.js"); // global script

/***/ }),

/***/ "./resources/js/public/pages/aboutPage.js":
/*!************************************************!*\
  !*** ./resources/js/public/pages/aboutPage.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function initSlider() {
  $(".partners_section__slider .slider").slick({
    slidesToShow: 4,
    centerMode: false,
    centerPadding: 0,
    arrows: true,
    prevArrow: $(".partners_section__slider-arrow-box .arrow-prev"),
    nextArrow: $(".partners_section__slider-arrow-box .arrow-next"),
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: "60px"
      }
    }]
  });
}

initSlider();

/***/ }),

/***/ "./resources/js/public/pages/eventPage.js":
/*!************************************************!*\
  !*** ./resources/js/public/pages/eventPage.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function initGallerySlider() {
  $(".gallery_section__slider .slider").slick({
    slidesToScroll: 1,
    variableWidth: true,
    dots: true,
    appendDots: $('.gallery_section__slider-dots .dots-wrapper'),
    arrows: true,
    prevArrow: $('.gallery_section__slider-arrow-prev'),
    nextArrow: $('.gallery_section__slider-arrow-next'),
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });
} // ----------


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
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 2
      }
    }]
  });
  $(".video_section__slider-big .slider").on("beforeChange", function (event, slick, currentSlide, nextSlide) {
    var currentSlideSrc = $(".video_section__slider-big .slide[data-slick-index=".concat(currentSlide, "]"));
    var image = currentSlideSrc.find(".video_section__img");
    var playImage = currentSlideSrc.find(".video_section__play");
    var iframeBox = currentSlideSrc.find(".iframe_box");
    showElement(image);
    showElement(playImage);
    iframeBox.html(" ");
  });
} // ----------


function createIframe() {
  $(".video_section__slider-big .slide").on("click", function () {
    var image = $(this).find(".video_section__img");
    var playImage = $(this).find(".video_section__play");
    var iframeBox = $(this).find(".iframe_box");
    var options = getOptions(image);
    var iframe = iframeTemplate(options);
    appendIframe(iframeBox, iframe);
    hideElement(image);
    hideElement(playImage);
  });
}

function getOptions(elem) {
  var width = elem.width();
  var height = elem.height();
  var src = elem.attr("data-iframe");
  return {
    width: width,
    height: height,
    src: src
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

function iframeTemplate(_ref) {
  var width = _ref.width,
      height = _ref.height,
      src = _ref.src;
  return "<iframe width=\"".concat(width, "\" height=\"").concat(height, "\" src=\"").concat(src, "/?autoplay=1\"\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>");
}

initGallerySlider();
initVideoSlider();
createIframe();

/***/ }),

/***/ "./resources/js/public/pages/mainPage.js":
/*!***********************************************!*\
  !*** ./resources/js/public/pages/mainPage.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function initSlider() {
  $(".first-section__slider .first-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    appendDots: $(".first-section__slider-dots .dots-wrapper"),
    dots: true,
    arrows: true,
    prevArrow: $(".first-section__slider-arrow-prev"),
    nextArrow: $(".first-section__slider-arrow-next"),
    asNavFor: ".first-section__slider .second-slider, .first-section__slider .third-slider, .first-section__slider .fourth-slider"
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
  $('.first-section__slider .first-slider').on('afterChange', function (event, slick, currentSlide) {
    var currentSlideUrl = $(".first-slider .slide[data-slick-index=".concat(currentSlide, "]")).attr('data-href');
    $('.first-section__bottom-btn').attr('href', currentSlideUrl);
  });
}

var windowWidth = $(window).width();

function linkTrigger() {
  if (windowWidth < 992) {
    $('.first-slider .slide').on('click', function () {
      var url = $(this).attr('data-href');
      window.open(url, "_self");
    });
  }
}

function eventTemplate(_ref) {
  var image = _ref.image,
      date = _ref.date,
      title = _ref.title,
      description = _ref.description,
      place = _ref.place,
      city = _ref.city,
      priceBefore = _ref.priceBefore,
      payLink = _ref.payLink,
      eventUrl = _ref.eventUrl;
  var template = "<div class=\"col-12 col-md-6 col-lg-3 mb-10 mb-lg-30\">\n                    <div class=\"events-section__card aos-init aos-animate\" data-aos=\"fade-up\" data-aos-once=\"true\" data-aos-delay=\"50\" data-aos-duration=\"1000\">\n                        <div class=\"row events-section__box\">\n                            <div class=\"col-6 col-lg-12 events-section__image-box\">\n                                <img src=\"".concat(image, "\" alt=\"\" class=\"events-section__image\">\n                            </div>\n                            <div class=\"col-6 col-lg-12 events-section__text d-flex flex-column\">\n                                <p class=\"events-section__date\">").concat(date, "</p>\n                                <p class=\"events-section__name\">").concat(title, "</p>\n                                <p class=\"events-section__date\">").concat(city, ", ").concat(place, "</p>\n                                <p class=\"events-section__cost mb-15 mb-lg-0\">").concat(priceBefore, "</p>\n                                <a href=\"").concat(payLink, "\" class=\"events-section__btn mb-10 d-lg-none\">\u041A\u0443\u043F\u0438\u0442\u044C \u0431\u0438\u043B\u0435\u0442</a>\n                                <a href=\"").concat(eventUrl, "\" class=\"events-section__link d-lg-none\">\u041F\u043E\u0434\u0440\u043E\u0431\u043D\u0435\u0435 <img src=\"./img/public/arrow-more.svg\" alt=\"\"></a>\n                            </div>\n                        </div>\n\n                        <div class=\"events-section__overlay d-none d-lg-flex flex-column justify-content-between\">\n                            <div class=\"box d-flex flex-column\">\n                                <p class=\"events-section__overlay-date mb-15\">").concat(date, "</p>\n                                <p class=\"events-section__overlay-name\">").concat(title, "</p>\n                                <p class=\"events-section__overlay-text\">").concat(description, " </p>\n                                <p class=\"events-section__overlay-date\">").concat(place, "</p>\n                            </div>\n                            <div class=\"box d-flex flex-column\">\n                                <a href=\"").concat(eventUrl, "\" class=\"events-section__overlay-btn blue-btn mb-15\">\u041F\u043E\u0434\u0440\u043E\u0431\u043D\u0435\u0435</a>\n                                <a href=\"").concat(payLink, "\" class=\"events-section__overlay-link red-btn\">\u041A\u0443\u043F\u0438\u0442\u044C \u0431\u0438\u043B\u0435\u0442</a>\n                            </div>\n                        </div>\n                    </div>\n                </div>");
  return template;
}

function appendElem(parent, elem) {
  parent.append(elem);
}

function showMore() {
  $('.events-section__more').on('click', function () {
    var that = $(this);
    var url = that.attr('data-url');
    var dataId = that.attr('data-id');
    var parent = $('.events-section .event-section-parent');
    $.ajax({
      method: 'GET',
      data: {
        dataId: dataId
      },
      url: url,
      success: function success(data) {
        data.forEach(function (item) {
          appendElem(parent, eventTemplate(item));
        });
        dataId = Number(dataId) + data.length;
        that.attr('data-id', dataId);

        if (data.length < 1) {
          that.remove();
        }
      },
      erorr: function erorr(err) {
        console.log(err);
      }
    });
  });
}

showMore();
linkTrigger();
initSlider(); // export {initSlider}

/***/ }),

/***/ "./resources/sass/public/style.scss":
/*!******************************************!*\
  !*** ./resources/sass/public/style.scss ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*******************************************************************************!*\
  !*** multi ./resources/js/public/index.js ./resources/sass/public/style.scss ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Applications/MAMP/htdocs/tickets/resources/js/public/index.js */"./resources/js/public/index.js");
module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/tickets/resources/sass/public/style.scss */"./resources/sass/public/style.scss");


/***/ })

/******/ });