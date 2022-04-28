
<?php
	session_start();
  if(!$_SESSION['user'] && !$_SESSION['password']){
      header('location:login.php');
  }
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background:#07024e;
        }

        .mobile-container {
        max-width: 480px;
        margin: auto;
        background-color: #fff;
        height: 500px;
        color: blue;
        padding-left:2px;
        padding-right:6px;
        border-radius: 10px;
        }

        .topnav {
        overflow: hidden;
        background-color:#3e15f5;
        position: relative;
        }


        .topnav a {
        color: white;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 18px;
        display: block;
        }
        .text{
        color: blue;
        top:70px;
        position: relative;
        text-decoration: none;
        margin-left:8px;
        font-size:14px;
        display: block;
        z-index: 1;
        }
        .text bold{
            color:#0c0238;
        }
        .text span{
            color: #02b1e8;
        }

        .topnav a.icon {
            background: #3e15f5;
            display: block;
            position: absolute;
            right: 0;
            top: 0;
            border-radius:12px;
            
        }

        .topnav .links:hover {
        background-color: #a693fb;
        color: #fff;
        }
        .topnav img {
            width:42px;
        }

        .active {
        background-color: #fff;
        color: #0000;
        }


        #myLinks{
            display:none;
        }
     
    </style>
</head>
<body class="bg-primary">

<!-- Simulate a smartphone / tablet -->
<div class="mobile-container m-2 bg-light-gray">
  <a class="text"><bold>ABC</bold><span>PACK</span></a>
      <!-- Top Navigation Menu -->
      <div class="topnav rounded">
          <a class="active"><img src="logo3.png"</a>
          <div id="myLinks">
              <a href="grupos.php" class="links">Grupos</a>
            <a href="procesos.php" class="links">Procesos</a>
            <a href="../datos/cerrar_session.php" class="links" onclick="return confirmarSalir()">Salir</a>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
        <!-- contenedor para mostrar las informaciones -->
      <div class="container">
        <div class="shadow-lg p-1 mb-5 bg-body rounded mt-5">
          <div class="text-white bg-primary rounded">
          <h1 class="title text-center p-1">What's new ?</h1>
          </div>
          <div class="paraf text-secondary">
            Esuna prueba para verificar si se vera bien las informaciones

          </div>
          </div>
      </div>

     <div class="container">
     <div class="shadow-lg p-1 mb-5 bg-body rounded mt-5">
       <div class="text-white bg-primary rounded">
       <h1 class="title text-center p-1">Grupo del dia</h1>
       </div>
       <div class="info text-center">
        <strong class=" text-dark text-center">Malloa x 6 <span class="bodega">25D</span></strong>
          <p class="workers text-secondary">Jean Phillype Marteli</p>
          <p class="workers text-secondary">Alberto Alfonso</p>
          <p class="workers text-secondary">Anderson Charles</p>
       </div>
      </div>
     </div>



    <!-- End smartphone / tablet look -->

  </div>

<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

  function confirmarSalir(){
    let responce=confirm("¿Realmente quieres salir?");
    if(responce){
      return true;
    }
    return false;
  }
</script>

</body>
</html>

