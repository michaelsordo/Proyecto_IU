<?php

class CALENDARIO{
	// incluimos los ficheros necesarios
	
	
	function __construct(){
		include './VIEW/MESSAGE_VIEW.php';
		include './VIEW/CALENDARIO_SHOWALL_VIEW.php';
		include './VIEW/CALENDARIO_EDIT_VIEW.php';
		include './VIEW/CALENDARIO_DELETE_VIEW.php';
		include './VIEW/CALENDARIO_ADD_VIEW.php';
		include './VIEW/CALENDARIO_SEARCH_VIEW.php';
		include './MODEL/CALENDARIO_MODEL.php';


	}
	
	function formularioinsertar(){

		new CALENDARIO_ADD();
	}


	function insertar(){

		
			$CALENDARIO = new CALENDARIO_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $CALENDARIO->ADD();

			new MESSAGE1($respuesta, 'CALENDARIO', 'buscar');
				
	} //end of function insertar 
	
	function formulariobuscar(){

		new CALENDARIO_SEARCH();

	}
	function buscar(){

			$CALENDARIO = new CALENDARIO_MODEL();

			$respuesta = $CALENDARIO->SEARCH();

			// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
			if ($respuesta['ok'] === true){
			// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
				new CALENDARIO_SHOWALL($respuesta['resource']);
			}
			else{
				new MESSAGE1($respuesta,'CALENDARIO','buscar');
			}

	
	}
	
	function formularioeditar(){
		// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
			$CALENDARIO = new CALENDARIO_MODEL();

			$fila = $CALENDARIO->seek();

			// construimos un formulario con los valores por defecto de la tupla de la CALENDARIO que queremos modificar
			new CALENDARIO_EDIT($fila);
	}

	function editar(){

			$CALENDARIO = new CALENDARIO_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $CALENDARIO->EDIT();

			new MESSAGE1($respuesta, 'CALENDARIO', 'buscar');
		

} //end of function editar

	function formularioborrar(){
		// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
			$CALENDARIO = new CALENDARIO_MODEL();

			$fila = $CALENDARIO->seek();


			// construimos un formulario con los valores por defecto de la tupla de la CALENDARIO que queremos modificar

			new CALENDARIO_DELETE($fila);	
	}

	function borrar(){

			$CALENDARIO = new CALENDARIO_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $CALENDARIO->DELETE();

			new MESSAGE1($respuesta, 'CALENDARIO', 'buscar');
			
} //end of function borrar

	function desconectar(){
		session_destroy();
		header('Location:index.php');
	}

} //FIN DE CLASS
?>
