<?php
class RESPONSABLE_ADD{

function __construct(){
	$this->render();
}

function render(){

	include './VIEW/header.php';
?>
	

	<a class = 'saludoADD'>-</a><BR><BR><BR>

<form class="form-horizontal" name="formularioinsertar" action="index.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2 login_responsable" for="login_responsable">Login usuario:</label>
    <div class="col-sm-10">
      <input type="text" name="login_responsable" id="login_responsable" class="form-control" onblur="if (esNoVacio('login_responsable')) comprobarLetrasNumeros('login_responsable',15)">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 direccion_responsable" for="direccion_responsable">Direccion usuario:</label>
    <div class="col-sm-10">
      <input type="text" name="direccion_responsable" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 telefono_responsable" for="telefono_responsable">Telefono Responsable:</label>
    <div class="col-sm-10">
      <input type="text" name="telefono_responsable" id="telefono_responsable" class="form-control" onblur="if (esNoVacio('telefono_responsable')) comprobarLetrasNumeros('telefono_responsable',60)">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
  <img src='./VIEW/icons/anadir.png' height="40" width="40" onclick = "insertacampo(document.formularioinsertar,'action','insertar'); insertacampo(document.formularioinsertar,'controlador','RESPONSABLE'); enviaform(document.formularioinsertar);">


    </div>
  </div>

</form>


	<!--<a class='volvermenu'>para volver al menú pulsa</a> <a href='index.php'><img src='./VIEW/icons/volver.png' height="40" width="40"></a>
  -->
<img src='./VIEW/icons/volver.png' height="40" width="40" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','RESPONSABLE');enviaform(document.formenviar);">


	<?php

	include './VIEW/footer.php';
	} //fin de render
} //fin de clase
?>