<?php
	session_start();

  include '../viewIndex/datos.php';
  include '../viewIndex/editarInfo.php';
  if(!$_SESSION['user'] && !$_SESSION['password']){
      header('location:login.php');
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
    
    </style>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark my-1 mx-2 rounded fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="principal.php">Atrás</a>
    <?php if(1+2== 4-1): ?>
    <a class="navbar-brand edit" href="">Editar Grupos</a>
    <?php endif; ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
     
      <form class="d-flex mt-2 ">
        <input class="form-control me-2" type="text" placeholder="Ingresa un trabajador">
        <button class="btn btn-primary" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>

    <div class="container hero">
        <div class="shadow-lg p-1 mb-5 bg-body rounded mt-5">

            <div class="text-white bg-danger rounded h1-title">
                <h1 class="title text-center p-1">Corona lata <span class="bodega">25D</span></strong></h1>
            </div>

            <div class="info text-center">
                <p class="workers text-secondary">Jean Phillype Marteli</p>
                <p class="workers text-secondary">Alberto Alfonso</p>
                <p class="workers text-secondary">Anderson Charles</p>
            </div>
        </div>
    </div>
       
   
</body>
</html>