<?php
/* Smarty version 3.1.33, created on 2019-01-29 13:13:31
  from 'C:\UwAmp\pantallas\tema05\templates\muestra.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c50436b152ec2_51935841',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '209aefde1805ac939ef89852eec28c550f860573' => 
    array (
      0 => 'C:\\UwAmp\\pantallas\\tema05\\templates\\muestra.tpl',
      1 => 1485083174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c50436b152ec2_51935841 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="es">
<head>
<meta charset="utf8" />
<title>Tienda ON-Line</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
<header id="cabecera">
	<img src="imagenes/titulo.png" alt="Tienda" />
</header>
<section>
<article id="navegacion">
	<a href="index.php"><img src="imagenes/volver.gif" alt="volver" /></a>
	<div id="carrito">
		<img src="imagenes/basket.png" alt="carrito" class="alinea" />
		<a href="cesta.php"><?php echo $_smarty_tpl->tpl_vars['numero']->value;?>
 productos</a>
	</div>
</article>
<article id="articulo" class="centrar">
<img src="<?php echo $_smarty_tpl->tpl_vars['afoto']->value->baja;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['afoto']->value->codigo;?>
" />
<p><span class="grande">Descripción: <?php echo $_smarty_tpl->tpl_vars['afoto']->value->descripcion;?>
</span></p>
<p><span class="grande">Precio: <?php echo $_smarty_tpl->tpl_vars['afoto']->value->precio;?>
&euro;</span></p>
<p>
	<form action="anyadir.php" method="post">
	<input type="hidden" name="codigo" value="<?php echo $_smarty_tpl->tpl_vars['afoto']->value->codigo;?>
" />
	<input type="image" src="imagenes/botoncomprar.png" alt="añadir al carrito" />
	</form>
</p>
</article>
</section>
</body>
</html><?php }
}
