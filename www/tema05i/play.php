<?php
    include_once( '../../Smarty/libs/Smarty.class.php' );
    require_once("Video.class.php");
    require_once("AccesoVideos.class.php");
    require_once("Pantalla.class.php");
    require_once("../../seguridad/tema05-i/Sesion.class.php");
    require_once("../../seguridad/tema05-i/ReproductorAutorizado.class.php");
    
    
    
    
    //Crear smarty
    $smarty = new Smarty();
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

    /**
     * En caso de que no este el parametro codigo, o este este vacio, vuelve al login.
     */
    if(!isset($_GET['codigo']) && empty($_GET['codigo'])) {
        header("Location: index.php");
        exit;
    }
    $codigo = strip_tags(trim($_GET['codigo']));



    $ra = new ReproductorAutorizado();
    $autorizado = $ra->autorizado($codigo, $_SESSION['dni']);
   
    //Si el usuario no está autorizado vuelve al menu principal
    if($autorizado == false) {
        header("Location: index.php?mensaje=".urlencode("Usuario no autorizado para reproducir este vídeo."));
        exit;
    }

    echo "<script>alert('Si que puede visualizar');</script>";

    //Reproducir video
    $datosVideo = $ra->getDatosV($codigo);
    //Funcion por hacer
    $enlace = crearLinkVideo($codigo_peli);
    $ra->close();
    $smarty->assign('datosVideoS', $datosVideo);
    $smarty->assign('enlaceS', $enlace);
    $smarty->display('play.tpl');;
?>