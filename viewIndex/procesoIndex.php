<?php
    session_start();
    include "datos.php";
    include "editarProceso.php";

    if(!$_SESSION['user'] && !$_SESSION['password']){
        header('location:../loginDesign/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistema Abc Pack</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
            height:86px;
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
            margin-left:200px;
        }

        .alert-success{
            width:60%;
            margin:auto;
        }

        .alert-danger{
            width:60%;
            margin:auto;
        }

    </style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <form class="form-inline" method="POST" onsubmit="return validarBuscar()">
    <input class="form-control mr-sm-2 left key-word" type="text" placeholder="Nombre del proceso" name="keyWord">
    <button class="btn btn-success" type="submit" name="buscar">Buscar</button>
  </form>
  <ul class="navbar-nav">
     <li class="nav-item">
      <a class="nav-link right" href="../menuPrincipal/index.php">Home</a>
        </li>
    </ul>
</nav>
        <?php 
            if(!$message==""){
                echo "<div class='alert alert-info alert-dismissible fixed-top'>
                <button type='button' class='close' data-dismiss='alert'><strong>Ok</strong></button>
                $message
                </div>";
            }
        ?>
        
        <?php
            if(!$success==""){
                echo "<div class='alert alert-success alert-dismissible fixed-top'>
                $success
                <a href='procesoIndex.php' class='float-right'>Cerar</a>
                </div>";
            }
        
        ?>

<?php
            if(!$Succed==""){
                echo "<div class='alert alert-success alert-dismissible fixed-top'>
                $Succed
                <a href='procesoIndex.php' class='float-right'>Cerar</a>
                </div>";
            }
        
        ?>

        <?php

            if(!$err_proceso==""){
                echo "<div class='alert alert-danger alert-dismissible fixed-top editor'>
                $err_proceso
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                </div>";
            }  
        ?>
<div class="container-fluid bg-light pt-5">
    <div class="container">
    <h2 class="text-primary  H1">Procesos</h2>
        <div class="row">
            
            <div class="col-md-4">
                <?php foreach($Procesos as $proceso): ?>
                
                <div class="card mb-4" style="width:400px">
                    <div class="editor">  
                        <a href="procesoIndex.php?id= <?php echo htmlspecialChars($proceso["Id"]);?>" class="editar">Editar</a>
                        <a href="eliminarProceso.php?id= <?php echo htmlspecialChars($proceso["Id"]);?>" class="editar" onclick=" return eliminarProceso()">Eliminar</a>  
                    </div>
                    <div class="text-center pt-2"><h4 class="ml-5"><?php echo htmlspecialChars($proceso["Nombre"]);?></h4></div>
                    <div class="text-center mt-2"> <img class="card-img-top img-thumbnail w-75" src="<?php echo htmlspecialChars($proceso["foto"]);?>" alt="Sin Imagen" style="width:100%"></div>
                    
                    <div class="card-body">
                        <div>
                        <b class="ml-5">Meta:</b><?php echo htmlspecialChars($proceso["Meta"]).'<br>';?>
                        <b class="ml-5">Precio:</b><?php echo htmlspecialChars($proceso["Precio"]);?>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
          
        </div>
    </div>
</div>
<div class="fixed-top" style="margin-left:650px; height:80%; margin-top:120px; background:#fff">

    <div class="col-md-8"">
            <?php if(!$_GET): ?>
         <h2 class="display-6 ml-5 text-primary">Agregar Procesos</h2>
                <div class="mb-3 mt-2 text-center"><small class="text-danger" id="errors"></small></div>
                <form method="POST" name="myForm" onsubmit="return validarProceso()" id="formCrearProcesos">
                    <input type="text" name="proceso" placeHolder="Ingresa el Nombre del Proceso" class="form-control ml-3 mb-3" id="procesos">
                   
                    <input type="text" name="meta" placeHolder="Ingresa la meta del Proceso" class="form-control ml-3 mb-3" id="metas">
                   
                    <input type="text" name="precio" placeHolder="Ingresa el precio extra" class="form-control ml-3 mb-3" id="precios">

                    <input type="text" name="url" placeHolder="Ingresa la url de la imagen del proceso" class="form-control ml-3 mb-3" id="urls">
                
                    <button class="btn btn-primary ml-5 pb-4 pt-1 mb-3" type="submit" name="btnProceso">Guardar proceso</button>
                   
                </form>
                <?php endif?>
    </div>
    
   
    <div class="col-md-8"">
            <?php if($_GET): ?>
            <?php foreach($values as $proceso){} ?>
            <h2 class="display-6 ml-5 text-primary">Editar Procesos</h2>
            <div class="mb-3 mt-2 text-center"><small class="text-danger" id="errors2"></small></div>
                <form method="POST" name="myForm" onsubmit="return editarProcesos()" id="formEditarProcesos">
                    <input type="text" name="proceso" placeHolder="Ingresa el Nombre del Proceso" class="form-control ml-3 mb-3" id="eProceso" value="<?php echo htmlspecialChars($proceso["Nombre"]);?>">
                   
                    <input type="text" name="meta" placeHolder="Ingresa la meta del Proceso" class="form-control ml-3 mb-3" id="eMeta" value="<?php echo htmlspecialChars($proceso["Meta"]);?>">
                   
                    <input type="text" name="precio" placeHolder="Ingresa el precio extra" class="form-control ml-3 mb-3" id="ePrecio" value="<?php echo htmlspecialChars($proceso["Precio"]);?>">

                    <input type="text" name="foto" placeHolder="Ingresa la url de la imagen del proceso" class="form-control ml-3 mb-3" id="eUrl" value="<?php echo htmlspecialChars($proceso["foto"]);?>">
                   
                  
                    <button class="btn btn-primary ml-5 pb-4 pt-1 mb-3" type="submit" name="editarProceso" >Guardar Cambio</button>
                    <button class="btn btn-primary ml-5 pb-4 pt-1 mb-3"name="btnCancelar"><a class="cancelar" href="procesoIndex.php" onclick="return validarCancelar()">Cancelar</a></button>
                </form>
            
            <?php endif ?>
                
    </div>
</div>





<script src="app.js"></script>
</body>
</html>
