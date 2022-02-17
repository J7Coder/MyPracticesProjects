<?php
$cadena='mysql:host=localhost;dbname=courso_php';
$usuario='root';
$password='';

try
{
    $pdo=new PDO($cadena,$usuario,$password);
    /*echo 'Conexion is activated!!'.'<br/>';*/


} catch (PDOException $e) 
{
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
