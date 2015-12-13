<?php 
//Setting default time zone
date_default_timezone_set('Asia/Calcutta');

defined('APP_PATH') || define('APP_PATH', dirname(__FILE__).'/application');
defined('APP_PUBLIC') || define('APP_PUBLIC', dirname(__FILE__).'/public');
defined('DOMAIN') || define('DOMAIN', 'http://localhost:8894');

//Session stuff
if (!isset($_SESSION)){
  ini_set('session.cookie_lifetime', 60 * 60 * 24 * 7);
  ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 7);
  session_start();
}

require 'library/Bootstrap.php';
require 'library/Controller.php';
require 'library/View.php';
require 'library/Model.php';

$application = new Bootstrap();
?>