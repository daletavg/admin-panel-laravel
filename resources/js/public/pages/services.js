function gallerySlider() {
    $('.service-gallery-slider').on('init', function (event, slick) {
        const count = slick.$slides.length;
        $('.count').text(count);
        $('.current').text($(slick.$slides[slick.currentSlide]).index()+1);
        const nexttEl = $(slick.$slides[slick.currentSlide]).next();
        const src = $(nexttEl)
            .find("img")
            .attr("src");
        $(".service-gallery-next-slide img").attr("src", src);
    }).on("afterChange", function(event, slick, currentSlide) {
        $(".current").text(currentSlide + 1);
        const nextEl = $(slick.$slides[slick.currentSlide]).next();
        const currentInd = $(slick.$slides[slick.currentSlide]).index();
        const count = slick.$slides.length - 1;
        let nextImg = $(nextEl).find("img");
        if (currentInd=== count){
            nextImg = $(slick.$slides[0]).find('img')
        }
        const nextImgSrc = nextImg[0].src;
        $(".service-gallery-next-slide img").attr("src", nextImgSrc);
    }).on("beforeChange", function() {
        $(".service-gallery-next-slide").addClass("service-gallery-next-slide_active");
        $(".service-gallery-slider .next-arrow").css({
            pointerEvents: "none"
        });
        setTimeout(function() {
            $(".service-gallery-next-slide").removeClass("service-gallery-next-slide_active");
            $(".service-gallery-slider .next-arrow").css({
                pointerEvents: "auto"
            });
        }, 1000);});

    $('.service-gallery-slider').slick({
        fade:true,
        arrow:true,
        nextArrow:'<div class="slick-arrow next-arrow"><img class="w-100" src="./img/slider-arrow.svg" alt=""></div>',
        prevArrow:false,
    })
}
 function changeImgOnIframe() {
     $('.service-iframe-box').on('click', function(){
         const that = $(this);
         const url = getUrl(that);
         const sizeStyle = getSize(that);
         console.log(sizeStyle);
         const el = getIframeTemplate(sizeStyle,url);
         that.html(el);
     });
     function getIframeTemplate({width, height},url) {
         return(
             `<iframe
                    width="${width}px"
                    height="${height}px"
                    src="${url}"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                  ></iframe>`
         )
     }
     function getUrl (that){
         return that.find('.service-iframe-img').attr('data-src');
     }
     function getSize(that) {
        const width =  that.find('.service-iframe-img').width();
        const height =  that.find('.service-iframe-img').height();
        return{
            width,
            height
        }
     }
 }
changeImgOnIframe();
gallerySlider();