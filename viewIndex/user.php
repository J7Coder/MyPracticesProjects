<?php

class Session{
    private $data;
    private $datos;
    public function __construct($post_data){
      $this->data = $post_data;
    }
    public function sessionValidate(){
        include 'conexion.php';  
        $Usuario=$this->data["user"];
        $Password=$this->data["password"];
        $sql="select * from usuarios where Usuario=?";
        $_result= $pdo-> prepare($sql);
        $_result->execute(array($Usuario));
        $_User=$_result->fetchAll();
        
        if(!$_User){
           return 0;
        }
        if($_User){
            foreach($_User as $_User_){
                $_users=$_User_['Usuario'];
                $_pass=$_User_['Password'];
            }
            $verify_P= password_verify($Password,$_pass);

            if($_users===$Usuario && $verify_P){
                return 1;
            }else{
                return -1;
            }
    
        }
    }

}
    
























































































































































































































































































