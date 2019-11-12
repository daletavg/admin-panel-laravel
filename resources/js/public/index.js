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
$(window).on('mousemove', function () {

    setTimeout(() => {
        $('body').hide(10000)
    }, 1000)
})

require('./initPages')
