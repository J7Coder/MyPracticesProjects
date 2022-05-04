<?php
require('validarRut.php');
class UserValidator {
   private $data;
   private $errors = [];
   private static $fields = ['user','message'];
 
   public function __construct($post_data){
     $this->data = $post_data;
   }
 
   public function validateForm(){
 
     foreach(self::$fields as $field){
       if(!array_key_exists($field, $this->data)){
         trigger_error("'$field' no está presente en los datos enviados");
         return;
       }
     }
 
     $this->validarUsuario();
     return $this->errors;
 
   }

  
   private function validarUsuario(){
 
     $rut = trim($this->data['user']);
 
     if(empty($rut)){
       $this->addError('user', 'Campo requerido');
     } else{
        if(! Helper::validaRut($rut) ){
         $this->addError('user', 'El rut no es valido');
        }else{
           if(! Helper::buscarUsuario($rut)){
            $this->addError('message', 'El rut ingresado no está registrado dentro del sistema, por favor contacta la administración');
           }
        }
     }
   }
 
 
   private function addError($key, $error){
     $this->errors[$key] = $error;
   }
 
}
 