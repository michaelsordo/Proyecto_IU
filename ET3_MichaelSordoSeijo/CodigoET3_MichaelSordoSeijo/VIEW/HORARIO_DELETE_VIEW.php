<?php

class HORARIO_DELETE{

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
Bienvenidos al formulario de confirmación de borrado<BR><BR><BR><BR><BR><BR>

Para confirmar el borrado de un calendario pulse borrar<BR><BR><BR>

<form name="formularioborrar" action="index.php" method="post">

Id horario : <input type='text' name='id_horario' value="<?php echo $this->fila['ID_HORARIO']; ?>" readonly ><br>


<img src=./VIEW/icons/basura.png height="40" width="40" onclick = "insertacampo(document.formularioborrar,'action','borrar'); insertacampo(document.formularioborrar,'controlador','HORARIO'); enviaform(document.formularioborrar);">


</form>

<br><br><img src='./VIEW/icons/volver.png' height="40" width="40" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','HORARIO');enviaform(document.formenviar);">


<?php
	
	include './VIEW/footer.php';

	}// fin de render

} //FIN DE CLASE MESSAGE
?>
