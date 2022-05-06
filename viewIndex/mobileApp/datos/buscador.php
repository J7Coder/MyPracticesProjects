<?php
class Buscador{

    public function buscarGrupos(){
        include '../../conexion.php'; 
        $sql;
        $_result;
        if(isset($_POST["btn_key"])){
            $key_word=$_POST["key_word"];
            $key_word=$key_word."%";
            $sql="select * from grupos where T_1 like ? or T_2 like ? or T_3 like ? or T_4 like ?";
            $_result= $pdo-> prepare($sql);
            $_result->execute(array($key_word,$key_word,$key_word,$key_word));
            $rows=$_result->rowCount();
            if($rows==0){
                return 0;
            }
        }else{
            $sql="select * from grupos order by Id desc";
            $_result= $pdo-> prepare($sql);;
            $_result= $pdo-> prepare($sql);
            $_result->execute();
        }
        $_res=$_result->fetchAll();
        return $_res;
    }

    public function buscarProcesos(){
        include '../../conexion.php'; 
        $sql;
        $_result;
        if(isset($_POST["btn_keys"])){
            $key_word=$_POST["nombre_proceso"];
            $key_word=$key_word."%";
            $sql="select * from procesos where Nombre like ?";
            $_result= $pdo-> prepare($sql);
            $_result->execute(array($key_word));
            $rows=$_result->rowCount();
            if($rows==0){
                return 0;
            }
        }else{
            $sql="select * from Procesos order by Id desc";
            $_result= $pdo-> prepare($sql);
            $_result->execute();
        }
        $_res=$_result->fetchAll();
        return $_res;
    }

    public function ver_detalles($datas){
        include '../../conexion.php'; 
        $id=$datas;
        $sql="select * from procesos where Id = ?";
        $_result= $pdo-> prepare($sql);;
        $_result->execute(array($id));
        $_res=$_result->fetchAll();

        return $_res;
    }

    //buscar grupos por id
    public function id_grupos($id){
        include '../../conexion.php'; 
        $sql="select * from grupos where Id = ?";
        $_result= $pdo-> prepare($sql);;
        $_result->execute(array($id));
        $_res=$_result->fetchAll();

        return $_res;
    }

    public function validarEditar($post){
       $errores=[];
       $errores['message']='';
       $errores['proceso']='';
       $errores['bodega']='';

        if(!$post['proceso']){
            $errores['proceso']='Desbes ingresar un proceso!';
        }

        if(!$post['bodega']){
            $errores['bodega']='Desbes ingresar la bodega!';
        }
        if(!$post['t-uno'] && !$post['t-dos'] && !$post['t-tres'] && !$post['t-cuatro']){
            $errores['message']='El grupo debe contener al menos un trabajador!';
        }

        return $errores;
    }

    public function editarGrupos($datas){
        include '../../conexion.php';
        
        $sql="update grupos set Proceso=?, Bodega=?, T_1=?, T_2=?, T_3=?, T_4=?,alert=? where Id=?";
        $_result= $pdo-> prepare($sql);;
        $_result->execute(array($datas['proceso'],$datas['bodega'],$datas['t-uno'],$datas['t-dos'],$datas['t-tres'],$datas['t-cuatro'],$datas['color'],$datas['id']));
        if($_result){
            return 1;
        }
        return 0;
    }

    public function eliminarGrupo($id){
        include '../../conexion.php';
        
        $sql="delete from grupos where Id=?";
        $_result= $pdo-> prepare($sql);;
        $_result->execute(array($id));
        if($_result){
            return 1;
        }
        return 0;
    }
}