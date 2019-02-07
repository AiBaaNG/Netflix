<?php
/* Smarty version 3.1.33, created on 2019-02-07 01:45:43
  from 'C:\UwAmp\pantallas\tema05-i\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c5b7fb7e42912_81284176',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c754bfdd0d7e6cfe9aed7e0d3a2104c863aef211' => 
    array (
      0 => 'C:\\UwAmp\\pantallas\\tema05-i\\templates\\index.tpl',
      1 => 1549500342,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c5b7fb7e42912_81284176 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="es">
<head>
<meta charset="utf8" />
<title>Tienda ON-Line</title>
<link rel="stylesheet" type="text/css" href="css/css.css">
 <?php echo '<script'; ?>
>
  function muestraMensaje(mensaje){
    if (mensaje!=""){
      alert(mensaje);
    }
  }
<?php echo '</script'; ?>
>
<style type="text/css">
	body{
		background-image: url(css/img-min-dark.jpg);
	}
	h1, h2{
		color: white;

	}
	#logo{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
        }

	#logout{
            float: right;
    }
    a{
    	text-decoration: none;
    	color: black;
    }


	/*Boton cerrar*/
        .cerrar {
            -moz-box-shadow:inset 0px 1px 0px 0px #f5978e;
            -webkit-box-shadow:inset 0px 1px 0px 0px #f5978e;
            box-shadow:inset 0px 1px 0px 0px #f5978e;
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f24537), color-stop(1, #c62d1f));
            background:-moz-linear-gradient(top, #f24537 5%, #c62d1f 100%);
            background:-webkit-linear-gradient(top, #f24537 5%, #c62d1f 100%);
            background:-o-linear-gradient(top, #f24537 5%, #c62d1f 100%);
            background:-ms-linear-gradient(top, #f24537 5%, #c62d1f 100%);
            background:linear-gradient(to bottom, #f24537 5%, #c62d1f 100%);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f24537', endColorstr='#c62d1f',GradientType=0);
            background-color:#f24537;
            -moz-border-radius:6px;
            -webkit-border-radius:6px;
            border-radius:6px;
            border:1px solid #d02718;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:15px;
            font-weight:bold;
            padding:9px 24px;
            text-decoration:none;
            text-shadow:0px 1px 0px #810e05;
        }
        .cerrar:hover {
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c62d1f), color-stop(1, #f24537));
            background:-moz-linear-gradient(top, #c62d1f 5%, #f24537 100%);
            background:-webkit-linear-gradient(top, #c62d1f 5%, #f24537 100%);
            background:-o-linear-gradient(top, #c62d1f 5%, #f24537 100%);
            background:-ms-linear-gradient(top, #c62d1f 5%, #f24537 100%);
            background:linear-gradient(to bottom, #c62d1f 5%, #f24537 100%);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c62d1f', endColorstr='#f24537',GradientType=0);
            background-color:#c62d1f;
        }
        .cerrar:active {
            position:relative;
            top:1px;
        }
        .volver {
            background-color:#ffa200;
            -moz-border-radius:28px;
            -webkit-border-radius:28px;
            border-radius:28px;
            border:1px solid #000000;
            display:inline-block;
            cursor:pointer;
            color:#000000;
            font-family:Arial;
            font-size:17px;
            padding:16px 31px;
            text-decoration:none;
            text-shadow:0px 1px 0px #bdbdbd;
        }
        .volver:hover {
            background-color:#ff7700;
        }
        .volver:active {
            position:relative;
            top:1px;
        }

        /*Creacion del desplegable*/
        #mainselection select {
		   border: 0;
		   color: black;
		   background: transparent;
		   font-size: 20px;
		   font-weight: bold;
		   padding: 2px 10px;
		   width: 378px;
		   *width: 350px;
		   *background: #ffa200;
		   -webkit-appearance: none;
		}

		#mainselection {
		   overflow:hidden;
		   width:350px;
		   -moz-border-radius: 9px 9px 9px 9px;
		   -webkit-border-radius: 9px 9px 9px 9px;
		   border-radius: 9px 9px 9px 9px;
		   box-shadow: 1px 1px 11px #330033;
		   background: #ffa200 url("http://i62.tinypic.com/15xvbd5.png") no-repeat scroll 319px center;
		}

		


</style>
</head>
	<body onload="muestraMensaje('<?php echo $_smarty_tpl->tpl_vars['datosVideoS']->value['mensaje'];?>
')">
		<header id="cabecera">
			<div id="botones">
		        <div id="logout"><a href='logout.php' id="botonCerrar" class="cerrar">Cerrar Sesión</a></div>  
		        <div id="ordenar">
					

					
					<h2>Filtrar por categorías</h2>
					<div id="filtrar">
						<form action="index.php?" method="post">
							<div id="mainselection" >
								<select name="categorias[]">
								  <option value="ACCIÓN">ACCIÓN</option>
								  <option value="BÉLICA">BÉLICA</option>
								  <option value="FANTÁSTICA">FANTÁSTICA</option>
								  <option value="INFANTIL">INFANTIL</option>
								  <option value="AVENTURAS">AVENTURAS</option>
								  <option value="ROMÁNTICA">ROMÁNTICA</option>
								  <option value="ABURRIDA">ABURRIDA</option>
								</select>
							</div>
							<input type="submit" name="submit" value="Mostrar" class="volver" />
						</form>
					</div>
					<br /><br />
					<button class="volver"><a href="index.php?v=abc">Ordenar alfabéticamente</a></button>
	                
	            </div>        
			</div>
		</header>
		<section id="mostrar">
			<article id="articulo">

			<div id="logo">
		        <img id="ivanHub" src="css/captura.png" class="login-header" />
		    </div>
			<h1>LISTA DE PELICULAS</h1>
			<table id="mostrarCartelera">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datosVideoS']->value['avideos'], 'avideo');
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

	</body>
</html><?php }
}
