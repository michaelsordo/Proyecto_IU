<?php

class RESPONSABLE_SEARCH{

function __construct(){
	$this->render();
}

function render(){

	include './VIEW/header.php';
?>

	
	<a class = 'saludoSEARCH'>-</a><BR><BR>

	<form class="form-horizontal" name="formulariobuscar" action="index.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2 login_responsable" for="login_responsable">Login responsable:</label>
    <div class="col-sm-10">
      <input type="text" name="login_responsable" class="form-control">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2 direccion_responsable" for="direccion_responsable">Dirección:</label>
    <div class="col-sm-10">
      <input type="text" name="direccion_responsable" class="form-control">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2 telefono_responsable" for="telefono_responsable">Telefono:</label>
    <div class="col-sm-10">
      <input type="text" name="telefono_responsable" class="form-control">
    </div>
  </div>

</div>

	<input type='hidden' name='controlador' value='RESPONSABLE'>
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