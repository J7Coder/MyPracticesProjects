<?php
require('validarRut.php');
class UserValidator {
   private $data;
   private $errors = [];
   private static $fields = ['user', 'psw','message'];
 
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
     $this->validarPassword();
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
            $this->addError('message', 'Usuario no encontrado');
           }
        }
     }
   }
 
   private function validarPassword(){
 
     $val = trim($this->data['psw']);
 
     if(empty($val)){
       $this->addError('psw', 'Campo requerido');
     } 
     
 
   }
 
   private function addError($key, $error){
     $this->errors[$key] = $error;
   }
 
}
 