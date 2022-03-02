<?php
    session_start();
    include '../viewIndex/datos.php';
    if(!$_SESSION['user'] && !$_SESSION['password']){
        header('location: ../loginDesign/login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>

        *{
            margin:0;
            padding: 0;
           
        }
        body{
            background: #edf2fc;
        }
        .hero{
            height:100vh;
            width: 100%;
            background: #edf2fc;
            font-family: sans-serif;
            position: relative;

        }
        .logo{
            width:120px;
            cursor: pointer;

        }
        nav{
            width: 84%;
            margin: auto;
            padding: 20px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        nav ul li{
            display: inline-block;
            list-style: none;
            margin: 10px 20px;
        }
        nav ul li a{
            text-decoration: none;
            color:#7f96c5;
        }
        nav ul li a:hover{
            color:#ff4321;
        }
        .info{
            margin-left: 8%;
            margin-top: 15%;
        }
        .info h1{
            font-size:40px;
            color:#f88787;
            margin-bottom: 20px;
            margin-left: 20px;
        }
        .info a{
            background: #ff4321;
            height: 35px;
            padding: 10px 18px;
            text-decoration: none;
            color:#fff;
            display:inline-block;
            margin: 30px 0;
            border-radius: 5px;
        }.info a:hover{
            opacity: 0.3;
        }
        .img-box{
            margin-top:10px;
            width: 45%;
            height: 80%;
            position: absolute;
            bottom: 0;
            right: 100px;
        }
        .img-box img{
            height: 100%;
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            transition: bottom 1s,left 1s;
        }
        .img-box .main-img{
            width: 70%;
            height: 90%;
        }
        .img-box:hover .back-img{
            bottom: 40px;
        }
        .img-box:hover .main-img{
            left:54%;
        }

        .space{
                margin-left: 200px;
        }
        .footer {
            width: 100%;
        }

        .texto{
            margin-left:145px;
            color: rgba(89, 173, 232, 0.8);
           
        }
        .texto h5{
            font-size:16px;
        } .texto h5 span{
            color:darkblue;
        }
        .editor{
            width:60%;
            margin:auto;
            margin-top:20px;
        }
       
    </style>
</head>
<body>
    <div class="hero mb-5">

        <nav class="navbar navbar-expand-sm">
            <img src="images/logo3.png" alt="" class="logo">
            <ul class="navbar-nav">
                <li class="nav-item dropdown space"> 
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Grupos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../viewIndex/datosIndex.php">Crear Grupos</a>
                        <a class="dropdown-item" href="../viewIndex/verGrupos.php">Ver Grupos</a>
                     </div>
                </li>

                <li class="nav-item dropdown"> 
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Procesos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../viewIndex/procesoIndex.php">Agregar Proceso</a>
                        <a class="dropdown-item" href="../viewIndex/verProcesos.php">Ver Procesos</a>
                     </div>
                </li>

                <li class="nav-item dropdown"> 
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Trabajadores
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#agregarT">Agregar</a>
                        <a class="dropdown-item" href="../viewIndex/verTrabajadores.php">Ver Listado</a>
                     </div>
                </li>

                <li class="nav-item dropdown"> 
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Informaciones
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#myModal">Agregar Info</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#editarInfo">Editar Info</a>
                     </div>
                </li>
                
            </ul>
        </nav>
    
            <?php 

                if(!$Succed_dos==""){
                    echo "<div class='alert alert-success alert-dismissible fixed-top editor'>
                    $Succed_dos
                    <a href='index.php' class='float-right'>Cerar</a>
                    </div>";
                }  

                if(!$err_dos==""){
                    echo "<div class='alert alert-danger alert-dismissible fixed-top editor'>
                    $err_dos
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    </div>";
                }  
            
            ?>

        <div class="texto"><h5>ABC <span>PACK</span></h5></div>

        <div class="info">
            <h1 class="welcome">¡Te damos la Bienvenida!</h1>
            <a href="../loginDesign/sessionCerrar.php" onclick="return cerrarSession()">Cerrar</a>
        </div>
        <div class="img-box">
            <img src="images/pattern.png" class="back-img">
            <img src="images/box1.png" class="main-img">
        </div>
    </div>

        
    <div class="container mt-3">

        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h4 class="modal-title ml-5">Agregar Informaciones</h4>
                        <button type="button" class="close" data-dismiss="modal">x</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                            <label for="descripcion"><h6>Descripción:</h6></label>
                            <input type="text" class="form-control" id="descripcion" placeholder="Ingresa la descripción o el titulo">
                            <label for="infos" class="mt-4"><h6>Contenido:</h6></label>
                            <textarea class="form-control" rows="5" id="info" name="text" placeholder="Ingresa informaciones"
                              style="resize:none"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                
                </div>
                
            </div>
        </div>
    </div>

      
    <div class="container mt-3">

        <div class="modal fade" id="agregarT">
            <div class="modal-dialog">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h4 class="modal-title ml-5">Nuevo trabajadores</h4>
                        <button type="button" class="close" data-dismiss="modal">x</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="post" id="formT" >
                            <div class="form-group">
                                <label for="nombreT"><h6>Nombre:</h6></label>
                                <input type="text" name="nombreT" class="form-control" id="nombreT" placeholder="Nombre del trabajador">
                                <label for="apelT" class="mt-4"><h6>Apellido:</h6></label>
                                <input type="text" class="form-control" id="apelT" placeholder="Apellido del trabajador" name="apelT">
                                <label for="rutT" class="mt-4"><h6>Rut:</h6></label>
                                <input type="text" class="form-control mb-4" id="rutT" placeholder="Ej: XXXXXXXX-X " name="rutT">
                                <label for="sexoT"><h6>Sexo del trabajador</h6></label>
                                <select class="form-control" id="sexoT" name="sexoT">
                                    <option>M</option>
                                    <option>F</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" onclick="return validarTrabajadores()" name="btn_trabajador">Agregar</button>
                            <button type="button" class="btn btn-danger float-right" data-dismiss="modal" >Cancelar</button>
                        </form>
                    </div>
                
                </div>
                
            </div>
        </div>
    </div>


    <div class="container mt-3">

        <div class="modal fade" id="editarInfo">
            <div class="modal-dialog">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h4 class="modal-title ml-5">Editar Informaciones</h4>
                        <button type="button" class="close" data-dismiss="modal">x</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                            <label for="descripcion"><h6>Descripcion:</h6></label>
                            <input type="text" class="form-control" id="descripcion">
                            <label for="contenido" class="mt-3"><h6>Contenido:</h6></label>
                            <textarea class="form-control mb-3" rows="5" id="contenido" name="text" style="resize: none;"></textarea>
                            <button type="submit" class="btn btn-primary">Editar</button>
                            <a href="#" class="float-right">Eliminar</a>
                        </form>
                    </div>
                
                </div>
                
            </div>
        </div>
    </div>




  
    <div class="text-center p-3 footer" style="background: #edf2fc;">
         © 2022 Copyright:
        <a class="text-dark" href="#">J7Coder Design</a>
        
    </div>
   
 

    <script>
        function cerrarSession(){
            const responce=confirm("¿Quieres salir del sistema?");
            if(responce){
                return true;
            }
            return false;
        } 

        var Fn = {
	    // Valida el rut con su cadena completa "XXXXXXXX-X"
            validaRut : function (rutCompleto) {
                if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
                    return false;
                var tmp 	= rutCompleto.split('-');
                var digv	= tmp[1]; 
                var rut 	= tmp[0];
                if ( digv == 'K' ) digv = 'k' ;
                return (Fn.dv(rut) == digv );
            },
            dv : function(T){
                var M=0,S=1;
                for(;T;T=Math.floor(T/10))
                    S=(S+T%10*(9-M++%6))%11;
                return S?S-1:'k';
            }
        }


        function validarTrabajadores(){
         
        
                const nombreT=document.getElementById("nombreT").value;
                const apelT=document.getElementById("apelT").value;
                const rutT=document.getElementById("rutT").value;

                nombreT.trim();
                apelT.trim();
                rutT.trim();

                if(nombreT==""){
                    alert("El nombre del trabajador es requerido");
                    return false;
                }
                if(nombreT.length<4){
                    alert("Por favor ingresa un nombre válido");
                    return false;
                }
                if(nombreT.match(/[0-9]/)){
                    alert("Nombre del trabajador no es válido");
                    return false;
                }

                if(apelT==""){
                    alert("El apellido del trabajador es requerido");
                    return false;
                }

                if(apelT.length<4){
                    alert("Por favor ingresa un apellido válido");
                    return false;
                }
                if(apelT.match(/[0-9]/)){
                    alert("El apellido del trabajador no es válido");
                    return false;
                }

                if(rutT==""){
                    alert("Debes ingresar el rut del trabajador");
                    return false;
                }
                const rutValid=Fn.validaRut(rutT.trim());
                // Uso de la función

                if(!rutValid){
                    alert("El rut no es válido");
                    return false;
                }

                return true;
              
        }
    </script>
</body>
</html>