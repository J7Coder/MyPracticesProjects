<?php
    session_start();

    if(!$_SESSION['user'] && !$_SESSION['password']){
        header('location: ../loginDesign/login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>

        *{
            margin:0;
            padding: 0;
           
        }
        body{
            background: #edf2fc;
        }
        .hero{
            height:100vh;
            width: 100%;
            background: #edf2fc;
            font-family: sans-serif;
            position: relative;

        }
        .logo{
            width:120px;
            cursor: pointer;

        }
        nav{
            width: 84%;
            margin: auto;
            padding: 20px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        nav ul li{
            display: inline-block;
            list-style: none;
            margin: 10px 20px;
        }
        nav ul li a{
            text-decoration: none;
            color:#7f96c5;
        }
        nav ul li a:hover{
            color:#ff4321;
        }
        .info{
            margin-left: 8%;
            margin-top: 15%;
        }
        .info h1{
            font-size:40px;
            color:#f88787;
            margin-bottom: 20px;
            margin-left: 20px;
        }
        .info a{
            background: #ff4321;
            height: 35px;
            padding: 10px 18px;
            text-decoration: none;
            color:#fff;
            display:inline-block;
            margin: 30px 0;
            border-radius: 5px;
        }.info a:hover{
            opacity: 0.3;
        }
        .img-box{
            margin-top:10px;
            width: 45%;
            height: 80%;
            position: absolute;
            bottom: 0;
            right: 100px;
        }
        .img-box img{
            height: 100%;
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            transition: bottom 1s,left 1s;
        }
        .img-box .main-img{
            width: 70%;
            height: 90%;
        }
        .img-box:hover .back-img{
            bottom: 40px;
        }
        .img-box:hover .main-img{
            left:54%;
        }

        .space{
                margin-left: 200px;
        }
    </style>
</head>
<body>
    <div class="hero mb-5">
        <nav class="navbar navbar-expand-sm">
            <img src="images/logo3.png" alt="" class="logo">
            <ul class="navbar-nav">
                <li class="nav-item dropdown space"> 
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Grupos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Crear Grupos</a>
                        <a class="dropdown-item" href="#">Ver Grupos</a>
                     </div>
                </li>

                <li class="nav-item dropdown"> 
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Procesos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Agregar Proceso</a>
                        <a class="dropdown-item" href="#">Ver Procesos</a>
                     </div>
                </li>

                <li class="nav-item dropdown"> 
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Trabajadores
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Agregar</a>
                        <a class="dropdown-item" href="#">Ver Listado</a>
                     </div>
                </li>

                <li class="nav-item dropdown"> 
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Informaciones
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Agregam Info</a>
                        <a class="dropdown-item" href="#">Editar Info</a>
                     </div>
                </li>
                
            </ul>
        </nav>
        <div class="info">
            <h1 class="welcome">¡Te damos la Bienvenida!</h1>
            <a href="../loginDesign/sessionCerrar.php" onclick="return cerrarSession()">Cerrar</a>
        </div>
        <div class="img-box">
            <img src="images/pattern.png" class="back-img">
            <img src="images/box1.png" class="main-img">
        </div>
    </div>

    <footer
          class="text-center text-lg-start text-dark"
          style="background: #edf2fc;"
          >
        <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 235, 0.2)"
         >
      © 2022 Copyright:
      <a class="text-dark" href="#"
         >J7Coder Design</a>
        
    </div>
    <!-- Copyright -->
  </footer>
    <script>
        function cerrarSession(){
            const responce=confirm("¿Quieres salir del sistema?");
            if(responce){
                return true;
            }
            return false;
        }
    </script>
</body>
</html>