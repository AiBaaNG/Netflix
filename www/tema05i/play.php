<?php
    include_once( '../../Smarty/libs/Smarty.class.php' );
    require_once("../../seguridad/tema05-i/Video.class.php");
    require_once("../../seguridad/tema05-i/AccesoVideos.class.php");
    require_once("../../seguridad/tema05-i/Pantalla.class.php");
    require_once("../../seguridad/tema05-i/Sesion.class.php");
    require_once("../../seguridad/tema05-i/ReproductorAutorizado.class.php");
    require_once("../../seguridad/tema05-i/openssl_encrypt_decrypt.class.php");
    
    
    
    
    //Crear smarty
    $smarty = new Smarty();
    date_default_timezone_set('Europe/Madrid');
    $smarty->config_dir="../../pantallas/tema05-i/configs/";
    $smarty->cache_dir="../../pantallas/tema05-i/cache/";
    $smarty->compile_dir="../../pantallas/tema05-i/templates_c/";
    $smarty->template_dir="../../pantallas/tema05-i/templates/";



    //Compruebo si la sesion ha sido creada, para si no es así el usuariio no estará logueado
    Sesion::start();
    if(!Sesion::validado()){
        header("Location: login.php?mensaje=".urlencode("Usuario inexistente o clave no reconocida"));
            exit;
    }
    //COmpruebo si el usuario tiene autorizaccion para ver la pelicula  
    $codigo = strip_tags(trim($_GET['codigo']));
    $ra = new ReproductorAutorizado();
    $autorizado = $ra->autorizado($codigo, $_SESSION['dni']);
   
    //Si el usuario no está autorizado vuelve al menu principal.
    if($autorizado == false) {
        header("Location: index.php?mensaje=".urlencode("Usuario no autorizado para reproducir este vídeo."));
        exit;
    }

    //Recibo el codigo enviado al hacer click en la pelicula para después usarlo para hacer consultas en la base de datos.
    if(!isset($_GET['codigo']) && empty($_GET['codigo'])) {
        header("Location: index.php");
        exit;
    }
    



    
    $videos = new AccesoVideos();

    //Reproducir video
    //Cojo los datos del video para posteriormente mostrarlos y poder reproducirlo.
    $datosVideo = $videos->getDatosV($codigo);

    //Encripto la ruta
    $ruta = encrypt::encrypt_decrypt('encrypt', $datosVideo["video"]);


    // TODO: Funcion por hacer
    $smarty->assign('ruta', $ruta);
    $smarty->assign('datosVideoS', $datosVideo);
    $smarty->display('play.tpl');
    



?>