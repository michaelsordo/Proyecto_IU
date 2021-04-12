<?php

class RESERVA_ADD_USER
{

	//ATRIBUTOS
	var $fila;
	var $calendario;


	//METODOS

	function __construct($fila, $calendario)
	{
		$this->fila = $fila;
		$this->calendario = $calendario;
		$this->render();
	}

	function render()
	{

		include './VIEW/header.php';

?>



		<a class='saludoADD'>-</a><BR><BR><BR>

		<form class="form-horizontal" name="formularioinsertar_reserva" action="index.php" method="post">

			<div class="form-group">
				<label class="control-label col-sm-2 id_calendarios" for="id_calendarios"></label>
				<div class="col-sm-10">
					<select name="id_calendario" class="form-control">
						<?php
						foreach ($this->calendario as $filacalendario) {
							// para cada fila que viene en el resultado de la consulta la escribimos en una fila de la tabla html y cada atributo en una columna
						?>

							<option value='<?php echo $filacalendario['ID_CALENDARIO']; ?>'> <?php echo $filacalendario['NOMBRE_CALENDARIO']; ?> </option>

						<?php
						} ?>
					</select><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 ID_RECURSO" for="id_recurso">ID recurso:</label>
				<div class="col-sm-10">
					<input type="text" name="id_recurso" id="id_recurso" class="form-control" value="<?php echo $this->fila['ID_RECURSO']; ?>" readonly><br>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 nombre_recurso" for="nombre_recurso"></label>
				<div class="col-sm-10">
					<input type="text" name="nombre_recurso" id="nombre_recurso" class="form-control" value="<?php echo $this->fila['NOMBRE_RECURSO']; ?>" readonly><br>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 descripcion_recurso" for="descripcion_recurso"></label>
				<div class="col-sm-10">
					<input type="text" name="descripcion_recurso" id="descripcion_recurso" class="form-control" value="<?php echo $this->fila['DESCRIPCION_RECURSO']; ?>" readonly><br>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 id_horario" for="id_horario">:</label>
				<div class="col-sm-10">
					<input type="text" name="id_horario" id="id_horario" class="form-control" onblur="if (esNoVacio('id_horario')) comprobarSoloNumeros('id_horario',5)">
				</div>
			</div>


			<div class="form-group">
				<label class="control-label col-sm-2 fecha_horario" for="fecha_horario">Fecha horario:</label>
				<div class="col-sm-10">
					<input type="date" name="fecha_horario" id="fecha_horario" class="form-control" onblur="if (esNoVacio('fecha_horario'))">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2 hora_inicio_horario" for="hora_inicio_horario"> Hora inicio horario:</label>
				<div class="col-sm-10">
					<input type="time" name="hora_inicio_horario" id="hora_inicio_horario" class="form-control" onblur="if (esNoVacio('hora_inicio_horario'))">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 hora_fin_horario" for="hora_fin_horario">Hora fin horario:</label>
				<div class="col-sm-10">
					<input type="time" name="hora_fin_horario" id="hora_fin_horario" class="form-control" onblur="if (esNoVacio('hora_fin_horario'))">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 motivo_horario" for="motivo_horario">Motivo horario:</label>
				<div class="col-sm-10">
					<input type="text" name="motivo_horario" id="motivo_horario" class="form-control" onblur="if (esNoVacio('motivo_horario')) comprobarLetrasNumeros('motivo_horario',100)">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 fecha_solicitud_recurso" for="fecha_solicitud_recurso">Fecha solicitud recurso:</label>
				<div class="col-sm-10">
					<input type="date" name="fecha_solicitud_recurso" id="fecha_solicitud_recurso" class="form-control" onblur="if (esNoVacio('fecha_solicitud_recurso'))">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 login_usuario" for="login_usuario">Login usuario:</label>
				<div class="col-sm-10">
					<input type="text" name="login_usuario" id="login_usuario" class="form-control" value="<?php echo $_SESSION['login_usuario']; ?>" readonly><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 es_reserva" for="es_reserva"> Es reserva:</label>
				<div class="col-sm-10">
					<select name="es_reserva" class="form-control">
						<option value='SI'>SI</option>
						<option value='NO'>NO</option>
					</select><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 coste_solicitud" for="coste_solicitud">Coste solicitud:</label>
				<div class="col-sm-10">
					<input type="text" name="coste_solicitud" id="coste_solicitud" class="form-control" value="<?php echo $this->fila['COSTE_SOLICITUD'] = rand(10, 20); ?>" readonly><br>
				</div>
			</div>


			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">

					<img src='./VIEW/icons/anadir.png' height="40" width="40" onclick="insertacampo(document.formularioinsertar_reserva,'action','insertar_reserva'); insertacampo(document.formularioinsertar_reserva,'controlador','HORARIO'); enviaform(document.formularioinsertar_reserva);">
					<!--<input type='submit' name='action' value='editar'>-->


				</div>
			</div>

		</form>

		<img src='./VIEW/icons/volver.png' height="40" width="40" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar_user'); insertacampo(document.formenviar,'controlador','RECURSO');enviaform(document.formenviar);">


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