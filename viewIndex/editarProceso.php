<?php
include "conexion.php";

//capturar id por metodo get
if($_GET){
    $id=$_GET["id"];
    $sql="select * from procesos where Id=?";
    $_result= $pdo-> prepare($sql);
    $_result->execute(array($id));
    $values=$_result->fetchAll();

    foreach($values as $valor){
        $foto=$valor["foto"];
    }
}

    Global $success;
if(isset($_POST["editarProceso"])){
    $nombre=$_POST["proceso"];
    $meta=$_POST["meta"];
    $precio=$_POST["precio"];
    $url=$_POST["foto"];
    
   
    
    if($url==""){
       $url=$foto;
        $sql_edit='update procesos set Nombre=?,Meta=?,Precio=?,foto=? where Id=?';
        $editar=$pdo->prepare($sql_edit);
    }else{
        $sql_edit='update procesos set Nombre=?,Meta=?,Precio=?,foto=? where Id=?';
        $editar=$pdo->prepare($sql_edit);
    }

    $editar->execute(array($nombre,$meta,$precio,$url,$id));
    if($editar){
        $success="Los cambios han sido guardados correctamente!";
    }
    //header('location:procesoIndex.php');
    
}