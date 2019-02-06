<?php
    require_once("../../seguridad/tema05-i/VideoStream.class.php");
    $enc_link = strip_tags(trim($_GET['v']));

    /**
     * Comprueba que el random que se le ha pasado por los datos es el mismo que 
     * se generó y guardo en la variable de sesion al pulsar en la pelicula a visualizar,
     * en caso de no ser iguales, te devuelve al panel. (Un extra de seguridad, pero si te roban,
     * la id de sesion estas jodido igual.)
     */

    $ruta_video = '../../videos/videos/' . $enc_link;

    $stream = new VideoStream($ruta_video);
    $stream->start();
    
?>