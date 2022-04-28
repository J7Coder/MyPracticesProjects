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

   //function para validar rut

   private function validarRut($rut){
      $rut = preg_replace('/[^k0-9]/i', '', $rut);
      $dv  = substr($rut, -1);
      $numero = substr($rut, 0, strlen($rut)-1);
      $i = 2;
      $suma = 0;
      foreach(array_reverse(str_split($numero)) as $v)
      {
         if($i==8)
               $i = 2;

         $suma += $v * $i;
         ++$i;
      }

      $dvr = 11 - ($suma % 11);
      
      if($dvr == 11)
         $dvr = 0;
      if($dvr == 10)
         $dvr = 'K';

      if($dvr == strtoupper($dv))
         return true;
      else
         return false;

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
 