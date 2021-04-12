<?php

class USUARIO_EDIT
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


		<form class="form-horizontal" name="formularioeditar" action="index.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2 login_usuario" for="login_usuario">Login usuario:</label>
    <div class="col-sm-10">
      <input type="text" name="login_usuario" id="login_usuario" class="form-control" value="<?php echo $this->fila['LOGIN_USUARIO']; ?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 pass_usuario" for="pass_usuario">Contraseña:</label>
    <div class="col-sm-10">
      <input type="text" name="pass_usuario" id="pass_usuario" class="form-control"  value="<?php echo $this->fila['PASS_USUARIO']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 nombre_usuario" for="nombre_usuario">Nombre usuario:</label>
    <div class="col-sm-10">
      <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control"  value="<?php echo $this->fila['NOMBRE_USUARIO']; ?>" onblur="if (esNoVacio('nombre_usuario')) comprobarLetrasNumeros('nombre_usuario',60)">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 email_usuario" for="email_usuario">Email usuario:</label>
    <div class="col-sm-10">
      <input type="text" name="email_usuario" id="email_usuario" class="form-control" value="<?php echo $this->fila['EMAIL_USUARIO']; ?>" onblur="if (esNoVacio('email_usuario')) comprobarEmail('email_usuario',40);">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2 es_admin" for="es_admin"> Administrador:</label>
    <div class="col-sm-10">
      <select name="es_admin" class="form-control">
      <option value='SI'>SI</option>
      <option value='NO'>NO</option>
    </select><br>
    </div>

	<div class="form-group">
    <label class="control-label col-sm-2 es_activo" for="es_activo"> Activo:</label>
    <div class="col-sm-10">
      <select name="es_activo" class="form-control">
      <option value='SI'>SI</option>
      <option value='NO'>NO</option>
    </select><br>
    </div>
	</div>


			<img src=./VIEW/icons/editar.png height="40" width="40" onclick="insertacampo(document.formusuarioeditar,'action','editar'); insertacampo(document.formusuarioeditar,'controlador','USUARIO'); enviaform(document.formusuarioeditar,encriptar());">
			<!--<input type='submit' name='action' value='editar'>-->

		</form>

		<br><br><img src='./VIEW/icons/volver.png' height="40" width="40" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','USUARIO');enviaform(document.formenviar);">

<br>
<br>
<br>
<br>
<br>

<?php

		include './VIEW/footer.php';
	} // fin de render
	//this.form-asignatura-editar, 'action', 'editar') insertacampo(this.forms['form-asignatura-editar'], 'controlador','pepe');
} //FIN DE CLASE MESSAGE
?>