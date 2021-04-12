<?php

class INFORME_SEARCH{

function __construct(){
	$this->render();
}

function render(){

	include './VIEW/header.php';
?>

	
	<a class = 'saludoSEARCH'>-</a><BR><BR>

	<form class="form-horizontal" name="formulariobuscar" action="index.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2 nombre_recurso" for="nombre_recurso">Nombre Recurso:</label>
    <div class="col-sm-10">
      <input type="text" name="nombre_recurso" class="form-control">
    </div>
  </div>
  <div class="form-group">
	<label class='fue_usado control-label col-sm-2'>Fue usado</label>
									<div class="col-sm-10">
									<select name='fue_usado' class="form-control">
									<option value=''>-------</option>
									<option value='SI'>SI</option>
									<option value='NO'>NO</option>
									</select><br>
									</div>

</div>
<div class="form-group">
    <label class="control-label col-sm-2 fecha_solicitud_recurso" for="fecha_solicitud_recurso">Fecha:</label>
    <div class="col-sm-10">
      <input type="date" name="fecha_solicitud_recurso" class="form-control">
    </div>
  </div>

	<input type='hidden' name='controlador' value='INFORME'>
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