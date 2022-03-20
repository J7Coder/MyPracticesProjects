<?php

include 'conexion.php';


//selecionar usuarios
$_sql="select * from usuarios";
$_result= $pdo-> prepare($_sql);
$_result->execute();
$_cuenta=$_result->fetchAll();

echo json_encode($_cuenta);
