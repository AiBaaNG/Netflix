<?php
    require_once("../../seguridad/tema05-i/VideoStream.class.php");
    $enlace = strip_tags(trim($_GET['v']));

   
    //Cojo el enlace que me envian por GET y lo añado a la ruta en la que están mis videos.

    $ruta_video = '../../videos/videos/' . $enlace;

    $stream = new VideoStream($ruta_video);
    $stream->start();
    
?>