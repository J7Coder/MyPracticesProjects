    
    <?php

        session_start();
        include "datos.php";
        if(!$_SESSION['user'] && !$_SESSION['password']){
            header('location:../loginDesign/login.php');
        }
    ?>
    
    
    
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado de grupos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
 
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .btn-primary:hover{
          opacity: .6;
        }
        .btn-primary{
            height:40px;
            width:100px;
        }
        .btnCambiar{
            height:40px;
            width:160px;
        }
        .card-header{
            height:86px;
        }
        .H1{
            margin-left:300px;
        }
        .right{
            margin-left:140px;
        }.rights{
            margin-left:100px;
        }
        .alert-info{
            width:60%;
        }
        .alert-info .close{
            font-size:16px;
        }
        .editor{
            width:60%;
            margin:auto;
            margin-top:20px;
        }.padings{
            padding-top:30px;
        }
        
    </style>

    </head>
    <body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <form class="form-inline" method="POST">
            <input class="form-control mr-sm-2 left key-word2" type="text" placeholder="Nombre del trabajador" name="keyWord">
            <button class="btn btn-success" type="submit" name="ver_grupos"  onclick="return validarBuscarDos()">Buscar</button
        </form>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link right" href="../menuPrincipal/index.php">Home</a>
            </li>

            <li class="nav-item">
            <a class="nav-link rights" href="verGrupos.php">Ver todos</a>
            </li>

            <li class="nav-item">
            <a class="nav-link rights" href="datosIndex.php">Editar grupos</a>
            </li>
        </ul>
    </nav>
        <?php 
            if(!$mensaje==""){
                echo "<div class='alert alert-info alert-dismissible fixed-top'>
                <button type='button' class='close' data-dismiss='alert'><strong>Ok</strong></button>
                $mensaje
                </div>";
            } 
        ?>
    <div class="container my-5 padings">
        <section class="row">
            <?php foreach($resultado as $datos): ?>
            <article class="col-12 col-md-6 col-lg-3 mb-3">
            
                    <div class="card-header bg-<?php echo htmlspecialChars($datos["alert"]);?> text-white text-center"><b>Proceso:</b> 
                        <?php echo htmlspecialChars($datos["Proceso"]).'<br>';?> 
                    </div>
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <?php echo htmlspecialChars($datos["T_1"]).'<br>';?>
                            <?php echo htmlspecialChars($datos["T_2"]).'<br>';?>
                            <?php echo htmlspecialChars($datos["T_3"]).'<br>';?>
                            <?php echo htmlspecialChars($datos["T_4"]).'<br>';?>
                        </div>
                    </div> 
            
            </article>
            <?php endforeach ?>
        </section>
    </div>
    <script src="app.js"></script>
    </body>
    </html>
    
   