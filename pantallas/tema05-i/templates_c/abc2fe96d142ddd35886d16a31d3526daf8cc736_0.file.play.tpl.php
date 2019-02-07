<?php
/* Smarty version 3.1.33, created on 2019-02-07 01:13:45
  from 'C:\UwAmp\pantallas\tema05-i\templates\play.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c5b7839ed1f69_93319542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abc2fe96d142ddd35886d16a31d3526daf8cc736' => 
    array (
      0 => 'C:\\UwAmp\\pantallas\\tema05-i\\templates\\play.tpl',
      1 => 1549498422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c5b7839ed1f69_93319542 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/css.css">
    <title>Movie Player</title>
    <style>
        h1{
            color: white;
        }
        body{
        background-image: url(css/img-min-dark.jpg);
        }
        
        p{
            font-size: 20px;
            
        }
        
        
        #sinopsis{
            margin-left: 20px;
            width: 500px;
        }

        #logo{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
        
        #infoPeli{
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid black;
            background-color: white;
            
        }
        #padre, #reproductorVideo{
            display: flex;
            justify-content: center;
            align-items: center;

        }
        
        #reproductorVideo{
            margin-top: 50px;
        }
        
        
        #imagen{
            margin-left: 0px;
            flex: auto;
        }

       

        #back{
            float: left;
        }

        #logout{
            float: right;
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

        
    </style>
</head>
<body>
    <div id="botones">
        <div id="back"><a href='index.php' id="botonCerrar" class="volver">< Back</a></div>
        <div id="logout"><a href='logout.php' id="botonCerrar" class="cerrar">Cerrar Sesión</a></div>          
	</div>
    <div id="logo">
        <img id="ivanHub" src="css/captura.png" class="login-header" />
    </div>
    <h1><?php echo $_smarty_tpl->tpl_vars['datosVideoS']->value['titulo'];?>
</h1>
    <div id="padre">
    <div id="infoPeli">
        
        <br />
        <img src="carteles/<?php echo $_smarty_tpl->tpl_vars['datosVideoS']->value['cartel'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['datosVideoS']->value['titulo'];?>
" width="200px;" id="imagen">
            <p id="sinopsis"><?php echo $_smarty_tpl->tpl_vars['datosVideoS']->value['sinopsis'];?>
</p>
            <button>
                <a href="player.php?v=<?php echo $_smarty_tpl->tpl_vars['datosVideoS']->value['video'];?>
">Ver Película</a>
            </button>
            <?php if ($_smarty_tpl->tpl_vars['datosVideoS']->value['descargable'] == 'S') {?>
                <div class="descargar">
                    <form action="descargar.php" method="post">
                        <input type="hidden" name="codigo" value="<?php echo $_smarty_tpl->tpl_vars['datosVideoS']->value['video'];?>
">
                        <input type="hidden" name="titulo" value="<?php echo $_smarty_tpl->tpl_vars['datosVideoS']->value['titulo'];?>
">
                        <input type="submit" name="descargar" value="Descargar">
                    </form>
                    
                </div>
            <?php }?>
    
        
        
    </div>
    </div>

    
</body>
</html><?php }
}
