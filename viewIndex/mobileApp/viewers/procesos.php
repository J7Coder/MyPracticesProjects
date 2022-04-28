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
    .mage{
      margin-left:25px;
    }

    .head-mage{
      padding-left:130px;
    }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark my-1 mx-2 rounded fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="principal.php">Atrás</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
     
      <form class="d-flex mt-2">
        <input class="form-control me-2" type="text" placeholder="Buscar proceso">
        <button class="btn btn-primary" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>

    <div class="container hero">
        <div class="shadow-lg p-1 mb-5 bg-body rounded">
            <div class="img d-flex justify-content-between">
                <img src="https://shortest.link/3khK" alt="Avatar" class="text-left avatar">
                <h1 class="titulo text-primary">Stella x 24</h1>
            </div>
            <div class="text-center mt-3">
                <button class=" btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Más</button>
            </div>

            </div>
      </div>

      <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header head-mage">
        <h4 class="modal-title ">Un proceso</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body mage">
        <p><strong>Meta: </strong></p>
        <p><strong>Precio extra: </strong></p>
        

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Salir</button>
      </div>

    </div>
  </div>
</div>
    
       
   
</body>
</html>