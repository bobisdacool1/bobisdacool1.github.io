$('a[href=""]').on('click', function () {
  return false;
})
//popup enable
$('.service-item img').on('click', function(){
  let _class = ($(this).parent().attr('class').split(' ')[1])
  $('.popup-wrap.' + _class).fadeIn(400)
  $('body').addClass('ofh')
})
//popup disable
$('.popup-wrap i.fa-times').on('click', function () {
  let _class = ($(this).parent().parent().attr('class').split(' ')[2])
  $('.popup-wrap.' + _class).fadeOut(400)
  $('body').removeClass('ofh')
})
$('.popup-desc .button').on('click', function () {
  $(this).parent().parent().parent().parent().parent().fadeOut(400)
  $('body').toggleClass('ofh')
})
$(document).on('keyup',function(evt) {
  if (evt.keyCode == 27) {
     $('.popup-wrap').fadeOut(400)
     $('body').removeClass('ofh')
  }
});
//carousel
$('.popup-content .sub-img').on('click', function(){
  let _class = ($(this).attr('class').split(' ')[2])
  let mainImage = $('.popup-content .main-img.' + _class).css('background-image')
  let subImage = $(this).css('background-image')
  $(this).css('background-image', mainImage)
  $('.popup-content .main-img.' + _class).css('background-image', subImage)
})
//Scroll
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
//form
$('form').on('focus', 'input[type=number]', function (e) {
  $(this).on('mousewheel.disableScroll', function (e) {
    e.preventDefault()
  })
})
//mobile
$('.hamburger-menu').on('click', function () {
  $(this).toggleClass('active')
  $('.navbar-nav-m').toggleClass('active')
})
$('.navbar-nav__item').on('click', function () {
  $('.navbar-nav-m').toggleClass('active')
  $('.hamburger-menu').toggleClass('active')
  $('.popup-wrap').fadeOut(400)
  $('body.ofh').toggleClass('ofh')
})


//Калькулятор
$('.checkbox-item').on('click', function () {
  $(this).children('.checkmark').children().toggleClass('active')
  var price = priceCalc($('.price i.active'), $('input[type="range"]').val())
  $('output').val(price)
})
$('.range').on('input.calc-input change', (function () {
  $('input.calc-input[type="number"]').val($(this).val())
}))
$('input.calc-input[type="number"]').on('input.calc-input[type="number"] change', function () {
  $('input[type="range"]').val($(this).val())
})
$('input.calc-input').on('input.calc-input change', function () {
  var price = priceCalc($('.price i.active'), $('input[type="range"]').val())
  $('output').val(price)
})

function priceCalc(id, amount) {
  let _id = id.parent().parent().children('.checkmark-desc')
  let _amount = amount
  let _price
  console.log($(_id[1]).attr('id'))
  if (_id.length == 3) {
    if (amount < 101) {
      _price = 2600 * 2 + 2500
    }
    if (_amount > 100 && _amount < 501) {
      _price = 3100 * 2 + 2900
    }
    if (_amount > 501 && _amount < 1001) {
      _price = _amount * 12 * 2 + _amount * 10
    }
    if (_amount > 1001 && _amount < 5001) {
      _price = _amount * 10 * 2 + _amount * 8
    }
    if (_amount > 5001 && _amount < 10001) {
      _price = _amount * 7 * 2 + _amount * 5
    }
    if (_amount > 10000) {
      _price = amount * 4 * 2 + _amount * 3
    }
  }
  if (_id.length == 2) {
    for (var i = 0; i < 1; i++) {
      if ($(_id[i]).attr('id') == deratization) {
        if (amount < 101) {
          _price = 2500 + 2600
        }
        if (_amount > 100 && _amount < 501) {
          _price = 2900 + 3100
        }
        if (_amount > 501 && _amount < 1001) {
          _price = _amount * 10 + _amount * 12
        }
        if (_amount > 1001 && _amount < 5001) {
          _price = _amount * 8 + _amount * 10
        }
        if (_amount > 5001 && _amount < 10001) {
          _price = _amount * 5 + _amount * 7
        }
        if (_amount > 10000) {
          _price = _amount * 3 + _amount * 4
        }
      }
      else {
        if (amount < 101) {
          _price = 2600 * 2
        }
        if (_amount > 100 && _amount < 501) {
          _price = 3100 * 2
        }
        if (_amount > 501 && _amount < 1001) {
          _price = _amount * 12 * 2
        }
        if (_amount > 1001 && _amount < 5001) {
          _price = _amount * 10 * 2
        }
        if (_amount > 5001 && _amount < 10001) {
          _price = _amount * 7 * 2
        }
        if (_amount > 10000) {
          _price = amount * 4 * 2
        }
      }
    }
  }
  if (_id.length == 1 && _id.attr('id') == 'deratization') {
    if (amount < 101) {
      _price = 2500
    }
    if (_amount > 100 && _amount < 501) {
      _price = 2900
    }
    if (_amount > 501 && _amount < 1001) {
      _price = _amount * 10
    }
    if (_amount > 1001 && _amount < 5001) {
      _price = _amount * 8
    }
    if (_amount > 5001 && _amount < 10001) {
      _price = _amount * 5
    }
    if (_amount > 10000) {
      _price = _amount * 3
    }
  }
  if (_id.length == 1 && (_id.attr('id') == 'disinsection' || _id.attr('id') == 'disinfection')) {
    if (amount < 101) {
      _price = 2600
    }
    if (_amount > 100 && _amount < 501) {
      _price = 3100
    }
    if (_amount > 501 && _amount < 1001) {
      _price = _amount * 12
    }
    if (_amount > 1001 && _amount < 5001) {
      _price = _amount * 10
    }
    if (_amount > 5001 && _amount < 10001) {
      _price = _amount * 7
    }
    if (_amount > 10000) {
      _price = amount * 4
    }
  }
  return _price
}