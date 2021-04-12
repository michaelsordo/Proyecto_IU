<?php

class RESPONSABLE_DELETE{

//ATRIBUTOS
var $fila;


//METODOS

	function __construct($fila){
		$this->fila = $fila;
		$this->render();
	}

	function render(){

		include './VIEW/header.php';
?>
Bienvenidos al formulario de confirmación de borrado<BR><BR><BR>

Para confirmar el borrado de un usuario pulse borrar <img src=./VIEW/icons/basura.png height="40" width="40" onclick = "insertacampo(document.formularioborrar,'action','borrar'); insertacampo(document.formularioborrar,'controlador','RESPONSABLE'); enviaform(document.formularioborrar);"><BR><BR><BR>

<form class="form-horizontal" name="formularioborrar" action="index.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2 login_responsable" for="login_responsable">Login responsable:</label>
    <div class="col-sm-10">
      <input type='text' name='login_responsable' class="form-control" value="<?php echo $this->fila['LOGIN_RESPONSABLE']; ?>" readonly >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 direccion_responsable" for="direccion_responsable">Dirección Responsable:</label>
    <div class="col-sm-10">
      <input type='text' name='direccion_responsable' class="form-control" value="<?php echo $this->fila['DIRECCION_RESPONSABLE']; ?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 telefono_responsable" for="telefono_responsable">Telefono Responsable:</label>
    <div class="col-sm-10">
     <input type='text' name='telefono_responsable' class="form-control" value="<?php echo $this->fila['TELEFONO_RESPONSABLE']; ?>" readonly>
    </div>
  </div>
    

</form>



<img src='./VIEW/icons/volver.png' height="40" width="40" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','USUARIO');enviaform(document.formenviar);">
<br>
<br>
<br>
<br>
<br>
<br>

<?php
	
	include './VIEW/footer.php';

	}// fin de render

} //FIN DE CLASE MESSAGE
?>
