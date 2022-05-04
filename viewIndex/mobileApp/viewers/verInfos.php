<?php
include '../datos/buscador.php';
	session_start();
  if(!$_SESSION['user']){
      header('location:login.php');
  }

$data='';
  if($_GET){
    $detalles= new Buscador();
    $data= $detalles->ver_detalles($_GET['id']);
  }else{
    header('location:procesos .php');
  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Infos</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/78ef6b1762.js" crossorigin="anonymous"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<?php if($data):?>
    <?php foreach($data as $detalle):?>
    <div class="container">
        <div class="card shadow-lg">
            
            <div class="card-header bg-dark text-white text-center">
                <h4 class="modal-title "><?php echo $detalle['Nombre']; ?></h4>
            </div>
            <div class="card-body ml-5">
                <p><strong>Meta: </strong> <?php echo $detalle['Meta']; ?></p>
                <p><strong>Precio extra: </strong> <?php echo $detalle['Precio']; ?></p>
            </div>

              
            <div class="card-footer text-center">
                <a class="btn btn-outline-primary" href="procesos.php">Menos</a>
            </div>
            
        </div>
          
    </div>
    <?php endforeach ?>
<?php endif?> 
      


</body>
</html>