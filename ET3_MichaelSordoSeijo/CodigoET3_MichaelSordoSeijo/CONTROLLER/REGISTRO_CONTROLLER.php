<?php

class REGISTRO{
	// incluimos los ficheros necesarios
	
	
	function __construct(){

		include './VIEW/MESSAGE_VIEW.php';
		include './VIEW/REGISTRO_VIEW.php';
		include './MODEL/USUARIO_MODEL.php';

	}

	function formregistrar(){

		new REGISTRO_VIEW;

	}

	function registrar(){

		$usuario = new USUARIO_MODEL(); //instancio el modelo de usuario

		$respuesta = $usuario->registrar();

		new MESSAGE($respuesta['code'], 'index.php');
			
		
	}


	
	

} //FIN DE CLASS
?>
