<?php
/* Smarty version 3.1.33, created on 2019-01-29 13:07:09
  from 'C:\UwAmp\pantallas\tema05\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c5041ed4dbcf2_41481449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2430d11a9c021396b5723bb2e5e9e69b175155ed' => 
    array (
      0 => 'C:\\UwAmp\\pantallas\\tema05\\templates\\index.tpl',
      1 => 1485083172,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c5041ed4dbcf2_41481449 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="es">
<head>
<meta charset="utf8" />
<title>Tienda ON-Line</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
<?php echo '<script'; ?>
 type="text/javascript">
function muestraMensaje(mensaje){
	if (mensaje!='')
		alert(mensaje);
}
<?php echo '</script'; ?>
>
</head>
<body onload="muestraMensaje('<?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
');">
<header id="cabecera">
	<img src="imagenes/titulo.png" alt="Tienda" />
</header>
<section>
<article id="navegacion">
	<div id="carrito">
		<img src="imagenes/basket.png" alt="carrito" class="alinea" />
		<a href="cesta.php"><?php echo $_smarty_tpl->tpl_vars['numero']->value;?>
 productos</a>
	</div>
</article>
<article id="articulo">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['afotos']->value, 'afoto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['afoto']->value) {
?>
	<div class="flota">
	<a href="muestra.php?codigo=<?php echo $_smarty_tpl->tpl_vars['afoto']->value->codigo;?>
" >
		<img src="<?php echo $_smarty_tpl->tpl_vars['afoto']->value->baja;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['afoto']->value->baja;?>
" />
	</a>
	<br>
	<?php echo $_smarty_tpl->tpl_vars['afoto']->value->precio;?>
&euro;
	</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</article>
</section>
<footer class="pie">
<a href="aviso.php" class="boton" >Aviso Legal</a>
</footer>
</body>
</html><?php }
}
