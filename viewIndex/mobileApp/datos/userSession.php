<?php         
include '../../conexion.php';
session_start();
if(isset($_GET['btn_userLogin'])){
    $_SESSION["user"] = '26448070-1';
    $_SESSION["pass"] ='1234';
    $Usuario=$_GET["user"];
    $Password=$_GET["psw"];

    if($_SESSION["user"]===$Usuario && $_SESSION["pass"]===$Password){
        header("location: ../viewers/principal.php");
        
    }else{
        header("location: ../viewers/login.php");
    }
}


   
    
