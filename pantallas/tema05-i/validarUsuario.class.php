<?php

include_once("Sesion.class.php");
Sesion::start();
verifyLogin();
function getUsuario(){
    $usuario="";
    if (!isset($_POST['usuario'])){
        header("Location: login.php?mensaje=".urlencode("ERROR.\nInroduzca los datos de nuevo."));
        exit;
    }
    $usuario=strip_tags(trim($_POST['usuario']));
    return $usuario;
}

function getClave(){
    //Recibimos la clave
    $clave="";


    if (!isset($_POST['clave'])){
        header("Location: login.php?mensaje=".urlencode("ERROR.\nInroduzca los datos de nuevo."));
        exit;
    }
    $clave=strip_tags(trim($_POST['clave']));
    return $clave;
}

function verifyLogin(){
    $usuario = getUsuario();
    $clave = getClave();
    if (empty($usuario) || strlen($usuario)>20 || empty($clave) || strlen($clave)>20){
        header("Location: login.php?mensaje=".urlencode("Usuario inexistente o clave no reconocida"));
        exit;
    }


    //Nos conectamos con la base de datos para comprobar que el usuario y la clave son correctos
    $canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
    if (!$canal){
        echo "Ha ocurrido el error: ".mysqli_connect_errno()." ".mysqli_connect_error()."<br />";
    exit;
    }
    $canal->set_charset("utf8");
    $consulta=$canal->prepare("select * from usuarios where dni=?");

    if (!$consulta){
        echo "Ha ocurrido el error: ".mysqli_errno($canal)." ".mysqli_error($canal)."<br />";
    exit;	
    }

    $consulta->bind_param("s",$uusuario);
    $uusuario=$usuario;
    $consulta->execute();
    $consulta->bind_result($dniBD,$nombreBD,$claveBD);
    $consulta->store_result();

    //Comprobamos si el usuario existe
    if ($consulta->num_rows!=1){
        $canal->close();
        header("Location: login.php?mensaje=".urlencode("Usuario inexistente."));
        exit;
    }

    //Cerramos la consulta
    $consulta->fetch();
    $canal->close();

    //Comprobamos que la contraseña sea correcta
    if (password_verify($clave, $claveBD)){
        Sesion::validarUsuario($nombreBD,$dniBD);
        header("Location: index.php?mensaje=".urlencode("Login correcto."));
        
        
        
        
    }else{
        header("Location: login.php?mensaje=".urlencode("Contraseña errónea."));
    }




}

































?>