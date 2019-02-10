<?php
include_once( '../../Smarty/libs/Smarty.class.php' );
require_once("../../seguridad/tema05-i/Video.class.php");
require_once("../../seguridad/tema05-i/AccesoVideos.class.php");
require_once("../../seguridad/tema05-i/Pantalla.class.php");
require_once("../../seguridad/tema05-i/Sesion.class.php");
require_once("../../seguridad/tema05-i/ReproductorAutorizado.class.php");
require_once("../../seguridad/tema05-i/openssl_encrypt_decrypt.class.php");

    //Compruebo si la sesion ha sido creada, para si no es así el usuariio no estará logueado
    Sesion::start();
    if(!Sesion::validado()){
        header("Location: login.php?mensaje=".urlencode("Usuario inexistente o clave no reconocida"));
            exit;
    }
    //Compruebo si el usuario esstá autorizado para descargar la pelicula
    $ra = new ReproductorAutorizado();
    $codigo = strip_tags(trim($_GET['c']));
    $autorizado = $ra->autorizado($codigo, $_SESSION['dni']);
   
    //Si el usuario no está autorizado vuelve al menu principal.
    if($autorizado == false) {
        header("Location: index.php?mensaje=".urlencode("Usuario no autorizado para reproducir este vídeo."));
        exit;
    }

    
    // Vídeo a descargar
    $video = "";
    if (isset($_POST["codigo"])) {
        $video = $_POST["codigo"];
    }
    //Desencripto la ruta
    $video = encrypt::encrypt_decrypt('decrypt', $video);

    $titulo = "";
    if (isset($_POST["titulo"])) {
        $titulo = $_POST["titulo"];
    }
    // Nombre del archivo
    $nombreDescarga = $titulo . ".zip";
    // Compresión del vídeo
    $zip = new ZipArchive();
    if ($zip->open($nombreDescarga, ZIPARCHIVE::CREATE)) {
        $zip->addFile("../../videos/videos/$video", $titulo . ".mp4");
        $zip->close();
        // Si el archivo existe, se descarga
        if (file_exists($nombreDescarga)) {
            header("Content-type: application/zip");
            header("Content-Disposition: attachment; filename=$nombreDescarga");
            readfile($nombreDescarga);
        }
        unlink($nombreDescarga);
        exit;
    } else {
        header("Location: play.php?mensaje=" . urlencode("ERROR"));
        exit;
    }
?>