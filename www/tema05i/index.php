 <?php
require_once("Video.class.php");
require_once("../../seguridad/tema05-i/AccesoVideos.class.php");
require_once("Pantalla.class.php");
require_once("../../seguridad/tema05-i/Sesion.class.php");


//Compruebo si la sesion ha sido creada, para si no es así el usuariio no estará logueado
Sesion::start();
if(!Sesion::validado()){
	header("Location: login.php?mensaje=".urlencode("Usuario inexistente o clave no reconocida"));
        exit;
}



//Crear smarty
$smarty = new Smarty();
date_default_timezone_set('Europe/Madrid');
$smarty->config_dir="../../pantallas/tema05-i/configs/";
$smarty->cache_dir="../../pantallas/tema05-i/cache/";
$smarty->compile_dir="../../pantallas/tema05-i/templates_c/";
$smarty->template_dir="../../pantallas/tema05-i/templates/";


//Recibo la mensaje por post
$mensaje="";
if (isset($_GET['mensaje'])){
	$mensaje=trim(strip_tags($_GET['mensaje']));
}

$bd=new AccesoVideos();
$videos = array();
$parametros = array();
//Compruebo si el usuario ha pedido que se muestre por categorías
$mostrar = "";
$videos=$bd->getVideos($_SESSION['dni'],$mostrar);




//Compruebo si el usuario ha seleccionado ver por orden alfabético, si es así las mostraré ordenadas
if(isset($_GET['v'])){
	$mostrar = strip_tags(trim($_GET['v']));
	$videos=$bd->getVideos($_SESSION['dni'],$mostrar);
	$parametros=array('avideos' => $videos,'mensaje'=>$mensaje);
	$smarty->assign('datosVideoS', $parametros);
	$smarty->display('index.tpl');
}else if(isset($_POST['submit'])){
	foreach ($_POST['categorias'] as $select){
		$mostrar = $select;
		$videos=$bd->getVideosByCategory($_SESSION['dni'],$mostrar);
		$parametros=array('avideos' => $videos,'mensaje'=>$mensaje);
		$smarty->assign('datosVideoS', $parametros);
		$smarty->display('index.tpl');
	}
		
}else{
	//Si no ha pulsado en mostrar por orden las mostrará desordenadas (OPCION POR DEFECTO AL CARGAR LA PÁGINA)
	$mostrar = "";
	$videos=$bd->getVideos($_SESSION['dni'],$mostrar);
	$parametros=array('avideos' => $videos,'mensaje'=>$mensaje);
	$smarty->assign('datosVideoS', $parametros);
	$smarty->display('index.tpl');
}



//Crear array de peliculas vistas 
$pelisVistas  = array();

// echo "<script>alert('$mostrar');</script>";

// Recuperar datos que se muestran en la pantalla


// $parametros=array('avideos' => $videos,'mensaje'=>$mensaje);
// $smarty->assign('datosVideoS', $parametros);
// $smarty->display('index.tpl');

//Mostrar pantalla con los datos

// $carrito=new Carrito($_SESSION['variable']);




?>