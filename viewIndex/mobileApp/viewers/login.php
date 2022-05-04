<?php
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
                $errors['message']="El rut ingresado no está registrado dentro del sistema, por favor contacta la administración";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body id="body-corp">

   
    <div class="container-fluid bg-light shadow m-2" id="marge">
        <div class= "form-holder bg-light" style="height:600px; padding-top:12px;">
            <h2 class="title_text mt-3 text-center mr-5">Inicio de sesión</h2>
            <div class="imgcontainer mb-3">
                <img src="logo3.png" alt="Avatar" class="avatar">
                <a class="text"><bold>ABC</bold><span>PACK</span></a>
            </div>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="POST" id="formSession" onSubmit="return validarSession()">

                <div class="container labels">
                    <label for="uname"><b>Rut</b></label>
                    <input type="text" placeholder="ej: 27448017-1" name="user" id="users" onfocus=" vaciarErrores()" class="form-control " value="<?php if(isset($_POST["user"])){echo htmlspecialchars($_POST['user']);}?>">
                    <div class="text-danger vaciar" >
                        <?php echo $errors['user'] ?? '' ?>
                    </div>
                    <p class="errorUser text-center d-none  text-danger"></p>
                    <p class="text-danger vaciar_uno">
                        <?php echo $errors['message'] ?? '' ?>
                    </p>
                    <input type="hidden" name="message" value="">
                    <button type="submit"  name="btn_userLogin">Entrar</button>
                
                </div>

            
            </form>
            
        </div>

        
    </div>
    <script type="text/javascript" src="scriptCode.js"></script>
</body>
</html>