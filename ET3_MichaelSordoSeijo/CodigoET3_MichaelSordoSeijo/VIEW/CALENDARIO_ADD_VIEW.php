<?php
class CALENDARIO_ADD
{

	function __construct()
	{
		$this->render();
	}

	function render()
	{

		include './VIEW/header.php';
?>


		<a class='saludoADD'>-</a><BR><BR><BR>
		<form class="form-horizontal" name="formularioinsertar" action="index.php" method="post">
			<div class="form-group">
				<label class="control-label col-sm-2 id_calendario" for="id_calendario">ID calendario:</label>
				<div class="col-sm-10">
					<input type="text" name="id_calendario" id="id_calendario" class="form-control" onblur="if (esNoVacio('id_calendario')) comprobarSoloNumeros('id_calendario',2)">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 nombre_calendario" for="nombre_calendario">Nombre calendario:</label>
				<div class="col-sm-10">
					<input type="text" name="nombre_calendario" id="nombre_calendario" class="form-control" onblur="if (esNoVacio('nombre_calendario')) comprobarLetrasNumeros('nombre_calendario',100)">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 descripcion_calendario" for="descripcion_calendario">Descripción calendario:</label>
				<div class="col-sm-10">
					<input type="text" name="descripcion_calendario" id="descripcion_calendario" class="form-control" onblur="if (esNoVacio('descripcion_calendario')) comprobarLetrasNumeros('descripcion_calendario',100)">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 fecha_inicio_calendario" for="fecha_inicio_calendario">Fecha inicio calendario:</label>
				<div class="col-sm-10">
					<input type="date" name="fecha_inicio_calendario" id="fecha_inicio_calendario" class="form-control" onblur="esNoVacio('fecha_inicio_calendario');">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 fecha_fin_calendario" for="fecha_fin_calendario"> Fecha fin calendario:</label>
				<div class="col-sm-10">
					<input type="date" name="fecha_fin_calendario" id="fecha_fin_calendario" class="form-control" onblur="esNoVacio('fecha_fin_calendario');">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 hora_inicio_calendario" for="hora_inicio_calendario"> Hora inicio calendario:</label>
				<div class="col-sm-10">
					<input type="time" name="hora_inicio_calendario" id="hora_inicio_calendario" class="form-control" onblur="esNoVacio('hora_inicio_calendario');">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 hora_fin_calendario" for="hora_fin_calendario"> Hora fin calendario:</label>
				<div class="col-sm-10">
					<input type="time" name="hora_fin_calendario" id="hora_fin_calendario" class="form-control" onblur="esNoVacio('hora_fin_calendario');">
				</div>
			</div>


			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">

					<img src='./VIEW/icons/anadir.png' height="40" width="40" onclick="insertacampo(document.formularioinsertar,'action','insertar'); insertacampo(document.formularioinsertar,'controlador','CALENDARIO'); enviaform(document.formularioinsertar);">


				</div>
			</div>

		</form>


		<a class='volvermenu'>para volver al menú pulsa</a> <a href='index.php'><img src='./VIEW/icons/volver.png' height="40" width="40"></a>

		<br>
		<br>
		<br>
		<br>


<?php

		include './VIEW/footer.php';
	} //fin de render
} //fin de clase
?>