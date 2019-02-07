<?php 
require_once("sesionesbd.class.php");
require_once("Video.class.php");
class AccesoVideos {
	
	// public function getVideo($codigo){
	// 	$canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
	// 	if ($canal->connect_errno){
	// 		die("Error de conexión con la base de datos ");
	// 	}
	// 	$canal->set_charset("utf8");
	// 	$consulta=$canal->prepare("select * from videos where codigo=? order by titulo");
	// 	$consulta->bind_param("s",$cod);
	// 	$cod=$codigo;
	// 	$consulta->execute();
	// 	$consulta->bind_result($ccodigo,$ttitulo,$ccartel,$ddescargable,$ccodigo_perfil,$ssinopsis,$vvideo);
	// 	$consulta->store_result();
		
	// 	if ($consulta->num_rows!=1){
	// 		$canal->close();
	// 		return null;
	// 	}
	// 	$consulta->fetch();
	// 	$canal->close();
	// 	return new Foto($ccodigo,$ttitulo,$ccartel,$ddescargable,$ccodigo_perfil,$ssinopsis,$vvideo);
	// }
	
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
		$canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
		if ($canal->connect_errno){
			die("Error de conexión con la base de datos ".$canal->connect_error);
		}
		$canal->set_charset("utf8");
        $end = array();
        $consulta = $canal->prepare( 'select codigo_perfil from perfil_usuario where dni=?' );
        $consulta->bind_param('s', $usuario);
        $consulta->bind_result($count);
        $consulta->execute();
        while ($consulta->fetch()) {
            array_push($end, $count);
        }
        $consulta->close();
 
        $v = array();
        foreach ($end as $key => $value) {
            $consulta2 = $canal->prepare( 'select * from videos where codigo in (select codigo_video from asociado where codigo_tematica in (select codigo from tematica where descripcion=?)) and codigo_perfil=?' );
            $consulta2->bind_param('ss', $tematica, $value);
            $consulta2->execute();
            $res = $consulta2->get_result();
            $video = $res->fetch_assoc();
            $consulta2->close();
            array_push($v, $video);
        }
 
        $fin = array();
        foreach ($v as $key => $value) {
            if(!empty($key)) {
                array_push($fin,new Video($value['codigo'], $value['titulo'], $value['cartel'], $value['descargable'], $value['codigo_perfil'], $value['sinopsis'], $value['video']));
            }
        }
 
        return $fin;
    }




	
}
?>