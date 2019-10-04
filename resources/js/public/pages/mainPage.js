function madeCub(el){
   const elWidth = el.width();
    el.height(elWidth);
}
function onResize (el){
    $(window).resize(()=>madeCub(el))
}
// onResize ($('.service-grid__item'));
// madeCub($('.service-grid__item'));

export {madeCub, onResize}