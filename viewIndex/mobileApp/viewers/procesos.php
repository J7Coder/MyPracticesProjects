<?php
include '../datos/buscador.php';
	session_start();
  if(!$_SESSION['user']){
      header('location:login.php');
  }

  $buscador= new Buscador();
  $datos= $buscador->buscarProcesos();
  $message='';
  if($datos==0){
      $message= "no se encuentra el proceso buscado, por favor intenta con otro nombre";
      
  }
$data='';
  if($_GET){
    $detalles= new Buscador();
    $data= $detalles->ver_detalles($_GET['id']);
  }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesos</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/78ef6b1762.js" crossorigin="anonymous"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
          .avatar {
          border-radius: 50%;
          width: 110px;
      }

      .btn #links{
        text-decoration: none;
      }
      .hero{
        margin-top: 80px;
      }
      .mage{
        margin-left:25px;
      }

      .head-mage{
        padding-left:130px;
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
      .titulo{
        font-size:25px;
      }

      .left_{
        margin-left:20px;
      }
      .titles{
        font-size:20px;
      }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark my-1 mx-2 rounded fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="principal.php"><i class="fas fa-arrow-left"></i></a>
    <span class="text-white titles">Procesos</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
     
      <form class="d-flex mt-2" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input class="form-control me-2" type="text" placeholder="Buscar proceso" name="nombre_proceso">
        <button class="btn btn-primary" type="submit" name="btn_keys" >Buscar</button>
      </form>
    </div>
  </div>
</nav>

    <div class="container hero">
          <?php 
            if(!$message==""){
                echo "<div class='alert alert-info alert-dismissible fixed-top text-center m-2'>
                <button type='button' class='link btn btn-outline-warning' data-dismiss='alert'><div><strong><a href='procesos.php'>OK</a></strong></div></button>
                $message
                </div>";
            } 
          ?>

      <?php if($datos):?>
        <?php foreach($datos as $procesos): ?>
            <div class="shadow-lg p-1 mb-5 bg-body rounded">
                <div class="img">
                    <img src="<?php echo $procesos['foto']; ?>" alt="No Image" class="text-left avatar">
                    <span class="titulo text-primary left_"><?php echo $procesos['Nombre']; ?></span>
                </div>
                
                  <div class="text-center mt-3">
                    <button  class=" btn btn-outline-primary">
                        <a id="links" href="verInfos.php?id=<?php echo $procesos['Id'];?>">Más</a>
                      </button>
                  </div>
              

            </div>
        <?php endforeach ?>
      <?php endif ?>

      <?php if(!$datos):?>
      <div class="container text-center">No hay procesos agregados!</div>
    <?php endif?>
    </div>

   
</body>
</html>