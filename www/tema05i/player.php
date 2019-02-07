<?php
    require_once("../../seguridad/tema05-i/VideoStream.class.php");
    require_once("../../seguridad/tema05-i/AccesoVideos.class.php");
    require_once("../../seguridad/tema05-i/ReproductorAutorizado.class.php");
    require_once("../../seguridad/tema05-i/Sesion.class.php");
    $enlace = strip_tags(trim($_GET['v']));
    $codigo = strip_tags(trim($_GET['c']));


    //Compruebo si la sesion ha sido creada, para si no es así el usuariio no estará logueado
    Sesion::start();
    if(!Sesion::validado()){
        header("Location: login.php?mensaje=".urlencode("Usuario inexistente o clave no reconocida"));
            exit;
    }
    //COmpruebo si el usuario tiene autorizaccion para ver la pelicula
    $ra = new ReproductorAutorizado();
    $autorizado = $ra->autorizado($codigo, $_SESSION['dni']);
   
    //Si el usuario no está autorizado vuelve al menu principal.
    if($autorizado == false) {
        header("Location: index.php?mensaje=".urlencode("Usuario no autorizado para reproducir este vídeo."));
        exit;
    }

    //Marco el video como visto
    $bd=new AccesoVideos();
    $bd->marcarVisto($_SESSION['dni'],$codigo);
   
    //Cojo el enlace que me envian por GET y lo añado a la ruta en la que están mis videos.

    $ruta_video = '../../videos/videos/' . $enlace;

    $stream = new VideoStream($ruta_video);
    $stream->start();






    
    ?>