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
}