<?php

class CALENDARIO_SEARCH{

function __construct(){
	$this->render();
}

function render(){

	include './VIEW/header.php';
?>

	
	<a class = 'saludoSEARCH'>-</a><BR><BR>

	<form class="form-horizontal" name="formulariobuscar" action="index.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2 id_calendario" for="id_calendario">ID calendario:</label>
    <div class="col-sm-10">
      <input type="text" name="id_calendario" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 nombre_calendario" for="nombre_calendario">Nombre calendario:</label>
    <div class="col-sm-10">
      <input type="text" name="nombre_calendario" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 descripcion_calendario" for="descripcion_calendario">Descripción calendario:</label>
    <div class="col-sm-10">
      <input type="text" name="descripcion_calendario" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 fecha_inicio_calendario" for="fecha_inicio_calendario">Fecha inicio calendario:</label>
    <div class="col-sm-10">
      <input type="date" name="fecha_inicio_calendario"class="form-control">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2 fecha_fin_calendario" for="fecha_fin_calendario">Fecha fin calendario:</label>
    <div class="col-sm-10">
      <input type="date" name="fecha_fin_calendario"class="form-control">
    </div>
  </div>
      <div class="form-group">
    <label class="control-label col-sm-2 hora_inicio_calendario" for="hora_inicio_calendario">Hora inicio calendario:</label>
    <div class="col-sm-10">
      <input type="time" name="fecha_fin_calendario"class="form-control">
    </div>
  </div>
        <div class="form-group">
    <label class="control-label col-sm-2 hora_fin_calendario" for="hora_fin_calendario">Hora fin calendario:</label>
    <div class="col-sm-10">
      <input type="time" name="hora_fin_calendario"class="form-control">
    </div>
  </div>
 


</div>

  <input type='hidden' name='controlador' value='CALENDARIO'>
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


	<?php

	include './VIEW/footer.php';
	
	} //fin de render
} //FIN DE CLASS
?>