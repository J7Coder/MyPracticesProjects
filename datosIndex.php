<?php

    session_start();
    include "datos.php";
    if(!$_SESSION['user'] && !$_SESSION['password']){
        header('location:loginDesign/login.php');
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
            margin-left:200px;
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
        }
        
    </style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <form class="form-inline" method="POST">
    <input class="form-control mr-sm-2 left key-word2" type="text" placeholder="Nombre del trabajador" name="keyWord">
    <button class="btn btn-success" type="submit" name="buscar_grupo"  onclick="return validarBuscarDos()">Buscar</button
  </form>
    <ul class="navbar-nav">
     <li class="nav-item">
      <a class="nav-link right" href="menuPrincipal/index.php">Home</a>
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
            if(!$editor==""){
                echo "<div class='alert alert-success alert-dismissible fixed-top editor'>
                $editor
                <a href='datosIndex.php' class='float-right'>Cerar</a>
                </div>";
            }
            if(!$Exito==""){
                echo "<div class='alert alert-success alert-dismissible fixed-top editor'>
                $Exito
                <a href='datosIndex.php' class='float-right'>Cerar</a>
                </div>";
            }  
            
            
            if(!$err_trabajador==""){
                echo "<div class='alert alert-danger alert-dismissible fixed-top editor'>
                $err_trabajador
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                </div>";
            }  
        ?>

        
           
        
        

<div class="container-fluid bg-light pt-5">
    <div class="container">
   
        <div class="row">
            <div class="col-md-6 mt-5">
                <?php foreach($resultado as $datos): ?>
                <div class="card mb-3">
                    <div class="card-header bg-<?php echo $datos["alert"];?> text-white"><b>Proceso:</b> <?php echo htmlspecialChars($datos["Proceso"]).'<br>';?>
                        <div ><b>Bodega: </b><?php echo htmlspecialChars($datos["Bodega"]).'<br>';?>
                        <a href="eliminar.php?id= <?php echo htmlspecialChars($datos["Id"]);?>" class="float-right text-white ml-3" onclick="return validarDelete()"><i class="far fa-trash-alt"></i></a>
                        </div>
                        <a href="datosIndex.php?id= <?php echo htmlspecialChars($datos["Id"]);?>" class="float-right text-white"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                    
                   <div class="text-dark pl-2 pb-2 card-body mb-3"><?php echo htmlspecialChars($datos["T_1"]).'<br>';?>
                        <?php echo htmlspecialChars($datos["T_2"]).'<br>';?>
                        <?php echo htmlspecialChars($datos["T_3"]).'<br>';?>
                        <?php echo htmlspecialChars($datos["T_4"]).'<br>';?>
                    
                    </div>
                    
                </div>
                <?php endforeach ?>
            </div>
          
        </div>
    </div>
</div>
<div class="fixed-top" style="margin-left:680px; margin-top:55px">

    <div class="col-md-8"">
            <?php if(!$_GET): ?>
         <h2 class="display-6 ml-5 text-primary">Crear Grupos</h2>
                <div class="mb-3 mt-2 text-center"><small class="text-danger" id="error"></small></div>
                <form method="POST" id="formCrearGrupos" >
                   <div class="form-group">
                        <select class="form-control" name="proceso" id="proceso">
                            <option>Selecciona un proceso</option>
                            <?php foreach($Procesos as $proceso){
                                echo "<option>".htmlspecialChars($proceso["Nombre"])."</option>";
                            }?>
                        </select>
                   </div>
                    <input type="text" name="bodega" placeHolder="Ingresa la bodega" class="form-control mb-3" id="bodega">
                   
                  <div class="form-group">
                        <select class="form-control" name="t_1" id="t1">
                            <option>Selecciona un trabajador</option>
                            <?php foreach($Trabajadores as $trabajador){
                                echo "<option>".htmlspecialChars($trabajador["Nombre"])." ".htmlspecialChars($trabajador["Apellido"])."</option>";
                            }?>
                        </select>
                  </div>
                  <div class="form-group">
                        <select class="form-control" name="t_2" id="t2">
                        <option>Selecciona un trabajador</option>
                            <?php foreach($Trabajadores as $trabajador){
                                echo "<option>".htmlspecialChars($trabajador["Nombre"])." ".htmlspecialChars($trabajador["Apellido"])."</option>";
                            }?>
                        </select>
                  </div>
                  <div class="form-group">
                        <select class="form-control" name="t_3" id="t3">
                        <option>Selecciona un trabajador</option>
                            <?php foreach($Trabajadores as $trabajador){
                                echo "<option>".htmlspecialChars($trabajador["Nombre"])." ".htmlspecialChars($trabajador["Apellido"])."</option>";
                            }?>
                        </select>
                  </div>
                  <div class="form-group">
                        <select class="form-control" name="t_4" id="t4">
                        <option>Selecciona un trabajador</option>
                            <?php foreach($Trabajadores as $trabajador){
                                echo "<option>".htmlspecialChars($trabajador["Nombre"])." ".htmlspecialChars($trabajador["Apellido"])."</option>";
                            }?>
                        </select>
                  </div>
                    <div class="form-group">
                        <select class="form-control" name="color" id="color">
                            <option>Elige un color</option>
                            <option>Verde</option>
                            <option>Azul</option>
                            <option>Amarillo</option>
                            <option>Rojo</option>
                            <option>Gris</option>
                            
                        </select>
                    </div>
                    <button class="btn btn-primary ml-5 pb-4 pt-1" type="submit" name="btn" onclick="return validarForm()">Crear</button>
                    <a href="delete.php" class="float-right" onclick="return validarEliminar()">Eliminar todos</a>
                </form>
                <?php endif?>
    </div>
    
   
    <div class="col-md-8"">
            <?php if($_GET): ?>
                <?php foreach($valores as $datos){} ?>
            <h2 class="display-6 ml-5 text-primary">Editar Grupos</h2>
                <div class="mb-3 mt-2 text-center"><small class="text-danger" id="error2"></small></div>
                <form method="POST" name="myForm" id="formEditarGrupos">
                   <div class="form-group">
                   <input type="text" id="process"name="proceso"  class="form-control mb-3" value="<?php echo htmlspecialChars($datos["Proceso"]);?>">
                   
                   </div>
                    <input type="text" id="bodega2"name="bodega" class="form-control mb-3" value="<?php echo htmlspecialChars($datos["Bodega"]);?>">
                   
                  <div class="form-group">
                  <input type="text" id="tb1"name="t_1"  class="form-control mb-3" value="<?php echo htmlspecialChars($datos["T_1"]);?>">
                  </div>
                  <div class="form-group">
                  <input type="text" id="tb2"name="t_2"  class="form-control mb-3" value="<?php echo htmlspecialChars($datos["T_2"]);?>">
                  </div>
                  <div class="form-group">
                  <input type="text" id="tb3"name="t_3"  class="form-control mb-3" value="<?php echo htmlspecialChars($datos["T_3"]);?>">
                  </div>
                  <div class="form-group">
                  <input type="text" id="tb4"name="t_4"  class="form-control mb-3" value="<?php echo htmlspecialChars($datos["T_4"]);?>">
                  </div>
    
                    <button class="btn btn-primary btnCambiar ml-5 pb-4 pt-1" type="submit" name="btn_editar" onclick="return validarEditar()" >Guardar Cambios</button>
                    <a href="datosIndex.php" class="float-right" onclick="return validarCancelar()">Cancelar</a>
                    
                </form>
                <?php endif ?>
                
    </div>
</div>



<script src="app.js"></script>
</body>
</html>
