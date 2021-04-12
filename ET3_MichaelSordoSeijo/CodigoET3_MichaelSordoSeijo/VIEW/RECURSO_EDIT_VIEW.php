<?php

class RECURSO_EDIT{

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
	Bienvenidos al formulario de edición<BR><BR><BR>


	<form class="form-horizontal" name="formularioeditar" action="index.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2 id_recurso" for="id_recurso">ID recurso:</label>
    <div class="col-sm-10">
      <input type="text" name="id_recurso" id="id_recurso" class="form-control" value="<?php echo $this->fila['ID_RECURSO']; ?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 nombre_recurso" for="nombre_recurso">Nombre recurso:</label>
    <div class="col-sm-10">
      <input type="text" name="nombre_recurso" id="nombre_recurso" class="form-control"  value="<?php echo $this->fila['NOMBRE_RECURSO']; ?>" onblur="if (esNoVacio('nombre_recurso')) comprobarLetrasNumeros('nombre_recurso',60)">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 descripcion_recurso" for="descripcion_recurso">Descripción Recurso:</label>
    <div class="col-sm-10">
      <input type="text" name="descripcion_recurso" id="descripcion_recurso" class="form-control"  value="<?php echo $this->fila['DESCRIPCION_RECURSO']; ?>" onblur="if (esNoVacio('descripcion_recurso')) comprobarLetrasNumeros('descripcion_recurso',100)">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 login_responsable" for="login_responsable">Login_responsable:</label>
    <div class="col-sm-10">
      <input type="text" name="login_responsable" id="login_responsable" class="form-control" value="<?php echo $this->fila['LOGIN_RESPONSABLE']; ?>" onblur="if (esNoVacio('login_responsable')) comprobarLetrasNumeros('login_responsable',15)">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 tarifa_recurso" for="tarifa_recurso"> Tarifa recurso:</label>
    <div class="col-sm-10">
      <input type="text" name="tarifa_recurso"  id="tarifa_recurso" class="form-control" value="<?php echo $this->fila['TARIFA_RECURSO']; ?>" onblur="if (esNoVacio('tarifa_recurso')) comprobarSoloNumeros('tarifa_recurso',3)" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 rango_tarifa" for="rango_tarifa"> Rango tarifa:</label>
    <div class="col-sm-10">
      <select name="rango_tarifa" class="form-control">
      <option value='HORA'>HORA</option>
      <option value='DIA'>DIA</option>
      <option value='SEMANA'>SEMANA</option>
      <option value='MES'>MES</option>
    </select><br>
    </div>
  </div>


<img src=./VIEW/icons/editar.png height="40" width="40" onclick = "insertacampo(document.formularioeditar,'action','editar'); insertacampo(document.formularioeditar,'controlador','RECURSO'); enviaform(document.formularioeditar);">
<!--<input type='submit' name='action' value='editar'>-->

</form>

<br><br><img src='./VIEW/icons/volver.png' height="40" width="40" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','RECURSO');enviaform(document.formenviar);">

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
