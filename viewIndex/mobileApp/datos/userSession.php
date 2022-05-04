<?php       
class User_session{
    private $data;
    private $datos;
    public function __construct($post_data){
      $this->data = $post_data;
    }
    public function validar_session(){
        include '../../conexion.php';  
        $_SESSION["user"] ='';
            $_SESSION["admin"]='';
        $Usuario=$this->data["user"];
        $sql="select * from trabajadores where Rut=?";
        $_result= $pdo-> prepare($sql);
        $_result->execute(array($Usuario));
        $_User=$_result->fetchAll();
       
        foreach($_User as $_User_){
            $_SESSION["user"] =$_User_['Rut'];
            if($_User_['Tipo']==='admin'){
                $_SESSION['admin']=$_User_['Tipo'];
            }
            
        }
        if($_SESSION["user"]===$Usuario || $_SESSION["admin"]){
            return true;
        }else{
            return false;
        }
        
    }

}

   
    
