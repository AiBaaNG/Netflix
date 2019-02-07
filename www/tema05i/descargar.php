<?php
include_once( '../../Smarty/libs/Smarty.class.php' );
require_once("Video.class.php");
require_once("../../seguridad/tema05-i/AccesoVideos.class.php");
require_once("Pantalla.class.php");
require_once("../../seguridad/tema05-i/Sesion.class.php");
require_once("../../seguridad/tema05-i/ReproductorAutorizado.class.php");

    //Compruebo si la sesion ha sido creada, para si no es así el usuariio no estará logueado
    Sesion::start();
    if(!Sesion::validado()){
        header("Location: login.php?mensaje=".urlencode("Usuario inexistente o clave no reconocida"));
            exit;
    }
    // Vídeo a descargar
    $video = "";
    if (isset($_POST["codigo"])) {
        $video = $_POST["codigo"];
    }
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