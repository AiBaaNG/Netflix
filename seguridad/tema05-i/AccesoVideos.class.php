<?php 
require_once("sesionesbd.class.php");
require_once("Video.class.php");
class AccesoVideos {
	//Funcion para devolver los datos de los videos para mostrarlos, le paso DNi para mostrar solo los que puede ver x usuario
	public function getVideos($dni, $orden){
		//Cuando el orden es alfabético hace un order by titulo
		if($orden == "abc"){
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
			//Creo el array video
			$videos=array();
			//Meto los elementos de cada video en el array de videos
			while ($consulta->fetch()){
				array_push($videos,new Video($ccodigo,$ttitulo,$ccartel,$ddescargable,$ccodigo_perfil,$ssinopsis,$vvideo));
			}
			$canal->close();
			return $videos;

		}else{ //Cuando no es alfabético las muestra directamente sin hacer el order by
			$canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
			if ($canal->connect_errno){
				die("Error de conexión con la base de datos ".$canal->connect_error);
			}
			$canal->set_charset("utf8");
			
			$consulta=$canal->prepare("select * from videos where codigo_perfil in (select codigo_perfil from perfil_usuario where dni=?)");
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

	

	//Funcion para sacar los videos por categoria
	function getVideosByCategory($usuario, $tematica){
		//Consulta javier
		// SELECT * from videos v, perfil_usuario p, usuarios u, tematica t, asociado a where u.dni = '11111111A' and p.dni = u.dni and p.codigo_perfil = v.codigo_perfil AND t.descripcion = 'ACCIÓN' and t.codigo = a.codigo_tematica and a.codigo_video = v.codigo



		$canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
			if ($canal->connect_errno){
				die("Error de conexión con la base de datos ".$canal->connect_error);
			}
			$canal->set_charset("utf8");
			
			$consulta=$canal->prepare("SELECT v.codigo, v.titulo, v.cartel, v.descargable, v.codigo_perfil, v.sinopsis, v.video from videos v, perfil_usuario p, usuarios u, tematica t, asociado a where u.dni=? and p.dni = u.dni and p.codigo_perfil = v.codigo_perfil AND t.descripcion =? and t.codigo = a.codigo_tematica and a.codigo_video = v.codigo");
			$consulta->bind_param("ss",$ddni,$ttematica);
			$ddni=$usuario;
			$ttematica = $tematica;
			$consulta->execute();
			$consulta->bind_result($ccodigo,$ttitulo,$ccartel,$ddescargable,$ccodigo_perfil,$ssinopsis,$vvideo);
			$videos=array();
			while ($consulta->fetch()){
				array_push($videos,new Video($ccodigo,$ttitulo,$ccartel,$ddescargable,$ccodigo_perfil,$ssinopsis,$vvideo));
			}
			$canal->close();
			return $videos;
	}

	//Funcion comprobar si un video ha sido vistp
	
	function haSidoVisto($dni){
		$canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
		if ($canal->connect_errno){
			die("Error de conexión con la base de datos ".$canal->connect_error);
		}
		$canal->set_charset("utf8");
		// Consulta para marcar vídeos como "vistos"
		$videosVistos = [];
		$consulta = $canal->prepare("select codigo_video from visionado where dni = ?");
		$consulta->bind_param("s", $ddni);
		$ddni = $dni;
		$consulta->execute();
		$consulta->bind_result($codigo_video);
		while ($consulta->fetch()) {
			array_push($videosVistos, $codigo_video);
		}
		return $videosVistos;
	}
	//Funcion para marcar el video como visto
	function marcarVisto($dni,$codigo_video){
		$canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
			if ($canal->connect_errno){
				die("Error de conexión con la base de datos ");
			}
		$canal->set_charset("utf8");
		$consulta = $canal->prepare("select * from visionado where dni = ? and codigo_video = ?");
		$consulta->bind_param("ss", $dni1, $codigo_video1);
		$dni1 = $dni;
		$codigo_video1 = $codigo_video;
		$consulta->execute();
		$consulta->store_result();
		if ($consulta->num_rows() < 1) {
			$consulta->close();
			$canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
			if ($canal->connect_errno){
				die("Error de conexión con la base de datos ");
			}
			$canal->set_charset("utf8");
			$consulta = $canal->prepare("insert into visionado values (null, ?, ?, current_timestamp, null)");
			$consulta->bind_param("ss", $ddni, $ccodigo_video);
			$ddni = $dni;
			$ccodigo_video = $codigo_video;
			$consulta->execute();
			$consulta->close();
		}
	}

	



	
}
?>