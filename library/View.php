<?php

class View {

    function __construct() {
    }
    
    public function render($file, $noRender = null){
        
        if($noRender){
            require APP_PATH.'/views/'.$file.'.php';
        }
        else{
            require APP_PATH.'/layout/header.php';
            require APP_PATH.'/views/'.$file.'.php';
            require APP_PATH.'/layout/footer.php';
        }
        
    }

}