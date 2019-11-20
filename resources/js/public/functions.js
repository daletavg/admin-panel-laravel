$(".header__burger").on("click", function() {
  $(this).toggleClass("active");
  $(".menu").toggleClass("active");
});

$(".modal-k__btn, .modal-k__overlay").on("click", () => {
  $(".modal-k").removeClass("active");
});

$(".search-field").on("click", function(e) {
  $(".header__search__input").toggleClass("active");
  $(this).toggleClass("active");
  if ($(window).width() < 768) {
    $(".modal-k__overlay").toggleClass("active");
  }
});
//
$("main, .modal-k__overlay").on("click", function() {
  $(".header__search__input,.search-field,.modal-k__overlay").removeClass(
    "active"
  );
});

function clearValue(elem) {
  elem.val("");
}

$(".header__search__input-close").on("click", function() {
  let input = $(".header__search__input-item");
  if (input.val().length > 0) {
    clearValue(input);
  } else {
    $(".header__search__input,.search-field").removeClass("active");
    if ($(window).width() < 768) {
      $(".modal-k__overlay").toggleClass("active");
    }
  }
});

let timer = null;
$(".header__search__input-item").on("input", function() {
  clearInterval(timer);
  let search = $(this).val();
  let url = $(".header__search__input").attr("data-submit");
  let parent = $(".header__search__list-box");
    console.log(search);
    timer = setTimeout(() => {
    $.ajax({
      method:'GET',
      data: {search},
      url,
      success(data) {
        data.forEach(item => {
          appendElem(parent, itemTemplate(item))
        })
      },
      erorr(err) {
        console.log(err)
      }
    })
    // dataArray.forEach(item => {
    //    $('.header__search__list-box').append(itemTemplate(item))
    //   appendElem(parent, itemTemplate(item));
    // });
  }, 500);
});
const dataArray = [
  {
    title: "1 МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА",
    date: "13 октября 19:00",
    image: "img/oskar_2019.jpg",
    place: "Одесса, Театр Оперы и Балета",
    url: "event.html"
  },
  {
    title: "2 МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА",
    date: "13 октября 19:00",
    image: "img/oskar_2019.jpg",
    place: "Одесса, Театр Оперы и Балета",
    url: "event.html"
  },
  {
    title: "3 МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА",
    date: "13 октября 19:00",
    image: "img/oskar_2019.jpg",
    place: "Одесса, Театр Оперы и Балета",
    url: "event.html"
  },
  {
    title: "4 МЕЛОДИИ СЕРДЦА ЭДВАРДА ГРИГА",
    date: "13 октября 19:00",
    image: "img/oskar_2019.jpg",
    place: "Одесса, Театр Оперы и Балета",
    url: "event.html"
  }
];

function appendElem(parent, elem) {
  parent.append(elem);
}

function itemTemplate({ title, date, image, place, url }) {
  const template = `<div class="header__search__list-item">
    <img src="${image}" alt="" class="search__image">
    <div class="search_container">
      <p class="search_container__text">${date}</p>
      <p class="search_container__title">${title}</p>
      <p class="search_container__text">${place}</p>
      <a href="${url}" class="search_container__btn align-self-end">
        <span>Подробнее</span>
        <img src="img/arrow-more.svg" alt="">
      </a>
    </div>
  </div>`;

  return template;
}
