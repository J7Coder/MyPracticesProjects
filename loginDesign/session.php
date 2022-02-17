<?php
session_start();
global $message_session;

    $_SESSION["user"] = "admin";
    $_SESSION["pass"] = "adminuser";
    $Usuario=$_GET["user"];
    $Password=$_GET["password"];
    if($_SESSION["user"]==$Usuario&& $_SESSION["pass"]==$Password){
        header("location: ../menuPrincipal/index.php");
    }else{
        $message_session="Usuario o contraseña es incorrecta";
        header("location:sessionCerrar.php");
    }


