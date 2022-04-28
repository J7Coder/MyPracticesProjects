<?php
include '../../conexion.php';

//configurar cuenta
global $_error;
global $_success;
$_error='';
$_success='';
if(isset($_POST['btn_configurar'])){
   $rut=$_POST['rut'];
   $pass_=$_POST['pass'];
 
      //buscar Trabajadores
   $sql="select * from trabajadores where Rut=?";
   $_result= $pdo-> prepare($sql);
   $_result->execute(array($rut));
   $res_=$_result->rowCount();
   if($res_>0){
      
      $estado='0';
      $sql="insert into usuarios (Usuario, Password, Estado) values(?, ?, ?)";
      $query=$pdo->prepare($sql);
      //$result=$query->execute(array($rut,$pass_,$estado));
      if($result){
         $_success="Tu cuenta está configurada correctamente!!";
      }else{
         $_error="No pudimos configurar tu cuenta por favor vuelve a intentarlo de nuevo!";
      }
   }
   if($res_==0){
      $_error="El rut $rut no está asociado con ningun trabajador dentro de nuestro sistema por favor contacta la admistración!";
   }
   
   
}
     