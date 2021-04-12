<?php

class MESSAGE{

//ATRIBUTOS
var $mensaje;
var $link;


//METODOS

	function __construct($mensaje, $link){
		$this->mensaje = $mensaje;
		$this->link = $link;
		$this->render();
	}

	function render(){
		include './VIEW/header.php';
?>
	

	Mensaje del sistema<BR><BR><BR><BR><BR><BR>

	<H1 class='<?php echo $this->mensaje; ?>'></H1><BR><BR><BR>
	<a href="<?php echo $this->link; ?>"><img src='./VIEW/icons/volver.png' height="40" width="40"></a>

	</body>
	</html>

<?php
	include './VIEW/footer.php';
	}// fin de render

} //FIN DE CLASE MESSAGE

class MESSAGE1{

//ATRIBUTOS
var $mensaje;
var $controller;
var $action;


//METODOS

	function __construct($mensaje, $controller, $action){

		$this->mensaje = $mensaje;
		$this->controller = $controller;
		$this->action = $action;
		$this->render();
	}

	function render(){
		include './VIEW/header.php';

	$celdas = $this->mensaje;
	$celda = array_shift($celdas);
		
	if (is_array($celda)){
		$muestraerrores = true;
	}
	else{
		$muestraerrores = false;
	}
?>
	

	Mensaje del sistema<BR><BR><BR><BR><BR><BR>

<?php 
	if (!$muestraerrores){
?>

	<H1 class='<?php echo $this->mensaje['code']; ?>'></H1><BR><BR><BR>

<?php
	}
	else{

		foreach($this->mensaje as $mensaje){
?>			
			<H1 class='<?php echo $mensaje['code']; ?>'></H1><br>
<?php
		}
		//var_dump($this->mensaje); 

	}	
?>

	<img src='./VIEW/icons/volver.png' height="40" width="40" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','<?php echo $this->action; ?>'); insertacampo(document.formenviar,'controlador','<?php echo $this->controller; ?>');enviaform(document.formenviar);">

	</body>
	</html>

<?php
	include './VIEW/footer.php';
	}// fin de render

} //FIN DE CLASE MESSAGE1
?>
