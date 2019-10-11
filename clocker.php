<?php 
  
  require 'rb.php';
  require 'cookies.php';

  R::setup( 'mysql:host=127.0.0.1;dbname=test',
  'root', '' );


  $cookie_key = 'visited-cache';
  $ip = $_SERVER['REMOTE_ADDR'];
  $visited = R:: findOne('visited', 'ip = ?', array($ip));
  $cookied = CookieManager::stored($cookie_key);
  if (!$visited || !$cookied){
    //Create
    $time = time();
    $visited = R::dispense('visited');
    $visited -> visit = $time;
    $visited -> ip = $ip;
    R::store($visited);
    CookieManager::store($cookie_key, json_encode(array(
      'id' => $visited -> id,
      'visit' => $time
    )));
  } else {
    if ($visited) {
      $time = $visited['visit'];
      CookieManager::store($cookie_key, json_encode(array(
        'id' => $visited -> id,
        'visit' => $time
      )));
    } 
    else {
      $c = (array) json_decode(CookieManager::read($cookie_key), true);
      $time = $c['visit'];
      $visited = R::dispense('visited');
      $visited -> visit = $time;
      $visited -> ip = $ip;
      R::store($visited);
    }
  }
  echo $time;
?> 
