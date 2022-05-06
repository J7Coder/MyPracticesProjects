<?php
    include '../datos/buscador.php';
        session_start();
    if(!$_SESSION['user']){
        header('location:login.php');
    }

    $data='';
    if($_GET){
        $detalles= new Buscador();
        $data= $detalles->id_grupos($_GET['key']);
    }
    $errors='';
    $dataEdit='';
    if(isset($_POST['edit_grup'])){
        $buscador= new Buscador();
        $errors= $buscador->validarEditar($_POST);
        if(!$errors['proceso'] && !$errors['bodega'] && !$errors['message']){
            $dataEdit=$buscador->editarGrupos($_POST);
        }
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
    <style>
        .cerrar{
            text-decoration: none;
            font-weight:bold;
        }
    </style>
</head>
<body>

    <?php
        
        if($dataEdit==1){
            echo "<div class='alert alert-success alert-dismissible fixed-top editor'>
                    Los datos han sido modificados correctamente!!
                <a href='grupos.php' class='float-right cerrar'>Cerrar</a>
                </div>";
        }
            
        if($dataEdit==0){
             echo "<div class='alert alert-danger alert-dismissible fixed-top editor'>
                        No pudimos modificar los datos solicitados, por favaor intenta nuevamente!
                   <a href='grupos.php' class='float-right cerrar'>Cerrar</a>
                   </div>";
        }
   

            
    
    ?>

    <div class="card shadow-lg">
        <div class="card-content">
        
            <div class="card-header text-center bg-dark">
                 <h4 class="card-title text-white">Editar Grupo</h4>
            </div>

            <div class="card-body">
               <?php if($data):?>
                    <?php foreach($data as $edit_data): ?>
                        <form  method="POST">
                            <input name="id" type="hidden" value="<?php echo $edit_data['Id']?>"/>
                            <input name="color" type="hidden" value="<?php echo $edit_data['alert']?>"/>
                            <input onfocus="displayErr()" name="proceso" type="text" class="form-control form-control-sm mt-3" placeholder="Proceso" value="<?php echo $edit_data['Proceso']?>">
                            <p class="text-danger error-text">
                                <?php
                                    if($errors){
                                    
                                            echo $errors['proceso'];
                                        
                                    }
                                ?>
                            </p>
                            <input onfocus="displayErr()" name="bodega" type="text" class="form-control form-control-sm mt-3" placeholder="Bodega" value="<?php echo $edit_data['Bodega']?>">
                            <p class="text-danger error-text2">
                                <?php
                                    if($errors){
                                    
                                            echo $errors['bodega'];
                                        
                                    }
                                ?>
                            </p>
                            <input onfocus="displayErr()" name="t-uno" type="text" class="form-control form-control-sm mt-3" placeholder="Trabajador" value="<?php echo $edit_data['T_1']?>">
                            <input onfocus="displayErr()" name="t-dos" type="text" class="form-control form-control-sm mt-3" placeholder="Trabajador" value="<?php echo $edit_data['T_2']?>">
                            <input onfocus="displayErr()" name="t-tres" type="text" class="form-control form-control-sm mt-3" placeholder="Trabajador" value="<?php echo $edit_data['T_3']?>">
                            <input onfocus="displayErr()" name="t-cuatro" type="text" class="form-control form-control-sm mt-3" placeholder="Trabajador"value="<?php echo $edit_data['T_4']?>">
                            <div>  
                                <p class="text-danger error-text3">
                                    <?php
                                        if($errors){
                                        
                                                echo $errors['message'];
                                            
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="card-footer text-center d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary" name="edit_grup">Guardar</button>
                                <a href="grupos.php" type="button" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    <?php endforeach?>
                <?php endif?>
            </div>
                
        </div>
    </div>
   <script type="text/javascript" src="scriptCodes.js"></script>
</body>
</html>