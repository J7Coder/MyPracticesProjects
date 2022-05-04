<?php
	session_start();

  include '../datos/buscador.php';
  if(!$_SESSION['user']){
      header('location:login.php');
  }
  $nombre="";
  if(isset($_POST["btn_key"])){$nombre=$_POST["key_word"];}
  $buscador= new Buscador();
  $datos= $buscador->buscarGrupos();
  $message='';
  if($datos==0){
      $message=$nombre? "<b>$nombre </b> no se encuentra en ningun grupo" : "El trabajador buscado no se encuentra en ningun grupo";
      
  }
   
  

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesos</title>
    <script src="https://kit.fontawesome.com/78ef6b1762.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
            .avatar {
            border-radius: 50%;
            width: 200px;
        }
        .hero{
            margin-top: 80px;
        }
        .h1-title{
            width: 100%;
        }
        .bodega{
          margin-left:30px;
        }
      .link{
        position:absolute;
        right: 4;
      }
      .fixed-top{
        height:70px;
      }
      .link a{
        text-decoration:none;
      }
      .arrow{
        font-size:16px;
      }

      .float{
        position:absolute;
        right:16;
        font-size:25px;
    
      }

      .float-l{
        position:absolute;
        left:16;
        font-size:25px;
    
      }

      .titles{
        font-size:20px;
      }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark my-1 mx-2 rounded fixed-top">

  <div class="container-fluid">
    <a class="navbar-brand arrow" href="principal.php"><i class="fas fa-arrow-left"></i></a>
    <span class="text-white titles">Grupos</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
     
      <form class="d-flex mt-2 " action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input class="form-control me-2" type="text" placeholder="Ingresa un trabajador" name="key_word">
        <button class="btn btn-primary" type="submit" name="btn_key">Buscar</button>
      </form>
    </div>
  </div>
</nav>
    <div class="container hero">
          <?php 
            if(!$message==""){
                echo "<div class='alert alert-info alert-dismissible fixed-top text-center m-2'>
                <button type='button' class='link btn btn-outline-warning' data-dismiss='alert'><div><strong><a href='grupos.php'>OK</a></strong></div></button>
                $message
                </div>";
            } 
          ?>
    <?php if($datos):?>
        <?php foreach($datos as $grupos): ?>
          <div class="shadow-lg p-1 mb-5 bg-body rounded mt-5">

              <div class="text-white bg-<?php echo $grupos['alert']; ?> rounded h1-title">
                <?php if($_SESSION['admin']): ?>
    
                  <?php if($grupos['alert']==='danger'):?>
                    <a href="#" class="float-l text-white m-2"><i class="far fa-trash-alt"></i></a>
                  <?php endif?>

                  <?php if($grupos['alert']!=='danger'):?>
                    <a href="#" class="float-l text-danger m-2"><i class="far fa-trash-alt"></i></a>
                  <?php endif?>

                  <?php if($grupos['alert']==='danger'):?>
                    <a href="#" class=" float text-white m-2"><i class="fas fa-pencil-alt"></i></a>
                  <?php endif?>

                  <?php if($grupos['alert']!=='danger'):?>
                     <a href="#" class="float text-danger m-2"><i class="fas fa-pencil-alt"></i></a>
                  <?php endif?>

                <?php endif; ?>
              
                  <h1 class="title text-center p-1"><?php echo $grupos['Proceso']; ?><span class="bodega"><?php echo $grupos['Bodega']; ?></span></strong></h1>
              </div>

              <div class="info text-center">
                  <p class="workers text-secondary"><?php echo $grupos['T_1']; ?></p>
                  <p class="workers text-secondary"><?php echo $grupos['T_2']; ?></p>
                  <p class="workers text-secondary"><?php echo $grupos['T_3']; ?></p>
                  <p class="workers text-secondary"><?php echo $grupos['T_4']; ?></p>
              </div>
          </div>
        <?php endforeach ?>
      <?php endif ?>
    <?php if(!$datos):?>
      <div class="container text-center">No hay grupos para mostrar!</div>
    <?php endif?>
    </div>
       
   
</body>
</html>