<?php
class USUARIO_ADD{

function __construct(){
	$this->render();
}

function render(){

	include './VIEW/header.php';
?>
	

	<a class = 'saludoADD'>-</a><BR><BR><BR>

<form class="form-horizontal" name="formularioinsertar" action="index.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2 login_usuario" for="login_usuario">Login usuario:</label>
    <div class="col-sm-10">
      <input type="text" name="login_usuario" id="login_usuario" class="form-control" onblur="if (esNoVacio('login_usuario')) comprobarLetrasNumeros('login_usuario',15)">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 pass_usuario" for="pass_usuario">Contraseña usuario:</label>
    <div class="col-sm-10">
      <input type="password" id="pass_usuario" name="pass_usuario" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 nombre_usuario" for="nombre_usuario">Nombre usuario:</label>
    <div class="col-sm-10">
      <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" onblur="if (esNoVacio('nombre_usuario')) comprobarLetrasNumeros('nombre_usuario',60)">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2 email_usuario" for="email_usuario">Email usuario:</label>
    <div class="col-sm-10">
      <input type="text" name="email_usuario" id="email_usuario" class="form-control" onblur="if (esNoVacio('email_usuario')) comprobarEmail('email_usuario',40);">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 es_admin" for="es_admin"> Administrador</label>
    <div class="col-sm-10">
      <select name="es_admin" class="form-control">
      <option value='SI'>SI</option>
      <option value='NO'>NO</option>
    </select><br>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-2 es_activo" for="es_activo"> Activo</label>
    <div class="col-sm-10">
      <select name="es_activo" class="form-control">
      <option value='SI'>SI</option>
      <option value='NO'>NO</option>
    </select><br>
    </div>
   
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
	<button class="btnsesion2" onclick = "insertacampo(document.formularioinsertar,'action','insertar'); insertacampo(document.formularioinsertar,'controlador','USUARIO'); enviaform(document.formularioinsertar); enviaformcorrecto(document.formularioinsertar, encriptar());"> <img src="./VIEW/icons/anadir.png" alt="Icono para añadir" height="60" width="60"> </button><br>

    </div>
  </div>

</form>


	<!--<a class='volvermenu'>para volver al menú pulsa</a> <a href='index.php'><img src='./VIEW/icons/volver.png' height="40" width="40"></a>
  -->
<img src='./VIEW/icons/volver.png' height="40" width="40" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','USUARIO');enviaform(document.formenviar);">

<br>
<br>
<br>
<br>
<br>


	<?php

	include './VIEW/footer.php';
	} //fin de render
} //fin de clase
?>