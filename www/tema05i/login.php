<?php
require_once("../../smarty/libs/Smarty.class.php");

//definir franja horaria
date_default_timezone_set('Europe/Madrid');

//Crear smarty
$smarty = new Smarty();
$smarty->config_dir="../../pantallas/tema05-i/configs/";
$smarty->cache_dir="../../pantallas/tema05-i/cache/";
$smarty->compile_dir="../../pantallas/tema05-i/templates_c/";
$smarty->template_dir="../../pantallas/tema05-i/templates/";

// Cálculos necesarios

//Recoger mensaje de error
$mensaje="";
if (isset($_GET['mensaje'])){
	$mensaje=trim(strip_tags($_GET['mensaje']));
	
}else{
	$mensaje=2;
}
//Asigno la variable mensaje a mensaje_s para mostrarla posteriormente por smarty
$smarty->assign('mensaje_s',$mensaje);


//Mostrar pantalla con los datos
$smarty->display('login.tpl');

?>