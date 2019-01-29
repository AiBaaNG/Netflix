<?php
/* Smarty version 3.1.33, created on 2019-01-29 13:13:29
  from 'C:\UwAmp\pantallas\tema05\templates\cesta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c504369041705_48010974',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12a129b361b5ad51de9c52bd05d4b2e5fca18895' => 
    array (
      0 => 'C:\\UwAmp\\pantallas\\tema05\\templates\\cesta.tpl',
      1 => 1485083172,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c504369041705_48010974 (Smarty_Internal_Template $_smarty_tpl) {
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
	<a href="index.php"><img src="imagenes/volver.gif" alt="volver" /></a>
	<div id="carrito">
		<img src="imagenes/basket.png" alt="carrito" class="alinea" />
		<span style="color:blue"><?php echo $_smarty_tpl->tpl_vars['numero']->value;?>
 productos</span>
	</div>
</article>
<article id="articulo" class="centrar">
<?php if ($_smarty_tpl->tpl_vars['numero']->value == 0) {?>
	No hay artículos
<?php } else { ?>
	<?php $_smarty_tpl->_assignInScope('totalFactura', 0);?>
	<table>
	<caption>Productos en la cesta</caption>
	<tr>
	<th>Imagen</th><th>Precio</th><th></th>
	</tr>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['afotos']->value, 'afoto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['afoto']->value) {
?>
		<?php $_smarty_tpl->_assignInScope('totalFactura', $_smarty_tpl->tpl_vars['totalFactura']->value+$_smarty_tpl->tpl_vars['afoto']->value->precio);?>
		<tr>
			<td>
				<img src="<?php echo $_smarty_tpl->tpl_vars['afoto']->value->baja;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['afoto']->value->codigo;?>
" />
			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['afoto']->value->precio;?>
&euro;
			</td>
			<td>
				<form action="eliminar.php" method="post">
					<input type="image" src="imagenes/borrar.png" alt="eliminar del carrito" />
					<input type="hidden" name="codigo" value="<?php echo $_smarty_tpl->tpl_vars['afoto']->value->codigo;?>
" />
				</form>
			</td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</table>
	<div id="comprar">
		<p>Total Pedido: <?php echo $_smarty_tpl->tpl_vars['totalFactura']->value;?>
&euro;</p>
		<form action="comprar.php" method="post">

		NIF: <input type="text" name="nif" size="9" maxlength="9" value="<?php echo $_smarty_tpl->tpl_vars['nif']->value;?>
" />
		<br />
		Nombre: <input type="text" name="nombre" value="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
" />
		<br />
		Dirección: <input type="text" name="direccion" value="<?php echo $_smarty_tpl->tpl_vars['direccion']->value;?>
" />
		<br />
		<input type="image" src="imagenes/boton-comprar-ahora.png" alt="comprar" />
		</form>
	</div>
<?php }?>
</article>
</section>
</body>
</html><?php }
}
