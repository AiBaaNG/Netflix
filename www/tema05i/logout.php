<?php
require_once("../../seguridad/tema05-i/Sesion.class.php");
//Compruebo si la sesion ha sido creada, para si no es así el usuariio no estará logueado
Sesion::start();
if(!Sesion::validado()){
	header("Location: login.php?mensaje=".urlencode("No validado!"));
        exit;
}else{
    session_destroy();
    unset($_SESSION);
    header("Location: login.php?mensaje=".urlencode("Sesion cerrada!"));
    exit;
}


?>