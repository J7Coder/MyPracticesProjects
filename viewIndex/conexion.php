<?php
$cadena='mysql:host=localhost;dbname=proyecto_abcpack';
$_usuario='root';
$_password='';

try
{
    $pdo=new PDO($cadena,$_usuario,$_password);
    //echo 'Conexion is activated!!'.'<br/>';


} catch (PDOException $e) 
{
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
