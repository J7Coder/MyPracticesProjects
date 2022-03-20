
<?php

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
        top:62px;
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
<body>

<!-- Simulate a smartphone / tablet -->
<div class="mobile-container">
<a class="text"><bold>ABC</bold><span>PACK</span></a>
    <!-- Top Navigation Menu -->
    <div class="topnav">
    <a class="active"><img src="logo3.png"</a>
    <div id="myLinks">
        <a href="#news" class="links">Grupos</a>
        <a href="#contact" class="links">Procesos</a>
        <a href="#about" class="links">Salir</a>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
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
</script>

</body>
</html>

