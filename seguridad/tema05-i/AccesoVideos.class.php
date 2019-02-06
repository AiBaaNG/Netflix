<?php 
require_once("sesionesbd.class.php");
class AccesoVideos {
	
	public function getVideo($codigo){
		$canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
		if ($canal->connect_errno){
			die("Error de conexión con la base de datos ");
		}
		$canal->set_charset("utf8");
		$consulta=$canal->prepare("select * from videos where codigo=? order by titulo");
		$consulta->bind_param("s",$cod);
		$cod=$codigo;
		$consulta->execute();
		$consulta->bind_result($ccodigo,$ttitulo,$ccartel,$ddescargable,$ccodigo_perfil,$ssinopsis,$vvideo);
		$consulta->store_result();
		
		if ($consulta->num_rows!=1){
			$canal->close();
			return null;
		}
		$consulta->fetch();
		$canal->close();
		return new Foto($ccodigo,$ttitulo,$ccartel,$ddescargable,$ccodigo_perfil,$ssinopsis,$vvideo);
	}
	
	public function getVideos($dni){
		$canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
		if ($canal->connect_errno){
			die("Error de conexión con la base de datos ".$canal->connect_error);
		}
		$canal->set_charset("utf8");
		
		$consulta=$canal->prepare("select * from videos where codigo_perfil in (select codigo_perfil from perfil_usuario where dni=?) order by titulo
		");
		$consulta->bind_param("s",$ddni);
		$ddni=$dni;
		$consulta->execute();
		$consulta->bind_result($ccodigo,$ttitulo,$ccartel,$ddescargable,$ccodigo_perfil,$ssinopsis,$vvideo);
		$videos=array();
		while ($consulta->fetch()){
			array_push($videos,new Video($ccodigo,$ttitulo,$ccartel,$ddescargable,$ccodigo_perfil,$ssinopsis,$vvideo));
		}
		$canal->close();
		return $videos;
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