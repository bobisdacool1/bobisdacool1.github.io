<?php
//including libs
require 'rb.php';
require 'cookies.php';

//connect to database
R::setup(
  'mysql:host=85.119.149.127; dbname=kalispel_users',
  'kalispel_root',
  'L6o8T6c1'
);

//config
$cookie_key = 'visited-cache';
$ip = $_SERVER['REMOTE_ADDR'];
$visited = R::findOne('visited', 'ip = ?', array($ip));
$cookied = CookieManager::stored($cookie_key);


//getting time when been open
if (!$visited && !$cookied) {
  //Create cookies and inject ip
  $time = time();
  $visited = R::dispense('visited');
  $visited->visit = $time;
  $visited->ip = $ip;
  R::store($visited);
  CookieManager::store($cookie_key, json_encode(array(
    'id' => $visited->id,
    'visit' => $time
  )));
} else {
  //ip check
  if ($visited) {
    //getting time
    $time = $visited['visit'];
    //adding cookies
    CookieManager::store($cookie_key, json_encode(array(
      'id' => $visited->id,
      'visit' => $time
    )));
  }
  //cookies
  else {
    //getting time
    $c = (array) json_decode(CookieManager::read($cookie_key), true);
    $time = $c['visit'];
    //ip injection
    $visited = R::dispense('visited');
    $visited->visit = $time;
    $visited->ip = $ip;
    R::store($visited);
  }
}
$breakTime = $time + (60 * 60 * 24);
$leftTime = $breakTime - time();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Разработка, доработка, продвижение сайтов для малого и среднего бизнеса.</title>
  <meta name="keywords" content="разработка сайтов, создание сайтов, заказать сайт, купить сайт, сайт цена, продвижение сайтов, создание и продвижение сайтов, разработка и продвижение сайтов, seo оптимизация, заказать контекстную рекламу, раскрутка сайта, веб специалист, веб-мастер">
  <meta name="description" content="В современном мире не предсталяется возможным ведение бизнеса без интернет ресурса. Огромное количество потенциальных клиентов прямо сейчас в поиске ваших услуг. Сделайте из них покупателей!">
  <link rel="icon" href="img/icon.png">
</head>

