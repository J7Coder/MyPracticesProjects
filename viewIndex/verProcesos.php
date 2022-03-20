<?php
    session_start();
    include "datos.php";
    include "editarProceso.php";

    if(!$_SESSION['user'] && !$_SESSION['password']){
        header('location:../loginDesign/login.php');
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesos</title>
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
            width:150px;
        }
        .card-header{
            height:260px;
        }
        .H1{
            margin-left:140px;
            margin-top:50px
        }
        .float-right{
            margin-left:400px;
            
           
        }.left{
            margin-left:200px;
        }.home{
            font-size:30px;
        }.editor{
            display:flex;
            justify-content:space-around;
            font-size:22px;
        }.pt-2{
            height: 35px;
        }
        .cancelar{
            color:white;
            
        }
        .cancelar:hover{
            color:white;
            text-decoration:none;
        }
        .alert-info{
            width:60%;
        }
        .alert-info .close{
            font-size:16px;
        }
        .right{
            margin-left:140px;
        }
        .rights{
            margin-left:100px;
        }

        .alert-success{
            width:60%;
            margin:auto;
        }

        .alert-danger{
            width:60%;
            margin:auto;
        }
        .padings{
            padding-top:30px;
        }
    </style>

</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <form class="form-inline" method="POST" onsubmit="return validarBuscar()">
            <input class="form-control mr-sm-2 left key-word" type="text" placeholder="Nombre del proceso" name="keyWord">
            <button class="btn btn-success" type="submit" name="ver_procesos">Buscar</button>
        </form>
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link right" href="../menuPrincipal/index.php">Home</a>
            </li>

            <li class="nav-item">
            <a class="nav-link rights" href="verProcesos.php">Ver Todos</a>
            </li>

            <li class="nav-item">
            <a class="nav-link rights" href="procesoIndex.php">Editar procesos</a>
            </li>
        </ul>
    </nav>
            //mensage de busqueda de procesos
       <?php 
            if(!$message==""){
                echo "<div class='alert alert-info alert-dismissible fixed-top'>
                <button type='button' class='close' data-dismiss='alert'><strong>Ok</strong></button>
                $message
                </div>";
            }
        ?>

            //Datos de los procesos
        <div class="container my-5 padings">
                <section class="row">
                    <?php foreach($Procesos as $proceso): ?>
                    <article class="col-12 col-md-6 col-lg-4">
                        <div class="card-header my-1">
                             <img  class="card-img-top" src="<?php echo htmlspecialChars($proceso["foto"]);?>" alt="Sin Imagen" style="width:100%">
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title text-primary lead text-center"> <?php echo htmlspecialChars($proceso["Nombre"]);?></h5>
                                <b >Meta:</b><?php echo htmlspecialChars($proceso["Meta"]).'<br>';?></p>
                                <b class="ml-1">Precio:</b><?php echo htmlspecialChars($proceso["Precio"]);?></p>
                            </div>
                        </div> 
                    </article>
                    <?php endforeach ?>
                </section>
            </div>


    <script src="app.js"></script>
</body>
</html>