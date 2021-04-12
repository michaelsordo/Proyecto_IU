<?php
class HORARIO_ADD
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
				<label class="control-label col-sm-2 id_horario" for="id_horario">ID horario:</label>
				<div class="col-sm-10">
					<input type="text" name="id_horario" id="id_horario" class="form-control" onblur="if (esNoVacio('id_horario')) comprobarSoloNumeros('id_horario',5)">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 id_calendario" for="id_calendario">Id calendario:</label>
				<div class="col-sm-10">
					<input type="text" name="id_calendario" id="id_calendario" class="form-control" onblur="if (esNoVacio('id_calendario')) comprobarSoloNumeros('id_calendario',2)">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 id_recurso" for="id_recurso">ID recurso:</label>
				<div class="col-sm-10">
					<input type="text" name="id_recurso" id="id_recurso" class="form-control" onblur="if (esNoVacio('id_recurso')) comprobarSoloNumeros('id_recurso',3)">
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
					<input type="text" name="login_usuario" id="login_usuario" class="form-control" onblur="if (esNoVacio('login_usuario')) comprobarLetrasNumeros('login_usuario',15)">
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
				<label class="control-label col-sm-2 es_rechazada" for="es_rechazada"> Es rechazada:</label>
				<div class="col-sm-10">
					<select name="es_rechazada" class="form-control">
						<option value='SI'>SI</option>
						<option value='NO'>NO</option>
					</select><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 fecha_respuesta_recurso" for="fecha_respuesta_recurso">Fecha respuesta recurso:</label>
				<div class="col-sm-10">
					<input type="date" name="fecha_respuesta_recurso" id="fecha_respuesta_recurso" class="form-control" onblur="if (esNoVacio('fecha_respuesta_recurso'))">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 motivo_rechazo_solicitud" for="motivo_rechazo_solicitud">Motivo rechazo solicitud:</label>
				<div class="col-sm-10">
					<input type="text" name="motivo_rechazo_solicitud" id="motivo_rechazo_solicitud" class="form-control" onblur="if (esNoVacio('motivo_rechazo_solicitud')) comprobarLetrasNumeros('motivo_rechazo_solicitud',100)">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 fue_usado" for="fue_usado"> Fue usado:</label>
				<div class="col-sm-10">
					<select name="fue_usado" class="form-control">
						<option value='SI'>SI</option>
						<option value='NO'>NO</option>
					</select><br>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2 coste_solicitud" for="coste_solicitud">Coste solicitud:</label>
				<div class="col-sm-10">
					<input type="text" name="coste_solicitud" id="coste_solicitud" class="form-control" onblur="if (esNoVacio('coste_solicitud')) comprobarSoloNumeros('coste_solicitud',6)">
				</div>
			</div>


			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">

					<img src='./VIEW/icons/anadir.png' height="40" width="40" onclick="insertacampo(document.formularioinsertar,'action','insertar'); insertacampo(document.formularioinsertar,'controlador','HORARIO'); enviaform(document.formularioinsertar);">


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