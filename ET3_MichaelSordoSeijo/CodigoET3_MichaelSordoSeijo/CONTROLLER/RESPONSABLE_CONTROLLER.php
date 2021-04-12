<?php

class RESPONSABLE{
	// incluimos los ficheros necesarios
	
	
	function __construct(){
		include './VIEW/MESSAGE_VIEW.php';
		include './VIEW/RESPONSABLE_SHOWALL_VIEW.php';
		include './VIEW/RESPONSABLE_EDIT_VIEW.php';
		include './VIEW/RESPONSABLE_DELETE_VIEW.php';
		include './VIEW/RESPONSABLE_ADD_VIEW.php';
		include './VIEW/RESPONSABLE_SEARCH_VIEW.php';
		include './MODEL/RESPONSABLE_MODEL.php';

	}
	
	function formularioinsertar(){

		new RESPONSABLE_ADD();
	}


	function insertar(){

		
			$RESPONSABLE = new RESPONSABLE_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $RESPONSABLE->ADD();

			new MESSAGE1($respuesta, 'RESPONSABLE', 'buscar');
				
	} //end of function insertar 
	
	function formulariobuscar(){

		new RESPONSABLE_SEARCH();

	}
	function buscar(){

			$RESPONSABLE = new RESPONSABLE_MODEL();

			$respuesta = $RESPONSABLE->SEARCH();

			// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
			if ($respuesta['ok'] === true){
			// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
				new RESPONSABLE_SHOWALL($respuesta['resource']);
			}
			else{
				new MESSAGE1($respuesta,'RESPONSABLE','buscar');
			}

	
	}
	
	function formularioeditar(){
		// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
			$RESPONSABLE = new RESPONSABLE_MODEL();

			$fila = $RESPONSABLE->seek();

			// construimos un formulario con los valores por defecto de la tupla de la RESPONSABLE que queremos modificar
			new RESPONSABLE_EDIT($fila);
	}

	function editar(){

			$RESPONSABLE = new RESPONSABLE_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $RESPONSABLE->EDIT();

			new MESSAGE1($respuesta, 'RESPONSABLE', 'buscar');
		

} //end of function editar

	function formularioborrar(){
		// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
			$RESPONSABLE = new RESPONSABLE_MODEL();

			$fila = $RESPONSABLE->seek();


			// construimos un formulario con los valores por defecto de la tupla de la RESPONSABLE que queremos modificar

			new RESPONSABLE_DELETE($fila);	
	}

	function borrar(){

			$RESPONSABLE = new RESPONSABLE_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $RESPONSABLE->DELETE();

			new MESSAGE1($respuesta, 'RESPONSABLE', 'buscar');
			
} //end of function borrar

	function desconectar(){
		session_destroy();
		header('Location:index.php');
	}

} //FIN DE CLASS
?>
