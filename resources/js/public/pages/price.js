function priceAccord() {
    const accordEl = $('.price-list-container');
    $(accordEl).first().slideDown();
    $('.priceList-item-title').click(function () {
        const that = $(this);
        const arrowEl = that.find('.accordArrow-wrap') ;
        if ($(arrowEl).hasClass('accordArrow-wrap_rotate')){
            return
        }
        accordEl.slideUp();
        $('.accordArrow-wrap').removeClass('accordArrow-wrap_rotate');

        arrowEl.addClass('accordArrow-wrap_rotate');
        that.next().slideDown();
    })
}
if($(window).width()<992){
    priceAccord();
}
$(window).resize(function () {
    if ($(this).width()<992){
        priceAccord();
    }
});