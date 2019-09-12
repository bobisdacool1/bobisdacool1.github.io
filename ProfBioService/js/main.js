$("a").click(function () {
  return false;
})
//Дезинсекция
$('.service-item.disinsection img').on('click', function(){
  $('.popup-wrap.disinsection').fadeIn(400)
  $('body').toggleClass('ofh')
})
$('.popup-wrap.disinsection i.fa-times').on('click', function(){
  $('.popup-wrap.disinsection').fadeOut(400)
  $('body').toggleClass('ofh')
})
//Дератизация
$('.service-item.deratization img').on('click', function(){
  $('.popup-wrap.deratization').fadeIn(400)
  $('body').toggleClass('ofh')
})
$('.popup-wrap.deratization i.fa-times').on('click', function(){
  $('.popup-wrap.deratization').fadeOut(400)
  $('body').toggleClass('ofh')
})
//Дезинфекция
$('.service-item.disinfection img').on('click', function(){
  $('.popup-wrap.disinfection').fadeIn(400)
  $('body').toggleClass('ofh')
})
$('.popup-wrap.disinfection i.fa-times').on('click', function(){
  $('.popup-wrap.disinfection').fadeOut(400)
  $('body').toggleClass('ofh')
})
//Слайдер дезинсекция
$('.popup-content .sub-img.disinsection').on('click', function(){
  var mainImage, subImage
  mainImage = $('.popup-content .main-img.disinsection').css('background-image')
  subImage = $(this).css('background-image')
  $(this).css('background-image', mainImage)
  $('.popup-content .main-img.disinsection').css('background-image', subImage)
})
//Слайдер дератизация
$('.popup-content .sub-img.deratization').on('click', function(){
  var mainImage, subImage
  mainImage = $('.popup-content .main-img.deratization').css('background-image')
  subImage = $(this).css('background-image')
  $(this).css('background-image', mainImage)
  $('.popup-content .main-img.deratization').css('background-image', subImage)
})
//Слайдер дезинфекция
$('.popup-content .sub-img.disinfection').on('click', function(){
  var mainImage, subImage
  mainImage = $('.popup-content .main-img.disinfection').css('background-image')
  subImage = $(this).css('background-image')
  $(this).css('background-image', mainImage)
  $('.popup-content .main-img.disinfection').css('background-image', subImage)
})
//Калькулятор
$('.checkbox-item').on('click', function(){
  $(this).children('.checkmark').children().toggleClass('active')
  var price = $('.calc-input').val() * 6.5 * $('i.active').length
  $('output').val(price)
})
$('.range').on('input.calc-input change', (function(){
  $('input.calc-input[type="number"]').val($(this).val())
}))
$('input.calc-input[type="number"]').on('input.calc-input[type="number"] change', function(){
  $('input[type="range"]').val($(this).val())
})
$('input.calc-input').on('input.calc-input change', function(){
  var price = $(this).val() * 6.5 * $('i.active').length
  $('output').val(price)
})