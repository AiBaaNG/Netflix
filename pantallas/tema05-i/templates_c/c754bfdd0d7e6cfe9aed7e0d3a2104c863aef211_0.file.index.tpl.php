<?php
/* Smarty version 3.1.33, created on 2019-02-06 00:38:31
  from 'C:\UwAmp\pantallas\tema05-i\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c5a1e7799eb99_40311588',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c754bfdd0d7e6cfe9aed7e0d3a2104c863aef211' => 
    array (
      0 => 'C:\\UwAmp\\pantallas\\tema05-i\\templates\\index.tpl',
      1 => 1549407900,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c5a1e7799eb99_40311588 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="es">
<head>
<meta charset="utf8" />
<title>Tienda ON-Line</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
	<body onload="alert('<?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
')">
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
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['avideos']->value, 'avideo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['avideo']->value) {
?>
					<div class="flota">
					<tr>
					
					<td class="tdImg"><img src="carteles/<?php echo $_smarty_tpl->tpl_vars['avideo']->value->cartel;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['avideo']->value->titulo;?>
" height="200" width="150" /></td>
					
					<td id="titulo">
						<h2><?php echo $_smarty_tpl->tpl_vars['avideo']->value->titulo;?>
</h2>
						<p><?php echo $_smarty_tpl->tpl_vars['avideo']->value->sinopsis;?>
</p>
						<h2><a href="play.php?codigo=<?php echo $_smarty_tpl->tpl_vars['avideo']->value->codigo;?>
">Ver Película</a></h2>
					</td>
					</tr>
					</div>
					
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</table>
			</article>
		</section>

		<footer class="pie">
			<a href="aviso.php" class="boton" >Aviso Legal</a>
		</footer>
	</body>
</html><?php }
}
