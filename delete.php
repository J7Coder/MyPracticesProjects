<?php
include "conexion.php";

    $sql="delete from grupos";
    $_result= $pdo-> prepare($sql);
    $_result->execute();

      //Reiniciar id increment
      $sql2="alter table grupos auto_increment=1";
      //$_result2= $pdo-> prepare($sql2);
     //$_result2->execute();

    header("location:datosIndex.php");
