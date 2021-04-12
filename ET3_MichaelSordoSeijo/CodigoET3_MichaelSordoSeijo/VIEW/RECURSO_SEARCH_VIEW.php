<?php

class RECURSO_SEARCH{

function __construct(){
	$this->render();
}

function render(){

	include './VIEW/header.php';
?>

	
	<a class = 'saludoSEARCH'>-</a><BR><BR>

	<form class="form-horizontal" name="formulariobuscar" action="index.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2 id_recurso" for="id_recurso">ID recurso:</label>
    <div class="col-sm-10">
      <input type="text" name="id_recurso" class="form-control">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2 nombre_recurso" for="nombre_recurso">Nombre recurso:</label>
    <div class="col-sm-10">
      <input type="text" name="nombre_recurso" class="form-control">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2 descripcion_recurso" for="descripcion_recurso">Descripción Recurso:</label>
    <div class="col-sm-10">
      <input type="text" name="descripcion_recurso" class="form-control">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2 login_responsable" for="login_responsable">Login_responsable:</label>
    <div class="col-sm-10">
      <input type="text" name="login_responsable"class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 tarifa_recurso" for="tarifa_recurso"> Tarifa recurso:</label>
    <div class="col-sm-10">
      <input type="text" name="tarifa_recurso" class="form-control">
    </div>
  </div>

  <div class="form-group">
	<label class='rango_tarifa control-label col-sm-2'>Rango Tarifa</label>
									<div class="col-sm-10">
									<select name='rango_tarifa' class="form-control">
									<option value=''>-------</option>
									<option value='HORA'>HORA</option>
									<option value='DIA'>DIA</option>
									<option value='SEMANA'>SEMANA</option>
									<option value='MES'>MES</option>
									</select><br>
									</div>

</div>

	<input type='hidden' name='controlador' value='RECURSO'>
	<input type='submit' name='action' value='buscar'>

	</form>


	para volver al menú pulsa <a href="index.php">aqui</a>

	</body>
	</html>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>



	<?php

	include './VIEW/footer.php';
	
	} //fin de render
} //FIN DE CLASS
?>