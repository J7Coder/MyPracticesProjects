<?php

include '../../conexion.php';
if(isset($_GET)){
   $rut=$_GET['Rut'];
      //buscar Trabajadores
   $sql="select * from trabajadores where Rut=?";
   $_result= $pdo-> prepare($sql);
   $_result->execute(array($rut));
   $res_=$_result->fetchAll();
   echo json_encode($res_);
}
else {
   $sql="select * from trabajadores";
   $_result= $pdo-> prepare($sql);
   $_result->execute();
   $res_=$_result->fetchAll();
   echo json_encode($res_);
}

  

  

