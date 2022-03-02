<?php
include "conexion.php";

//Buscador de grupos
global $mensaje;
if(isset($_POST["buscar_grupo"])|| isset($_POST["ver_grupos"])){
    $key_word=$_POST["keyWord"];
    $key_word=$key_word."%";
    $sql="select * from grupos where T_1 like ? or T_2 like ? or T_3 like ? or T_4 like ?";
    $_result= $pdo-> prepare($sql);
    $_result->execute(array($key_word,$key_word,$key_word,$key_word));
    $rows=$_result->rowCount();
    if($rows==0){
        $mensaje="El trabajador buscado no pertenece a ningun grupo!";
        $sql="select * from grupos order by Id desc";
        $_result= $pdo-> prepare($sql);;
        $_result= $pdo-> prepare($sql);
        $_result->execute();
    }
}else{
    $sql="select * from grupos order by Id desc";
    $_result= $pdo-> prepare($sql);;
    $_result= $pdo-> prepare($sql);
    $_result->execute();
   
}
$resultado=$_result->fetchAll();


//capturar id por metodo get
if($_GET){
    $id=$_GET["id"];
    $sql="select * from grupos where Id=?";
    $_result= $pdo-> prepare($sql);
    $_result->execute(array($id));
    $valores=$_result->fetchAll();

    foreach($valores as $valor){
        $alert=$valor["alert"];
    }
}

//Metodo para ver si ya existe un trabajador en un grupo ya creado para no repetir trabajador en grupo
function ifExisteTrabajador($t1,$t2,$t3,$t4){
    include "conexion.php";
    $errorMessage="";
    if(!$t1==""){
        $sql_trabajador="select * from grupos where T_1=?";
        $_result= $pdo-> prepare($sql_trabajador);
        $_result->execute(array($t1));
        $Trabajadores=$_result->fetch();
        if($Trabajadores){
            $errorMessage="El trabajador ".$t1." ya pertenece a un grupo, por favor selecciona untrabajador libre";
        }
    }elseif(!$t2==""){
        $sql_trabajador="select * from grupos where T_2=?";
        $_result= $pdo-> prepare($sql_trabajador);
        $_result->execute(array($t2));
        $Trabajadores=$_result->fetch();
        if($Trabajadores){
            $errorMessage="El trabajador ".$t2." ya pertenece a un grupo, por favor selecciona untrabajador libre";
        }
    }elseif(!$t3==""){
        $sql_trabajador="select * from grupos where T_3=?";
        $_result= $pdo-> prepare($sql_trabajador);
        $_result->execute(array($t3));
        $Trabajadores=$_result->fetch();
        if($Trabajadores){
            $errorMessage="El trabajador ".$t3." ya pertenece a un grupo, por favor selecciona untrabajador libre";
        }
    }elseif(!$t3==""){
        $sql_trabajador="select * from grupos where T_4=?";
        $_result= $pdo-> prepare($sql_trabajador);
        $_result->execute(array($t4));
        $Trabajadores=$_result->fetch();
        if($Trabajadores){
            $errorMessage="El trabajador ".$t4." ya pertenece a un grupo, por favor selecciona untrabajador libre";
        }
    }

    return $errorMessage;

}



//Crear grupos  
    Global $Exito;
    Global $err_trabajador;
    $err_trabajador="";
if(isset($_POST["btn"])){
    $Alert="";
    $Proceso=$_POST["proceso"];
    $Bodega=$_POST["bodega"];
    $T_1=$_POST["t_1"];
    $T_2=$_POST["t_2"];
    $T_3=$_POST["t_3"];
    $T_4=$_POST["t_4"];
    $Color = $_POST["color"];
   

    switch($Color){
        case "Verde":
            $Alert="success";
            break;
        case "Azul":
            $Alert="primary";
             break;
        case "Amarillo":
            $Alert="warning";
            break;
        case "Rojo":
            $Alert="danger";
            break;
        case "Gris":
            $Alert="secondary";
             break;
        default:
            $Alert="info";
                break;
    }
      
    //Reinicializar el auto_increment del campo Id
    $sql2="alter table grupos auto_increment=1";
    $_result2= $pdo-> prepare($sql2);
    $_result2->execute();

    $texto="Selecciona un trabajador";
    if($T_1==$texto){
        $T_1="";
    }
    if($T_2==$texto){
        $T_2="";
    }
    if($T_3==$texto){
        $T_3="";
    }
    if($T_4==$texto){
        $T_4="";
    }
    $err_trabajador=ifExisteTrabajador($T_1,$T_2,$T_3,$T_4);
    $res="";
    if(!$err_trabajador){
        $sentencia="insert into grupos(Proceso,Bodega,T_1,T_2,T_3,T_4,alert) values(?,?,?,?,?,?,?)";
        $res=$pdo->prepare($sentencia);
        $res->execute(array($Proceso,$Bodega,$T_1,$T_2,$T_3,$T_4,$Alert));
    }
  
    if($res){
        $Exito="Grupo creado exitosamente!";
    }

    //header('location:datosIndex.php');
   
   
   

}


