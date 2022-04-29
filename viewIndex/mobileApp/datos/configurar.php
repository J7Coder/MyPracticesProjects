<?php
include '../../conexion.php';
include 'rut_valide.php';
class AcountConfig{
   private $data;
   private $messages = [];
   private static $fields = ['rut', 'pass'];
 
   public function __construct($post_data){
     $this->data = $post_data;
   }
 
   public function validateFields(){
 
     foreach(self::$fields as $field){
       if(!array_key_exists($field, $this->data)){
         trigger_error("'$field' no está presente en los datos enviados");
         return;
       }
     }
 
     $this->addUser();
     return $this->messages;
 
   }

   private function addUser(){
      $rut = trim($this->data['rut']);
      $pass = trim($this->data['pass']);
    
      if(empty($rut)){
        $this->addMessage('failed', 'Debes ingresar un rut,vuelve a intentarlo!');
      } else{
         if(! _Helpers::validaRut($rut) ){
          $this->addMessage('failed', 'El rut no es valido, vuelve a intentarlo!');
         }else{
            if(! _Helpers::buscarUsuario($rut)){
             $this->addMessage('failed', "El rut: $rut no se encuentra dentro del sistema, contacta la administración");
            }
         }
      }

      if(empty($pass)){
         $this->addMessage('failed', 'Debes ingresar una contraseña, vuelve!');
      }

      if(!empty($rut) && !empty($pass)){
         if(_Helpers::validaRut($rut) && _Helpers::buscarUsuario($rut)){
            $estado='0';
            $sql="insert into usuarios (Usuario, Password, Estado) values(?, ?, ?)";
            $query=$pdo->prepare($sql);
            $result=$query->execute(array($rut,$pass,$estado));
            if($result){
               $this->addMessage('success', 'Tu cuenta ha sido configurada correctamente!');
            }else{
               $this->addMessage('failed', 'No pudimos configurar tu cuenta, por favor vuelve a intentarlo de nuevo');
            }
         }
      }
   }


   private function addMessage($key, $mes){
      $this->messages[$key] = $mes;
    }
}

     