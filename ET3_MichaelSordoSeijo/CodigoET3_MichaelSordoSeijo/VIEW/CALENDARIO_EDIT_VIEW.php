<?php

class CALENDARIO_EDIT
{

	//ATRIBUTOS
	var $fila;


	//METODOS

	function __construct($fila)
	{
		$this->fila = $fila;
		$this->render();
	}

	function render()
	{

		include './VIEW/header.php';
?>
		Bienvenidos al formulario de edición<BR><BR><BR>


		<form name="formusuarioeditar" action="index.php" method="post">


			<div class="form-group">
				<label class="control-label col-sm-2 id_calendario" for="id_calendario">ID calendario:</label>
				<div class="col-sm-10">
					<input type="text" name="id_calendario" id="id_calendario" class="form-control" value="<?php echo $this->fila['ID_CALENDARIO']; ?>" readonly>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 nombre_calendario" for="nombre_calendario">Nombre calendario:</label>
				<div class="col-sm-10">
					<input type="text" name="nombre_calendario" id="nombre_calendario" class="form-control" value="<?php echo $this->fila['NOMBRE_CALENDARIO']; ?>" onblur="if (esNoVacio('nombre_calendario')) comprobarLetrasNumeros('nombre_calendario',100)">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 descripcion_calendario" for="descripcion_calendario">Descripción calendario:</label>
				<div class="col-sm-10">
					<input type="text" name="descripcion_calendario" id="descripcion_calendario" class="form-control" value="<?php echo $this->fila['DESCRIPCION_CALENDARIO']; ?>" onblur="if (esNoVacio('descripcion_calendario')) comprobarLetrasNumeros('descripcion_calendario',100)">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 fecha_inicio_calendario" for="fecha_inicio_calendario">Fecha inicio calendario:</label>
				<div class="col-sm-10">
					<input type="date" name="fecha_inicio_calendario" id="fecha_inicio_calendario" class="form-control" value="<?php echo $this->fila['FECHA_INICIO_CALENDARIO']; ?>" onblur="if (esNoVacio('fecha_inicio_calendario'))">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 fecha_fin_calendario" for="fecha_fin_calendario"> Fecha fin calendario:</label>
				<div class="col-sm-10">
					<input type="date" name="fecha_fin_calendario" id="fecha_fin_calendario" class="form-control" value="<?php echo $this->fila['FECHA_FIN_CALENDARIO']; ?>" onblur="if (esNoVacio('fecha_fin_calendario'))">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 hora_inicio_calendario" for="hora_inicio_calendario"> Hora inicio calendario:</label>
				<div class="col-sm-10">
					<input type="time" name="hora_inicio_calendario" id="hora_inicio_calendario" class="form-control" value="<?php echo $this->fila['HORA_INICIO_CALENDARIO']; ?>" onblur="if (esNoVacio('hora_inicio_calendario'))">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 hora_fin_calendario" for="hora_fin_calendario"> Hora fin calendario:</label>
				<div class="col-sm-10">
					<input type="time" name="hora_fin_calendario" id="hora_fin_calendario" class="form-control" value="<?php echo $this->fila['HORA_FIN_CALENDARIO']; ?>" onblur="if (esNoVacio('hora_fin_calendario'))">
				</div>
			</div>



			<img src=./VIEW/icons/editar.png height="40" width="40" onclick="insertacampo(document.formusuarioeditar,'action','editar'); insertacampo(document.formusuarioeditar,'controlador','CALENDARIO'); enviaform(document.formusuarioeditar);">
			<!--<input type='submit' name='action' value='editar'>-->

		</form>

		<br><br><img src='./VIEW/icons/volver.png' height="40" width="40" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','CALENDARIO');enviaform(document.formenviar);">

<br>
<br>
<br>
<br>
<br>


<?php

		include './VIEW/footer.php';
	} // fin de render

} //FIN DE CLASE MESSAGE
?>