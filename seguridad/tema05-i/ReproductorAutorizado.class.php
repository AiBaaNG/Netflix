<?php
require_once("../../seguridad/tema05-i/sesionesbd.class.php");
	class ReproductorAutorizado {
        //Funcion para comprobar si el usuario está autorizado o no para ver la pelicula
		public function autorizado($codigo, $dni) {
            $canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
            if ($canal->connect_errno){
                die("Error de conexión con la base de datos ");
            }
            $canal->set_charset("utf8");
            $consulta=$canal->prepare("select count(*) from videos where codigo=? and codigo_perfil in (select codigo_perfil from perfil_usuario where dni=?)");
            $consulta->bind_param("ss",$cod, $ddni);
            $cod = $codigo;
            $ddni = $dni;
            $consulta->execute();
            $consulta->bind_result($ret);
            $consulta->fetch();
            $consulta->close();
            if($ret == 1){
                return true;
            }else{
                return false;
            }
            
	    }
		//Funcion para devolver los datos del video que reproduciremos
		public function getDatosV($codigo) {

            $canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
            if ($canal->connect_errno){
                die("Error de conexión con la base de datos ");
            }
            $canal->set_charset("utf8");
            $consulta=$canal->prepare("select * from videos where codigo=?");
            $consulta->bind_param("s",$cod);
            $cod = $codigo;
            $consulta->execute();
            $resultado = $consulta->get_result();
			$avideo = $resultado->fetch_assoc();
			$consulta->close();
            return $avideo;





		}
	    
	}
?>