<?php

class USUARIO_SEARCH{

function __construct(){
	$this->render();
}

function render(){

	include './VIEW/header.php';
?>

	
	<a class = 'saludoSEARCH'>-</a><BR><BR>

	<form class="form-horizontal" name="formulariobuscar" action="index.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2 login_usuario" for="login_usuario">Login usuario:</label>
    <div class="col-sm-10">
      <input type="text" name="login_usuario" class="form-control">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2 pass_usuario" for="pass_usuario">Contraseña:</label>
    <div class="col-sm-10">
      <input type="text" name="pass_usuario" class="form-control">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2 nombre_usuario" for="nombre_usuario">Nombre usuario:</label>
    <div class="col-sm-10">
      <input type="text" name="nombre_usuario" class="form-control">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2 email_usuario" for="email_usuario">Email usuario:</label>
    <div class="col-sm-10">
      <input type="text" name="email_usuario"class="form-control">
    </div>
  </div>
  <div class="form-group">
	<label class='es_admin control-label col-sm-2'>Administrador</label>
									<div class="col-sm-10">
									<select name='es_admin' class="form-control">
									<option value=''>-------</option>
									<option value='SI'>SI</option>
									<option value='NO'>NO</option>
									</select><br>
									</div>
  <div class="form-group">
  <label class='es_activo control-label col-sm-2'>Activo</label>
                  <div class="col-sm-10">
                  <select name='es_activo' class="form-control">
                  <option value=''>-------</option>
                  <option value='SI'>SI</option>
                  <option value='NO'>NO</option>
                  </select><br>
                  </div>

</div>

	<input type='hidden' name='controlador' value='USUARIO'>
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