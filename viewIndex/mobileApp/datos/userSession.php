<?php    
include '../../conexion.php';     
class User_session{
    private $data;
  
    public function __construct($post_data){
      $this->data = $post_data;
    }
    public function validar_session(){
        $_SESSION["user"] = '26448070-1';
        $_SESSION["pass"] ='1234';
        $Usuario=$this->data["user"];
        $Password=$this->data["psw"];
        
        if($_SESSION["user"]===$Usuario && $_SESSION["pass"]===$Password){
            return true;
        }else{
            return false;
        }
        
    }

}

   
    
