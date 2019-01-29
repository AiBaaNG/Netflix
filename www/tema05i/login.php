<?php
require_once("Pantalla.class.php");


$mensaje="";
if (isset($_GET['mensaje'])){
	$mensaje=trim(strip_tags($_GET['mensaje']));
}



//Mostrar pantalla con los datos


$pantalla=new Pantalla("../../pantallas/tema05-i");
$pantalla->mostrar("login.tpl");

?>