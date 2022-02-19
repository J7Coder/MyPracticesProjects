<?php
if($_GET){
    include "conexion.php";
    $id=$_GET["id"];
    $sql="delete from procesos where Id=?";
    $_result= $pdo-> prepare($sql);
    $_result->execute(array($id));
    header("location:procesoIndex.php");
}