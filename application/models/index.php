<?php

 class Index_Model extends Model{
  
  function __construct() {
    parent::__construct();   
    }   
     
    public function ProcessReq($data) {
        $exists = $this->checkUserExists($data);
        if ($exists) {
          $returnData = array('id'=>$exists[0]['_Fb_Id_'], 'img'=>$exists[0]['_Gen_Img_'], 'eml'=>$exists[0]['_Eml_']);  
          return '{"status": 1, "msg": "'.json_encode($returnData).'"}';
        }
        
        $db = $this->db;
        $time = time();
        $id = md5($data['eml'] . rand(121, 1021) . '#$dfr');
        if ($db->exec("INSERT INTO _table_app_user VALUES('$id', " . $db->quote($data['id']) . ", " . $db->quote($data['name']) . ",
                                                         " . $db->quote($data['eml']) . "," . $db->quote($data['prfimg']) . ", '',
                                                         " . $db->quote($data['sex']) . "," . $db->quote($data['age']) . ", '$time')")) {
         
         $genImg = $this->genrateImage($data);   
         if($genImg){
           $this->updateImageInDB($genImg, $data['id']);
           $retrnData = array('id'=>$data['id'], 'img'=>$genImg);
           return '{"status": 1, "msg": "'.json_encode($retrnData).'"}';
         }  
         else {
           return '{"status": 0, "msg": "Somthing went wring please try again"}';
         }
        } else {
            return '{"status": 0, "msg": "Somthing went wring please try again"}';
        }
    }

    public function checkUserExists($data){
        $db = $this->db;
        $tmp = $db->query("SELECT _Fb_Id_, _Eml_, _Gen_Img_ FROM _table_app_user WHERE _Fb_Id_ = ".$db->quote($data['id']));
        $res = $tmp->fetchAll(PDO::FETCH_ASSOC);
        if($res){
          return $res;
        }
        else{
          return false;  
        }
    }
    
    public function genrateImage($data){
        
        $rImg = imagecreatefrompng(DAMBO."/screen.png");
        $prf = imagecreatefromjpeg($data['prfimg']);

        imagecopymerge($rImg, $prf, 826, 36, 0, 0, 50, 50, 100);

        //Definir color
        $black = imagecolorallocate($rImg, 0, 0, 0);
        $blue = imagecolorallocate($rImg, 26, 9, 178);

        //define fonts
        //imagestring($rImg, 5, 126, 22, 'kondal', $cor);
        $fontname = APP_PUBLIC.'/fonts/maiandra.ttf';
        $arialfont = APP_PUBLIC.'/fonts/arial.ttf';
        
        //Define data
        $name = $data['name'];
        $email = $data['eml'];
        
        
        //search box text
        imagettftext($rImg, 16, 0, 186, 70, $cor, $fontname, $name);

        //did you mean text
        $underLineText = $name;
        imagettftext($rImg, 18, 0, 288, 157, $blue, $fontname, $underLineText);
        $txtLen = strlen($underLineText);
        $underline = NULL;
        for($i= $txtLen/4; $i<$txtLen; $i++){
          $underline .= '_';  
        };
        imagettftext($rImg, 24, 0, 288, 153, $blue, $fontname, $underline);

        //search result text
        imagettftext($rImg, 16, 0, 110, 220, $blue, $fontname, $name);
        imagettftext($rImg, 21, 0, 110, 217, $blue, $fontname, $underline);

        //about text
        $aboutText = "I like to make jokes; "
                . "I consider myself a funny person. I just think making jokes about people who are in a situation beyond their control is not funny to them or their families."
                . "I consider myself a funny person. I just think making jokes about people who are in a situation beyond their control is not funny to them or their families.";
        $aboutText = wordwrap($aboutText, 80, "\n");
        imagettftext($rImg, 14, 0, 110, 250, $black, $arialfont, $aboutText);


        //find him at text
        imagettftext($rImg, 17, 0, 255, 396, $blue, $fontname, $email);


        $username = explode('@', $data['eml']);
        $imagePath = APP_PUBLIC.'/images/';
        $imageName = $username[0].'_G_SAYS.png';

        //Header e output
        header('Content-type: image/png');
        $save = imagepng($rImg, $imagePath.$imageName, 9);
        if($save){
          return $imageName;  
        } 
        else {
          return false;
        }         
    }
    
    public function updateImageInDB($image, $id){
       $db = $this->db;
       $tmp = $db->exec("UPDATE _table_app_user SET _Gen_Img_ = ".$db->quote($image)." WHERE _Fb_Id_ = ".$db->quote($image));
    }
}