<body>
  <!-- Count time till discount -->
  <script>
    var time = <?php echo $leftTime; ?>;
  </script>
  <!-- font-awesome -->
  <script src="https://kit.fontawesome.com/3c507bb95c.js" crossorigin="anonymous"></script>

  <section id="hero" class="hero" data-vide-bg="video/White-Keyboard">
    <div class="hero-wrap">
      <div class="container">
        <header class="header">
          <div class="tagline">
            <div class="main-tag">Синицын Алексей</div>
            <div class="sub-tag">Создание сайтов “под ключ”</div>
          </div>
          <div class="contacts">
            <div class="phone">
              <i class="fas fa-phone-alt"></i>
              <a href="tel:+79003604026">+79003604026</a>
            </div>
            <div class="socials">
              <a href="https://wa.me/79003604026" target="_blank">
                <div class="social-item whatsapp"><i class="fab fa-whatsapp"></i></div>
              </a>
              <a href="https://t.me/kalispeller" target="_blank">
                <div class="social-item telegram"><i class="fab fa-telegram-plane"></i></div>
              </a>
              <a href="viber://chat?number=+79003604026" target="_blank">
                <div class="social-item viber"><i class="fab fa-viber"></i></div>
              </a>
            </div>
          </div>
        </header>
      </div>
      <navbar class="navbar" id="navbar">
        <div class="container navbar-container">
          <a href="" class="cuttent" onclick="scrollToThe('#hero')">Главная</a>
          <div class="hamburger-button visible">
            <span></span>
          </div>
          <div class="nav">
            <a href="" onclick="scrollToThe('#services', -50)">Цены</a>
            <a href="" onclick="scrollToThe('#portfolio', 150)">Портфолио</a>
            <a href="" onclick="scrollToThe('#faq', 30)">Вопросы?</a>
            <a href="" onclick="scrollToThe('#feedback', 80)">Связаться</a>
          </div>
        </div>
      </navbar>
      <div class="container hero-container">
        <h1>Создание сайтов с <br>бесплатными правками</h1>
        <p>Здравствуйте. Я делаю сайты для малого и среднего бизнеса. Я не делаю интернет-магазины, я делаю только
          одностраничные сайты, которые позволяют презентовать вашу компанию в сети, найти ваших клиентов и собрать
          заявки с сайта. Закажите сайт, после разработки которого ничего не нужно переделывать и дорабатывать</p>
        <a href="" onclick="scrollToThe('#portfolio', 220)" class="button button-o">Посмотреть портфолио</a>
      </div>
    </div>
  </section>
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono:300,400,400i,500,600&display=swap&subset=cyrillic" rel="stylesheet">

  <section class="services" id="services">
    <div class="container">
      <h1>Чем я могу быть полезен?</h1>
      <div class="card-wrap">
        <div class="card right-border row-1">
          <h3>Landing page</h3>
          <p>1 страница</p>
          <p>Презентует вашу компанию в сети</p>
          <p>Нужен чтобы превращать </p>
          <p class="sub-p">постетителей в покупателей</p>
          <p class="price">12 000</p>
          <a href="" class="button button-1" onclick="scrollToThe('#feedback', 80)">Заказать</a>
        </div>
        <div class="card center-border row-1">
          <h3>Сайт-визитка</h3>
          <p>2-4 страницы</p>
          <p>Рассказывает о вашей компании</p>
          <p>Повышает имидж среди посетителей</p>
          <p class="price">20 000</p>
          <a href="" class="button button-2" onclick="scrollToThe('#feedback', 80)">Заказать</a>
        </div>
        <div class="card left-border row-1">
          <h3>Рекламная компания</h3>
          <p>SEO и контекстная реклама</p>
          <p>Увеличение чилса посетителей</p>
          <p>Повышает продажи</p>
          <p class="price">2 000</p>
          <a href="" class="button button-3" onclick="scrollToThe('#feedback', 80)">Заказать</a>
        </div>
        <div class="card row-2 left-border">
          <h3>Адаптивность</h3>
          <p>Создание мобильной версии</p>
          <p>Пользователи телефонов не</p>
          <p class="sub-p">покидают сайт</p>
          <p>Увелечение конверсии</p>
          <p class="price">4 000</p>
          <a href="" class="button button-6" onclick="scrollToThe('#feedback', 80)">Заказать</a>
        </div>
        <div class="card center-border row-2">
          <h3>Редизайн сайта</h3>
          <p>Улучшение старого дизайна</p>
          <p>Увеличивает конверсию</p>
          <p>Увеличение конверсии</p>
          <p class="price">6 000</p>
          <a href="" class="button button-5" onclick="scrollToThe('#feedback', 80)">Заказать</a>
        </div>
        <div class="card right-border row-2">
          <h3>Доработка</h3>
          <p>Улучшение вашего сайта</p>
          <p>Анализ, админ-панель и тд</p>
          <p>Увеличение конверсии</p>
          <p class="price">2000</p>
          <a href="" class="button button-4" onclick="scrollToThe('#feedback', 80)">Заказать</a>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- Если закаЖите сейчас то получите бесплатно сео и тд -->
  <section class="portfolio" id="portfolio">
    <div class="container">
      <h1>Посмотрите три последние работы</h1>
      <h3>Чтобы узнать подробности кликните на картинку</h3>
      <div class="works-wrap">
        <div class="work-item profbioservice">
          <div class="work-item-hidden">
            <h4>ПрофБиоСервис</h4>
            <a href="" class="button profbioservice">Сроки, стоимость и тд</a>
          </div>
        </div>
        <div class="work-item sweetsmoke">
          <div class="work-item-hidden">
            <h4>SweetSmoke</h4>
            <a href="" class="button sweetsmoke">Сроки, стоимость и тд</a>
          </div>
        </div>
        <div class="work-item eddis-car">
          <div class="work-item-hidden">
            <h4>Eddi's car</h4>
            <a href="" class="button eddis-car">Сроки, стоимость и тд</a>
          </div>
        </div>
      </div>
    </div>

    <div class="popup-wrap hidden">
      <div class="popup hidden profbioservice">
        <div class="popup-content">
          <div class="close"><i class="far fa-window-close"></i></div>
          <h2>Профбиосервис</h2>
          <div class="image-slider">
            <div class="main-img img-1"></div>
            <div class="sub-img img-2"></div>
            <div class="sub-img img-3"></div>
            <div class="sub-img img-4"></div>
          </div>
          <div class="desc">
            <h4>Задача</h4>
            <p>Обратился клиент из Москвы, которому нужен был сайт. Заказчик не имел особого представления о том, какой
              этот сайт должен быть. В итоге мы подобрали тарифный план landing page, который включает в себя одну
              страницу. Работа проходила в следующем формате: прототип - удтверждение, дизайн - удтверждение, верстка -
              удтверждение, правки. В итоге клиент получил рабочий сайт, с версией для мобильных устроиств, настроенной
              яндекс.метрикой и онлайн-консультантом. Так же в виде небольшого бонуса был сделан логотип
            </p>
            <div class="attr">
              <div class="attr-item">
                <span>Сроки</span>
                <p>2 недели</p>
              </div>
              <div class="attr-item">
                <span>Стоимость</span>
                <p>8 000 рублей</p>
              </div>
            </div>
          </div>
          <div class="btn-wrap">
            <a href="portfolio/ProfBioService/" target="_blank" class="button button-o">Перейти на сайт</a>
            <a href="" class="button button-o offer">Хочу такой же</a>
          </div>
        </div>
      </div>
      <div class="popup hidden sweetsmoke">
        <div class="popup-content">
          <div class="close"><i class="far fa-window-close"></i></div>
          <h2>Sweet Smoke</h2>
          <div class="image-slider">
            <div class="main-img img-1"></div>
            <div class="sub-img img-2"></div>
            <div class="sub-img img-3"></div>
            <div class="sub-img img-4"></div>
          </div>
          <div class="desc">
            <h4>Задача</h4>
            <p>
              Обратился клиент, которому нужна была верстка. Заказчик имел с собой дизайн-макет для сайта, сроки были
              очень ограничены. Для заказчика была важна скорость работы и цена, поэтому было принято решение не делать
              верстку под мобильные устройства, а сделать только под широкоформатные мониторы. В итоге заказчик получил
              верстку своего дизайн-макета за ограниченное время и за небольшую цену.
            </p>
            <div class="attr">
              <div class="attr-item">
                <span>Сроки</span>
                <p>48 часов</p>
              </div>
              <div class="attr-item">
                <span>Стоимость</span>
                <p>6 000 рублей</p>
              </div>
            </div>
          </div>
          <div class="btn-wrap">
            <a href="portfolio/SweetSmoke/index.html" target="_blank" class="button button-o">Перейти на сайт</a>
            <a href="" class="button button-o offer">Хочу такой же</a>
          </div>
        </div>
      </div>
      <div class="popup hidden eddis-car">
        <div class="popup-content">
          <div class="close"><i class="far fa-window-close"></i></div>
          <h2>Eddi's car</h2>
          <div class="image-slider">
            <div class="main-img img-1"></div>
            <div class="sub-img img-2"></div>
            <div class="sub-img img-3"></div>
            <div class="sub-img img-4"></div>
          </div>
          <div class="desc">
            <h4>Задача</h4>
            <p>
              Обратился клиент, которому нужен был landing page. Заказчик четко обозначил главную цель вебсайта -
              конвертировать посетителей в покупателей. Поэтому было принято решение создать много форм - собрать
              заявки. Работа проходила в следующем формате: прототип - удтверждение, дизайн - удтверждение, верстка -
              удтверждение, правки. В итоге клиент получил рабочий сайт, с версией для мобильных устроиств и
              яндекс.метрикой
            </p>
            <div class="attr">
              <div class="attr-item">
                <span>Сроки</span>
                <p>2 недели</p>
              </div>
              <div class="attr-item">
                <span>Стоимость</span>
                <p>12 000 рублей</p>
              </div>
            </div>
          </div>
          <div class="btn-wrap">
            <a href="portfolio/Eddis-car/" target="_blank" class="button button-o">Перейти на сайт</a>
            <a href="" class="button button-o offer">Хочу такой же</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="faq" id="faq">
    <div class="container">
      <div class="row">
        <div class="faq-item">
          <h3>Почему именно сейчас?</h3>
          <div class="answer">
            <p>Если вы сейчас думаете о том стоит ли инвестировать в интернет-продвижение то однозначно стоит, на то
              есть несколько причин. Прямо сейчас в интернете потенциальные клиенты ищут именно ваши услуги, глупо
              отказываться от прибыли. Все может быть сделанно удаленно, даже если вы в отпуске, в самые сжатые сроки. С
              нуля до результата, без посредников и непонятных дополнительных услуг.</p>
            <span>Пока вы будете ждать и сомневаться, терять прибыль, ваши конкуренты могут занять ваше место.</span>
          </div>
        </div>
        <div class="faq-item">
          <h3>Что дает сотрудничество?</h3>
          <div class="answer">
            <p>В итоге вы получите решние проблемы, в зависимости от ваших потребностей. Если у вас сжатые сроки или
              ограничен бюджет - это не беда, создание сайта до 72 часов и за несколько тысяч рублей тоже возможно. Если
              бюджет формируется, подскажем во что стоит вложиться, а на чем можно сэкономить.</p>
            <span>Вы уйдете с идеальным и работающим решением именно для вашего дела, которое будет приносить
              доход.</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="faq-item">
          <h3>Веб студия сделает лучше?</h3>
          <div class="answer">
            <p>Окей, вам нужен специалист. Так почему бы не обратиться в веб-студию? Самое важное в этом вопросе - это
              цена. Так как веб-студия должна арендовать офис и держать много сотрудников - цены могут быть в 3-4 раза
              выше, при примерно том же уровне качества. Но у этого варианта тоже есть плюсы, например, если вы хотите
              заказать интернет-магазин или портал то вам стоит обратиться именно туда. В случае же с относительно
              простыми сайтами смысла пререплачивать просто нет.</p>
            <span>Если вы хотите переплатить или сайт слишком сложный - веб-студия ваш выбор.</span>
          </div>
        </div>
        <div class="faq-item">
          <h3>Может сделать на конструкторе?</h3>
          <div class="answer">
            <p>Если у вас ограничен бюджет или вы не хотите тратить деньги вовсе, если у вас ограничены сроки может
              встать вопрос о создании сайта на конструкторе. В некоторых случаях создание сайта на конструкторе вполне
              себе оправдано. Этот метод позволяет относительно быстро и без особых усилий и знаний создать рабочий
              сайт. Проблемы появляются потом - если вы хотите поменять номер телефона, начать продвижение или если у
              пользователя другой размер экрана.</p>
            <span>Но из за простоты вы все так же можете заказать сайт на конструкторе всего за 2-3 тысячи, не изучая
              весь конструктор</span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="feedback" id="feedback">
    <div class="container feedback-container">
      <h1>Свяжитесь со мной</h1>
      <div class="discount">
        <h2 class="first-h2">Только для тех кто дочитал до конца действет специальное предложение</h2>
        <div class="clocker"></div>
        <h2 class="second-h2">Оставите заявку в течение 24 часов и получите бонусы</h2>
        <div class="row-wrap">
          <div class="row">
            <span>- SSL сертификат</span>
            <p>- доверие к вашему сайту будет выше, благодаря надежному сертификату</p>
          </div>
          <div class="row">
            <span>- Админ-панель</span>
            <p>- Вам не нужно будет звать специалиста и деньги, прося поменять телефон</p>
          </div>
          <div class="row">
            <span>- Установка на хостинг</span>
            <p>- вам не нужно мучаться и разбираться в том, как “собрать” сайт</p>
          </div>
          <div class="row lastrow">
            <span>- Поддержка в течении 3х месяцев</span>
            <p>- Если вы найдете ошибку на сайте в течении трех месяцев - заменим бесплатно</p>
          </div>
        </div>
      </div>
      <div class="contacts">
        <div class="phone">
          <i class="fas fa-phone-alt"></i>
          <a href="tel:+79003604026">+79003604026</a>
        </div>
        <div class="socials">
          <a href="https://wa.me/79003604026" target="_blank">
            <div class="social-item whatsapp">
              <i class="fab fa-whatsapp"></i>
              <span>w.me/79003604026</span>
            </div>
          </a>
          <a href="https://t.me/kalispeller" target="_blank">
            <div class="social-item telegram">
              <i class="fab fa-telegram-plane"></i>
              <span>t.me/kalispeller</span>
            </div>
          </a>
          <a href="viber://chat?number=+79003604026" target="_blank">
            <div class="social-item viber">
              <i class="fab fa-viber"></i>
              <span>viber/79003604026</span>
            </div>
          </a>
        </div>
      </div>
      <form action="mail.php" method="POST">
        <legend>Чего вы ждете?</legend>
        <input type="text" placeholder="Как к вам обрщаться? *" required name="user_name">
        <input type="email" placeholder="Введите email *" required name="user_email">
        <input type="phone" placeholder="Номер телефона (по желанию)" name="user_phone">
        <textarea cols="30" rows="10" placeholder="Опишите проблему" name="user_problem" wrap="hard"></textarea>
        <button type="submit" style="position: absolute">Отправить заявку</button>
      </form>
    </div>
  </section>

  <link rel="stylesheet" href="/css/flipclock.css">
  <link rel="stylesheet" href="/css/main.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-1.2.1.min.js"></script>
  <script src="js/jquery.vide.min.js"></script>
  <script src="js/jquery.maskedinput.min.js"></script>
  <script>
    window.replainSettings = {
      id: '532e3ea4-06c7-4141-865a-3f9adc3098e1'
    };
    (function(u) {
      var s = document.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      s.src = u;
      var x = document.getElementsByTagName('script')[0];
      x.parentNode.insertBefore(s, x);
    })('https://widget.replain.cc/dist/client.js');
  </script>
  <script src="js/flipclock.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>