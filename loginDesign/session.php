<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <style>

    .editor{
         width:60%;
        margin:auto;
        margin-top:20px;
        font-size:30px;
    }
  </style>
</head>
<body>
    <div class="container">
    <?php
    session_start();
        include '../viewIndex/conexion.php';
        //selecionar informaciones
        $_sql="select * from usuarios";
        $_infos= $pdo-> prepare($_sql);
        $_infos->execute();
        $_usuario=$_infos->fetchAll();

        foreach($_usuario as $user){};

    global $message_session;

        $_SESSION["user"] = $user['Usuario'];
        $_SESSION["pass"] = $user['Password'];
        $Usuario=$_GET["user"];
        $Password=$_GET["password"];
    
        if($_SESSION["user"]===$Usuario&& $_SESSION["pass"]===$Password){
            //header("location: ../menuPrincipal/index.php");
            echo "<script>window.location.href='../menuPrincipal/index.php';</script>";
            exit;
        }else{
            echo "<div class='alert alert-danger alert-dismissible fixed-top editor text-center'>
                Usuario o Contraseña incorrecta!
            <a href='sessionCerrar.php' class='float-right'>Cerrar</a>
            </div>";
            
        }

?>
    </div>  

        
</body>



    
    

  

