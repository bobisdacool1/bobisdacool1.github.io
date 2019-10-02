$('.work-item').on('hover', function () {
  $(this).toggleClass('active')
})
$('a[href=""]').click(function (e) {
  e.preventDefault();
})
//popup in
$('.work-item-hidden a.button').on('click', function (e) {
  e.preventDefault()

  var _class = ($(this).attr('class').split(' ')[1])
  $('.popup-wrap').removeClass('hidden')
  $('.popup.hidden.' + _class).removeClass('hidden')
  $('body').addClass('ofh')
})

//popup out
$('.popup i').on('click', function (e) {

  var _class = ($(this).parent().attr('class').split(' ')[1])
  $('.popup-wrap').addClass('hidden')
  $('.popup.' + _class).addClass('hidden')
  $('body').removeClass('ofh')
})
$('.button-offer').on('click', function(e){
  e.preventDefault()

  var _class = ($(this).parent().attr('class').split(' ')[1])
  $('.popup-wrap').addClass('hidden')
  $('.popup.' + _class).addClass('hidden')
  $('body').removeClass('ofh')
  scrollToThe('#feedback')
})
$(document).on('keyup',function(evt) {
    if (evt.keyCode == 27) {
      
      $('.popup-wrap').addClass('hidden')
      $('.popup').addClass('hidden')
      $('body').removeClass('ofh')
    }
});
//popup slider
$('.sub-img').on('click', function(){
  let sub = $(this).css('background-image')
  let main = $(this).parent().children('.main-img')
  $(this).css('background-image', main)
  $(this).parent().children('.main-img').css('background-image', sub)
})

var ofefset = 0
function scrollToThe(id, ofefset) {
    if (ofefset == undefined) {
        ofefset = 0
        $('html, body').animate({
            scrollTop: $(id).offset().top - ofefset
        }, 1200)
    }
    else {
        $('html, body').animate({
            scrollTop: $(id).offset().top - ofefset
        }, 1200)
    }

    return false
}
//nav
var height = $('.navbar').offset().top

$(window).on('scroll', function(){
  if ($(this).scrollTop() > height){
    $('.navbar').addClass('sticky')
  } else {
    $('.navbar').removeClass('sticky')
  }
})