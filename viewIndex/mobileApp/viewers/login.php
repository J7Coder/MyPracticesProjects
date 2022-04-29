<?php
    require("../datos/configurar.php");
    require ('../datos/errores.php');
    require ('../datos/userSession.php');

    session_start();

    $errors = [];
    $failures;
    $success_;
    if(isset($_POST['btn_userLogin'])){
      // validate entries
      $validation = new UserValidator($_POST);
      $errors = $validation->validateForm();
      $session_ = new User_session($_POST);
      $validate_user = $session_->validar_session();
        if(!$errors){
            if($validate_user){
                header('Location:principal.php');
            }else{
                $errors['message']="Usuario/Contraseña incorrecto";
            }
        }
    }

    if(isset($_POST['btn_config'])){
        // validar entradas
        $config = new AcountConfig($_POST);
        $errors = $config->validateFields();
        $failures=$errors['failed'] ?? '';
        $success_ = $errors['success'] ?? '';
    }
?>
<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

   
    <div class="container-fluid bg-light shadow m-2">
        <div class= "form-holder bg-light">
            <h2 class="title_text mt-3 text-center mr-5">Inicio de sesión</h2>
            <div class="imgcontainer mb-3">
                <img src="logo3.png" alt="Avatar" class="avatar">
                <a class="text"><bold>ABC</bold><span>PACK</span></a>
            </div>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="POST" id="formSession" onSubmit="return validarSession()">

                <?php
                
                    if(!$failures==""){
                        echo "<div class='alert alert-danger alert-dismissible text-small text-center' id='close2'>
                        <button onclick='desapear()' type='button' class='close' data-dismiss='alert' id='close' >OK</button>
                        $failures
                    </div>";
                    }  


                    if(!$success_==""){
                        echo "<div class='alert alert-success alert-dismissible text-small text-center' id='close2'>
                        <button onclick='desapear()' type='button' class='close' data-dismiss='alert' id='close' >OK</button>
                        $success_
                    </div>";
                    } 
                ?>
                    
                <div class="container labels">
                    <label for="uname"><b>Rut</b></label>
                    <input type="text" placeholder="ej: 27448017-1" name="user" id="users" onfocus=" vaciarErrores(), desapear()" class="form-control " value="<?php if(isset($_POST["user"])){echo htmlspecialchars($_POST['user']);}?>">
                    <div class="text-danger vaciar" >
                        <?php echo $errors['user'] ?? '' ?>
                    </div>
                    <p class="errorUser text-center d-none  text-danger"></p>
                    <label for="psw"><b>Contraseña</b></label>
                    <input type="password" placeholder="Contraseña" name="psw" id="passwords" onfocus=" vaciarErrores(), desapear()" class="form-control" value="<?php if(isset($_POST["psw"])){echo htmlspecialchars($_POST['psw']);} ?>">
                    <p class="errorPass d-none text-center text-danger"></p>
                    <div class="text-danger vaciar_dos" >
                        <?php echo $errors['psw'] ?? '' ?>
                    </div>
                    <p class="text-danger vaciar_uno">
                        <?php echo $errors['message'] ?? '' ?>
                    </p>
                    <input type="hidden" name="message" value="">
                    <button type="submit"  name="btn_userLogin">Entrar</button>
                    

                    <div class="container mb-3">
                        <span class="psw">Configurar <a onclick="document.getElementById('id01').style.display='block'" href="#">cuenta?</a></span>
                    </div>
                </div>

            
            </form>
            
        </div>

        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="modal-content" method="POST">
                <div class="container">
                    <h1 class="text-center">Configurar cuenta</h1>
                    
                    <hr>
                    <label for="rut"><b>Rut</b></label>
                    <input type="text" placeholder="ej: 90214687-0" name="rut">

                    <label for="psw"><b>Contraseña</b></label>
                    <input type="password" placeholder="Ingresar contraseña" name="pass">

                    <label for="psw-repeat"><b>Repetir contraseña</b></label>
                    <input type="password" placeholder="Confirmar contraseña" name="psw-repeat">
                    

                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
                        <button type="submit" class="signupbtn" name="btn_config">Aceptar</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    <script type="text/javascript" src="scriptCodes.js"></script>
</body>
</html>