 <?php
require_once("Video.class.php");
require_once("AccesoVideos.class.php");
require_once("Pantalla.class.php");
require_once("../../seguridad/tema05-i/Sesion.class.php");


//Compruebo si la sesion ha sido creada, para si no es así el usuariio no estará logueado
Sesion::start();
if(!Sesion::validado()){
	header("Location: login.php?mensaje=".urlencode("Usuario inexistente o clave no reconocida"));
        exit;
}

// require_once( "Carrito.class.php");

// session_cache_limiter('nocache, private');
// session_start();
// if (!isset($_SESSION['variable'])){
// 	$_SESSION['variable']=uniqid();
// }
$mensaje="";
if (isset($_GET['mensaje'])){
	$mensaje=trim(strip_tags($_GET['mensaje']));
}

// Recuperar datos que se muestran en la pantalla
$bd=new AccesoVideos();
$videos=$bd->getVideos();

//Mostrar pantalla con los datos

// $carrito=new Carrito($_SESSION['variable']);


$pantalla=new Pantalla("../../pantallas/tema05-i");

$parametros=array('avideos' => $videos,'mensaje'=>$mensaje);

$pantalla->mostrar("index.tpl",$parametros);

?>