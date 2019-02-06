<?php
/* Smarty version 3.1.33, created on 2019-02-06 10:16:58
  from 'C:\UwAmp\pantallas\tema05-i\templates\play.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c5aa60ad92bb9_51336977',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abc2fe96d142ddd35886d16a31d3526daf8cc736' => 
    array (
      0 => 'C:\\UwAmp\\pantallas\\tema05-i\\templates\\play.tpl',
      1 => 1549444614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c5aa60ad92bb9_51336977 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/css.css">
    <title>Movie Player</title>
    <style>
        
        body{
            background-image: url(dasdasd);
            background-color: white!important;
        }
        
        p{
            font-size: 20px;
            
        }
        
        
        #sinopsis{
            margin-left: 20px;
            width: 500px;
        }
        
        #infoPeli{
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid black;
            
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
    </style>
</head>
<body>
    <div id="cerrar">
					<a href='logout.php' id="botonCerrar">Cerrar Sesión</a>
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
    
        
        
    </div>
    </div>

    
</body>
</html><?php }
}
