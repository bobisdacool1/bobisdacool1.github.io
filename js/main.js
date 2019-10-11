$('.work-item').on('hover', function () {
  $(this).toggleClass('active');
});
$('a[href=""]').click(function (e) {
  e.preventDefault();
});
$('a[href="#"]').click(function (e) {
  e.preventDefault();
  return false;
});
var ofefset = 0;
function scrollToThe(id, ofefset) {
  if (ofefset == undefined) {
    ofefset = 0;
    $('html, body').animate({
      scrollTop: $(id).offset().top - ofefset
    }, 1200);
    console.log('gat')
  }
  else {
    $('html, body').animate({
      scrollTop: $(id).offset().top - ofefset
    }, 1200);
    console.log('gat')
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
$('.nav a').on('click', function () {
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
  $('.popup').fadeOut();
  $('.popup').addClass('hidden');
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
  $('body').addClass('noscroll').css({ top: -lastTop });
}

function continueScrolling() {

  $('body').removeClass('noscroll');
  $(window).scrollTop(lastTop);
}
$('input[type="phone"]').mask('+7(999)999-99-99');

var clock = new FlipClock($('.clocker'), {
  clockFace: 'HourlyCounter',
  autoStart: false
});
clock.setCountdown(true);
clock.setTime(time);
clock.start();
$('.flip-clock-wrapper a').attr('href', null);

$('body').on('click', function () {
  if (time <= 0) {
    $('.discount').addClass('hidden')
    $('legend').addClass('hidden')
    $('.').addClass('hidden')
    $('legend').addClass('hidden')
  }
  console.log('scrolling')
})