//Editar grupos
    Global $editor;
if(isset($_POST["btn_editar"])){
    $Proceso=$_POST["proceso"];
    $Bodega=$_POST["bodega"];
    $T_1=$_POST["t_1"];
    $T_2=$_POST["t_2"];
    $T_3=$_POST["t_3"];
    $T_4=$_POST["t_4"];
    $Color = $alert;
    
    if(!$Proceso=="" && !$Bodega==""){
        if($T_1!=="" || !$T_2=="" || !$T_3=="" || !$T_4==""){
            $sql_edit='update grupos set Proceso=?,Bodega=?,T_1=?,T_2=?,T_3=?,T_4=?,alert=? where Id=?';
            $editar=$pdo->prepare($sql_edit);
            $editar->execute(array($Proceso,$Bodega,$T_1,$T_2,$T_3,$T_4,$Color,$id));

            if($editar){
                $editor="Los cambios han sido guardados correctamente!";
            }
        }
       
    }

    //header('location:datosIndex.php');
}

//buscar proceso
    global $message;
if(isset($_POST["buscar"]) || isset($_POST["ver_procesos"])){
    $key_word=$_POST["keyWord"];
    $key_word=$key_word."%";
    $sql_proceso="select * from procesos where Nombre like ?";
    $_result= $pdo-> prepare($sql_proceso);
    $_result->execute(array($key_word));
    $rows=$_result->rowCount();
    if($rows==0){
        $message="No hay resultado para mostrar! \n Verifique el nombre del proceso que ha ingresado";
        $sql_proceso="select * from procesos";
        $_result= $pdo-> prepare($sql_proceso);
        $_result->execute();
    }
}else{
    $sql_proceso="select * from procesos";
    $_result= $pdo-> prepare($sql_proceso);
    $_result->execute();
   
}
$Procesos=$_result->fetchAll();



//selecionar trabajadores
$sql_trabajador="select * from trabajadores";
$_result= $pdo-> prepare($sql_trabajador);
$_result->execute();
$Trabajadores=$_result->fetchAll();


//Agregar procesos
    Global $Succed;
    Global $err_proceso;
    $err_proceso="";
if(isset($_POST["btnProceso"])){
    $nombre=$_POST["proceso"];
    $meta=$_POST["meta"];
    $precio=$_POST["precio"];
    $image=$_POST["url"];

    $sql_proceso="select * from procesos where Nombre=?";
    $_results= $pdo-> prepare($sql_proceso);
    $_results->execute(array($nombre));
    $Proceso=$_results->fetch();
    $result="";
    if(!$Proceso){
        $sql="insert into procesos (Nombre, Meta, Precio, foto) values(?, ?, ?, ?)";
        $query=$pdo->prepare($sql);
        $result=$query->execute(array($nombre,$meta,$precio,$image));
    }else{
         $err_proceso="El proceso ".$nombre. " ya existe por favor ingresa un proceso diferente";
    }
    
    if($result){
        $Succed="Proceso ha sido guardado exitosamente!";
    }
        
    
    

}


//Agregar Trabajadores

Global $Succed_dos;
Global $err_dos;
$err_dos="";
if(isset($_POST["btn_trabajador"])){
$nombreT=$_POST["nombreT"];
$apelT=$_POST["apelT"];
$rutT=$_POST["rutT"];
$sexoT=$_POST["sexoT"];

$sql_proceso="select * from trabajadores where Rut=?";
$_results= $pdo-> prepare($sql_proceso);
$_results->execute(array($rutT));
$trabajador=$_results->fetch();
$result="";
if(!$trabajador){
    $sql="insert into trabajadores (Nombre, Apellido, Rut, Genero) values(?, ?, ?, ?)";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($nombreT,$apelT,$rutT,$sexoT));
}else{
    $err_dos="El trabajador de Rut ".$rutT. " ya esta registrado dentro del sistema";
}

if($result){
    $Succed_dos="El trabajador ha sido guardado exitosamente!";
}

}


//buscar Trabajadores
global $message_dos;
if(isset($_POST["ver_trabajadores"])){
    $key_word=$_POST["keyWord3"];
    $key_word=$key_word."%";
    $sql_proceso2="select * from trabajadores where Nombre like ?";
    $_result= $pdo-> prepare($sql_proceso2);
    $_result->execute(array($key_word));
    $rows=$_result->rowCount();
    if($rows==0){
        $message_dos="No hay resultado para mostrar! \n Verifique el nombre del trabajador que ha ingresado";
        $sql_proceso2="select * from trabajadores";
        $_result= $pdo-> prepare($sql_proceso2);
        $_result->execute();
    }
}else{
    $sql_proceso2="select * from trabajadores";
    $_result= $pdo-> prepare($sql_proceso2);
    $_result->execute();
   
}
$res_trabajadores=$_result->fetchAll();
