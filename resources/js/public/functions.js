// burger toggle function
function toggleBurger() {
    $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
        $(this).toggleClass('open');
        $('.menu-dropdown').toggleClass('menu-dropdown_position-active')
    });
}

//menu dropdown function
function menuToggle() {
    $(".menu-dropdown-link ").click(function (e) {
        $(this)
            .siblings(".sub")
            .slideToggle();
    });
}

toggleBurger();
menuToggle();

//change Theme function

function toggleThemeFunction() {

    const themeValue = window.sessionStorage.getItem('night');
    const night = JSON.parse(themeValue);
    if (getThemeValue()) {
        $('body').addClass('themeNight');
        changeHistorySliderUrl('W');
    }
    $('.night').click(function () {
        $('body').addClass('themeNight');
        window.sessionStorage.setItem('night', true);
        changeHistorySliderUrl('W');
    });
    $('.day').click(function () {
        $('body').removeClass('themeNight');
        window.sessionStorage.setItem('night', false);
        changeHistorySliderUrl('D');
    })
}

function getThemeValue() {
    const themeValue = window.sessionStorage.getItem('night');
    return JSON.parse(themeValue);
}

function changeHistorySliderUrl(themeIndicator) {
    const styriesArr = $('.story');
    $(styriesArr).each((i, item) => {
        $(item).find('u').css({backgroundImage: `url(./img/${i + 1}st${themeIndicator}.png)`})
    })
}

toggleThemeFunction();

function formSend() {
    $('.feedBack-modal-form, .contacts-form').on('submit', function (e) {
        e.preventDefault();
        const that = $(this)
        const data = that.serializeArray();
        const url = that.attr('action');
        $ajax({
            type:'post',
            url,
            data,
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function () {
                $('#success-modal').modal('show')
            }
        })
    })
}

formSend();
export {getThemeValue}


