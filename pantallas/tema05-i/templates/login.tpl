<!DOCTYPE html>
<html>

<head>
    <title>TITULO</title>
    <meta charset="utf-8">
    <!--<link rel="stylesheet" type="text/css" href="estilos.css" />-->
    <!--<script src="script.js"></script>-->
    <style type="text/css">
       @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

body {
  /*background: rgb(37, 41, 47);*/
  background-image: url("css/img-min.jpg");
  background-size: cover;
  font-family: 'Open Sans', sans-serif;
}

#claseIvan{
  background-color: black;
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  

  
}

label{
  color: white;
}
#ivanHub{
  height: 50px;
  background-color: black;
}
.login {
  width: 400px;
  margin: 16px auto;
  font-size: 16px;
  
}


/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

/* The triangle form is achieved by a CSS hack */
.login-triangle {
  width: 0;
  margin-right: auto;
  margin-left: auto;
  border: 12px solid transparent;
  border-bottom-color: rgb(244, 128, 32);
}

.login-header {
  background: rgb(244, 128, 32);
  padding: 20px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  text-transform: uppercase;
  color: black;
}

.login-container {
  background: black;
  padding: 12px;
  
}

/* Every row inside .login-container is defined with p tags */
.login p {
  padding: 12px;
}

.login input {
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 16px;
  outline: 0;
  font-family: inherit;
  font-size: 0.95em;
}

.login input[type="text"],
.login input[type="password"] {
  background: transparent;
  border-color: orange;
  color: white;
}

/* Text fields' focus effect */
.login input[type="text"]:focus,
.login input[type="password"]:focus {
  border-color: white;
}

.login input[type="submit"] {
  background: rgb(244, 128, 32); 
  border-color: transparent;
  color: black;;
  cursor: pointer;
}

.login input[type="submit"]:hover {
  background: rgb(204, 82, 0);
}

/* Buttons' focus effect */
.login input[type="submit"]:focus {
  border-color: #05a;
}

    </style>
<script>
  function muestraMensaje(mensaje){
    if (mensaje!=''){
      alert(mensaje);
    }
  }
</script>
</head>


<body onload="muestraMensaje({$mensaje_s});">
<div class='login'>

  <div class='login-triangle'></div>
  
  <h2 class='login-header'>
    
    Iniciar sesion
  </h2>
  <div id="fondo">
  <form action='validar.php' method='post' class='login-container'>
    <label for="usuario">Nombre de usuario </label> <input type='text' name='usuario' id='usuario'   /><br />
    <label for="clave">Contraseña</label> <input type='password' name='clave' id='clave'  /><br /> 
    <input type='submit' name='Login' id='login' value='Entrar'   /><br />

  </form>
  </div>
  <div class='login-header' id="claseIvan">
    <img id="ivanHub" src="css/iv.png" class="login-header" />
  </div>
  
</div>



{* <?php
//Este es cuadno ha habido un error en validacion de datos
if(isset($_GET["mensaje"])){
  $mensaje=$_GET["mensaje"];
  echo "<script>alert('$mensaje');</script>";   
}
            
        
                
            
                    
           
        
        
        ?> *}
</body>

</html>
