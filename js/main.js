$('.work-item').on('hover', function () {
  $(this).toggleClass('active');
});
$('a[href=""]').click(function (e) {
  e.preventDefault();
});

var ofefset = 0;
function scrollToThe(id, ofefset) {
  if (ofefset == undefined) {
    ofefset = 0;
    $('html, body').animate({
      scrollTop: $(id).offset().top - ofefset
    }, 1200);
  }
  else {
    $('html, body').animate({
      scrollTop: $(id).offset().top - ofefset
    }, 1200);
  }

  return false;
}
//nav
var height = $('.navbar').offset().top

$(window).on('scroll', function () {
  if ($(this).scrollTop() > height) {
    $('.navbar').addClass('sticky');
    // $('.hamburger-button').addClass('visible')
  } else {
    $('.navbar').removeClass('sticky');
    // $('.hamburger-button').removeClass('visible')
  }
});
//responsive nav
$('.hamburger-button').on('click', function () {
  $(this).toggleClass('active');
  $('.nav').toggleClass('active');
});
$('.nav a').on('click', function(){
  $(this).parent().removeClass('active');
  $('.hamburger-button').removeClass('active');
});
//popup-slider
$('.sub-img').on('click', function () {
  var _main = $(this).parent().children('.main-img').css('background');
  var _sub = $(this).css('background');
  $(this).parent().children('.main-img').css('background', _sub);
  $(this).css('background', _main);
});
//popup in
$('.work-item-hidden a').on('click', function () {
  $('.popup-wrap.hidden').fadeIn();
  $('.popup.hidden.' + $(this).attr('class').split(' ')[1]).fadeIn();
  $('.popup-wrap.hidden').removeClass('hidden');
  $('.popup.hidden.' + $(this).attr('class').split(' ')[1]).removeClass('hidden');
  stopScrolling();
});
//popup out
$('.popup .close').on('click', function () {
  $('.popup-wrap').fadeOut();
  $('.popup-wrap').addClass('hidden');
  $(this).parent().parent().parent().fadeOut();
  $(this).parent().parent().parent().addClass('hidden');
  continueScrolling();
});
$(document).on('keyup', function (evt) {
  if (evt.keyCode == 27) {
    $('.popup-wrap').fadeOut();
    $('.popup-wrap').addClass('hidden');
    $('.popup').fadeOut();
    $('.popup').addClass('hidden');
    continueScrolling();
  }
});
$('.popup a.offer').on('click', function () {
  continueScrolling();
  $('.popup-wrap').fadeOut();
  $('.popup-wrap').addClass('hidden');
  $(this).parent().parent().parent().fadeOut();
  $(this).parent().parent().parent().addClass('hidden');
  scrollToThe('#feedback', 80);
});
//ofh
var lastTop;

function stopScrolling() {
    lastTop = $(window).scrollTop();      
    $('body').addClass( 'noscroll' )          
         .css( { top: -lastTop } )        
         ;            
}

function continueScrolling() {                    

    $('body').removeClass( 'noscroll' );      
    $(window).scrollTop( lastTop );       
}         