<?php
include "conexion.php";

global $edit_message;
global $error_edit;
if(isset($_POST['btn_editarInfo'])){
    $id=$_POST["id"];
    $des=$_POST['des'];
    $info=$_POST['info'];
    $sql='update informacion set Des=?,Info=? where Id=?';
    $editar=$pdo->prepare($sql);
    $editar->execute(array($des,$info,$id));

    if($editar){
        $edit_message="informaciones editadas correctamente!";
    }else{
        $error_edit="Error: no se puede editar las informaciones";
    }
}