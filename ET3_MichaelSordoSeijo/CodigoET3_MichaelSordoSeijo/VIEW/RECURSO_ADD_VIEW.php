<?php
class RECURSO_ADD{

function __construct(){
	$this->render();
}

function render(){

	include './VIEW/header.php';
?>
	

	<a class = 'saludoADD'>-</a><BR><BR><BR>
	<form class="form-horizontal" name="formularioinsertar" action="index.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2 id_recurso" for="id_recurso">ID recurso:</label>
    <div class="col-sm-10">
      <input type="text" name="id_recurso" id="id_recurso" class="form-control" onblur="if (esNoVacio('id_recurso')) comprobarSoloNumeros('id_recurso',3)">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 nombre_recurso" for="nombre_recurso">Nombre recurso:</label>
    <div class="col-sm-10">
      <input type="text" name="nombre_recurso" id="nombre_recurso" class="form-control" onblur="if (esNoVacio('nombre_recurso')) comprobarLetrasNumeros('nombre_recurso',60)">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 descripcion_recurso" for="descripcion_recurso">Descripción Recurso:</label>
    <div class="col-sm-10">
      <input type="text" name="descripcion_recurso" id="descripcion_recurso" class="form-control" onblur="if (esNoVacio('descripcion_recurso')) comprobarLetrasNumeros('descripcion_recurso',100)">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2 login_responsable" for="login_responsable">Login_responsable:</label>
    <div class="col-sm-10">
      <input type="text" name="login_responsable" id="login_responsable" class="form-control" onblur="if (esNoVacio('login_responsable')) comprobarLetrasNumeros('login_responsable',15)">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2 tarifa_recurso" for="tarifa_recurso"> Tarifa recurso:</label>
    <div class="col-sm-10">
      <input type="text" name="tarifa_recurso"  id="tarifa_recurso" class="form-control" onblur="if (esNoVacio('tarifa_recurso')) comprobarSoloNumeros('tarifa_recurso',3)" >
    </div>
  </div>
     <div class="form-group">
    <label class="control-label col-sm-2 rango_tarifa" for="rango_tarifa"> Rango tarifa:</label>
    <div class="col-sm-10">
      <select name="rango_tarifa" class="form-control">
      <option value='HORA'>HORA</option>
      <option value='DIA'>DIA</option>
      <option value='SEMANA'>SEMANA</option>
      <option value='MES'>MES</option>
    </select><br>
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
  <img src='./VIEW/icons/anadir.png' height="40" width="40" onclick = "insertacampo(document.formularioinsertar,'action','insertar'); insertacampo(document.formularioinsertar,'controlador','RECURSO'); enviaform(document.formularioinsertar);">


    </div>
  </div>

</form>

	<a class='volvermenu'>para volver al menú pulsa</a> <a href='index.php'><img src='./VIEW/icons/volver.png' height="40" width="40"></a>

	<br>
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