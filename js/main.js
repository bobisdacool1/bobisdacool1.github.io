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
})