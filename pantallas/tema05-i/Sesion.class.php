<?php

    class Sesion{
        public static function start(){
            session_cache_limiter('nocache');
            session_start();
        }


        public static function validado(){
            return isset($_SESSION['validado']);
        }


        public static function validarUsuario($nombre, $dni){
            $_SESSION['validado'] = true;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['dni'] = $dni;

        }
    }


?>