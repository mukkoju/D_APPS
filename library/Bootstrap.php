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
    case 'prcs':
      require APP_PATH . '/models/index.php';
      echo (new Index_Model())->ProcessReq($_POST);
      break;
    }
  }
}  

