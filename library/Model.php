<?php 
class Model{
  function __construct() {
       $this -> db = new PDO('mysql:host=localhost;dbname=TEST', 'root', 'dambo');
    }
}
?>