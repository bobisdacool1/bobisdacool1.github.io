$('.img-wrap').slick({
  slidesToShow: 3,
  prevArrow: '<button type="button" class="slick-prev"></button>',
  nextArrow: '<button type="button" class="slick-next"></button>',
  responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 450,
      settings: {
        slidesToShow: 1
      }
    }
  ],
  adaptiveHeight: true
});
//Scroll
function scrollToThe(id, ofefset) {
  if (ofefset == undefined) {
    ofefset = 0;
    $('html, body').animate({
      scrollTop: $(id).offset().top - ofefset
    }, 600);
  }
  else {
    $('html, body').animate({
      scrollTop: $(id).offset().top - ofefset
    }, 600);
  };
  return false;
};
$('a[href=""]').on('click', function(e){
  return false
});
$('input[type="phone"]').mask('+7 999 999 99 99')