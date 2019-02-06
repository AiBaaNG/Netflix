<!doctype html>
<html lang="es">
<head>
<meta charset="utf8" />
<title>Tienda ON-Line</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
	<body onload="alert('{$mensaje}')">
		<header id="cabecera">
				<img src="imagenes/titulo.png" alt="Tienda" />
				<div id="cerrar">
					<a href='logout.php' id="botonCerrar">Cerrar Sesión</a>
				</div>
		</header>
		<section id="mostrar">
			<article id="navegacion">
			</article>
			<article id="articulo">

			<img id="ivanHub" src="css/captura.png" class="login-header" />
			<h1>LISTA DE PELICULAS</h1>
			<table id="mostrarCartelera">
				{foreach from=$avideos item=avideo}
					<div class="flota">
					<tr>
					
					<td class="tdImg"><img src="carteles/{$avideo->cartel}" alt="{$avideo->titulo}" height="200" width="150" /></td>
					
					<td id="titulo">
						<h2>{$avideo->titulo}</h2>
						<p>{$avideo->sinopsis}</p>
						<h2><a href="play.php?codigo={$avideo->codigo}">Ver Película</a></h2>
					</td>
					</tr>
					</div>
					
				{/foreach}
			</table>
			</article>
		</section>

		<footer class="pie">
			<a href="aviso.php" class="boton" >Aviso Legal</a>
		</footer>
	</body>
</html>