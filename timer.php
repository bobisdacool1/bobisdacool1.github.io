<?php
class visitData
{
  public static function time()
  {
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
    return $time;
  }
}
