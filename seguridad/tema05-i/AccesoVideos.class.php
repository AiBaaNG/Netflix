<?php 
require_once("../../seguridad/tema05-i/sesionesbd.class.php");
class AccesoVideos {
	
	public function getVideo($codigo){
		$canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
		if ($canal->connect_errno){
			die("Error de conexión con la base de datos ");
		}
		$canal->set_charset("utf8");
		$consulta=$canal->prepare("select * from videos where codigo=?");
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
	
	public function getVideos(){
		$canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
		if ($canal->connect_errno){
			die("Error de conexión con la base de datos ".$canal->connect_error);
		}
		$canal->set_charset("utf8");
		
		$consulta=$canal->prepare("select * from videos");
		$consulta->execute();
		$consulta->bind_result($ccodigo,$ttitulo,$ccartel,$ddescargable,$ccodigo_perfil,$ssinopsis,$vvideo);
		$videos=array();
		while ($consulta->fetch()){
			array_push($videos,new Video($ccodigo,$ttitulo,$ccartel,$ddescargable,$ccodigo_perfil,$ssinopsis,$vvideo));
		}
		$canal->close();
		return $videos;
	}
	
	// public function crearCompra($numeroCompra,$nif,$nombre,$direccion,$fotos){
	// 	$canal=new mysqli(sesionesbd::IP, sesionesbd::USUARIO, sesionesbd::CLAVE, sesionesbd::BD);
	// 	if ($canal->connect_errno){
	// 		die("Error de conexión con la base de datos");
	// 	}
	// 	$canal->set_charset("utf8");
		
	// 	$canal->autocommit(false);
	// 	//elimina pedido por si ya existía
	// 	$sql="delete from ventas where identificacion=?";
	// 	if (!$consulta=$canal->prepare($sql)){
	// 		die ("sentencia errónea ".$canal->error);
	// 	}
	// 	$consulta->bind_param("s",$numeroC);
	// 	$numeroC=$numeroCompra;
	// 	if (!$consulta->execute()){
	// 		die("Error en la base de datos");
	// 	}
	// 	$consulta->close();
	// 	unset($consulta);
	// 	unset($nnumeroCompra);	
			
	// 	//graba el pedido
		
	// 	$sql="insert into ventas (identificacion, nif, nombre, direccion) values (?,?,?,?)";
	// 	$consulta=$canal->prepare($sql);
	// 	$consulta->bind_param("ssss",$nnumeroCompra,$nnif,$nnombre,$ddireccion);
	// 	$nnumeroCompra=$numeroCompra;
	// 	$nnif=$nif;
	// 	$nnombre=$nombre;
	// 	$ddireccion=$direccion;
	// 	if (!$consulta->execute()){
	// 		$canal->rollback();
	// 		die("Error en la base de datos ");
	// 	}
	// 	$consulta->close();
		
	// 	unset($consulta);
	// 	$consulta=$canal->prepare("insert into lineas values (?,?)");
	// 	$consulta->bind_param("ss",$nnumeroCompra,$ccodigo);
	// 	$nnumeroCompra=$numeroCompra;
	// 	foreach($fotos as $afoto){
	// 		$ccodigo=$afoto->codigo;
	// 		if(!$consulta->execute()){
	// 			$canal->rollback();
	// 			die("Error en la base de datos 2");
	// 		}
	// 	}
	// 	$consulta->close();
	// 	unset($consulta);
	// 	if (!$canal->commit()){
	// 		$canal->rollback();
	// 		die("Operación no completada");
	// 	}
	// 	$canal->close();
	// }
	
	
}
?>