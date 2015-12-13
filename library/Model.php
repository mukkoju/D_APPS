<?php

class Model {

    function __construct() {
        if (ISLIVE == true) {
            $this->db = new PDO('mysql:host=mysql.cdsg3fcsjios.ap-southeast-1.rds.amazonaws.com:3306;dbname=dambo_database_apps', 'root', 'dambo');
        } else {
            $this->db = new PDO('mysql:host=localhost;dbname=dambo_database_apps', 'root', 'dambo');
        }
    }

}