<!DOCTYPE html>
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
    <h1>{$datosVideoS.titulo}</h1>
    <div id="padre">
    <div id="infoPeli">
        
        <br />
        <img src="carteles/{$datosVideoS.cartel}" alt="{$datosVideoS.titulo}" width="200px;" id="imagen">
            <p id="sinopsis">{$datosVideoS.sinopsis}</p>
            <button>
                <a href="player.php?v={$datosVideoS.video}">Ver Película</a>
            </button>
    
        
        
    </div>
    </div>

    
</body>
</html>