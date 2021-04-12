<?php

class PERFIL_EDIT
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


		<form name="formularioeditar_perfil" action="index.php" method="post">


		<form class="form-horizontal" name="formularioeditar_perfil" action="index.php" method="post">
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


			<img src=./VIEW/icons/editar.png height="40" width="40" onclick="insertacampo(document.formularioeditar_perfil,'action','editar_perfil'); insertacampo(document.formularioeditar_perfil,'controlador','USUARIO'); enviaform(document.formularioeditar_perfil,encriptar());">
			<!--<input type='submit' name='action' value='editar'>-->

		</form>
    <?php if($_SESSION['es_admin']=='SI'){
      ?>
      		<br><br><img src='./VIEW/icons/volver.png' height="40" width="40" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','USUARIO');enviaform(document.formenviar);">
      <?php
    }else{
      ?>
      <br><br><img src='./VIEW/icons/volver.png' height="40" width="40" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','MENUUSER'); insertacampo(document.formenviar,'controlador','MENUUSER');enviaform(document.formenviar);">
<?php
    }
?>
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