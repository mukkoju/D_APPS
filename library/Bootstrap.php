<?php

class Bootstrap {
  
  function __construct() {
  $temp_url = strtolower(trim($_SERVER['REQUEST_URI'], '/'));
  $url = explode('/', $temp_url);
  
  if (empty($url[0])) {
    require APP_PATH . '/controllers/index.php';
    $controller = new Index();
    $controller->index();
  }
  switch ($url[0]) {
    case 'login':
      require APP_PATH . '/controllers/index.php';
      $controller = new Index();
      $controller->login();
      break;
      require APP_PATH . '/controllers/index.php';
      $controller = new Index();
      $controller->register();
    case 'register';
      break;
      require APP_PATH . '/controllers/index.php';
      $controller = new Index();
      $controller->post_add();
    case 'post-add':
      break;
      require APP_PATH . '/controllers/index.php';
      $controller = new Index();
      $controller->admin();
    case 'admin':
      break;
    }
  }
}  

