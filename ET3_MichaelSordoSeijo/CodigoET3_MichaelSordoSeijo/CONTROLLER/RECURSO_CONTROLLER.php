<?php

class RECURSO{
	// incluimos los ficheros necesarios
	
	
	function __construct(){
		include './VIEW/MESSAGE_VIEW.php';
		include './VIEW/RECURSO_SHOWALL_VIEW.php';
		include './VIEW/RECURSO_SHOWALL_USER_VIEW.php';
		include './VIEW/RECURSO_EDIT_VIEW.php';
		include './VIEW/RECURSO_DELETE_VIEW.php';
		include './VIEW/RECURSO_ADD_VIEW.php';
		include './VIEW/RECURSO_SEARCH_VIEW.php';
		include './MODEL/RECURSO_MODEL.php';
		include './VIEW/INFORME_SHOWALL_VIEW.php';
		include './VIEW/RESERVA_ADD_USER_VIEW.php';

	}
	
	function formularioinsertar(){

		new RECURSO_ADD();
	}


	function insertar(){

		
			$recurso = new RECURSO_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $recurso->ADD();

			//var_dump($respuesta);

			new MESSAGE1($respuesta,'RECURSO', 'buscar');
			
				
	} //end of function insertar 
	
	function formulariobuscar(){

		new RECURSO_SEARCH();

	}
	function buscar(){

			$recurso = new RECURSO_MODEL();

			$respuesta = $recurso->SEARCH();

			// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
			if ($respuesta['ok'] === true){
			// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
				new RECURSO_SHOWALL($respuesta['resource']);
			}
			else{
				new MESSAGE1($respuesta,'RECURSO','buscar');
			}

	
	}

	function buscar_user(){

		$recurso = new RECURSO_MODEL();

		$respuesta = $recurso->SEARCH();

		// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
		if ($respuesta['ok'] === true){
		// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
			new RECURSO_SHOWALL_USER($respuesta['resource']);
		}
		else{
			new MESSAGE1($respuesta,'RECURSO','buscar');
		}


}



	
	function formularioeditar(){
		// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
			$recurso = new RECURSO_MODEL();

			$fila = $recurso->seek();

			// construimos un formulario con los valores por defecto de la tupla de la recurso que queremos modificar
			new RECURSO_EDIT($fila);
	}

	function editar(){

			$recurso = new RECURSO_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $recurso->EDIT();

			new MESSAGE1($respuesta,'RECURSO', 'buscar');
		

} //end of function editar

	function formularioborrar(){
		// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
			$recurso = new RECURSO_MODEL();

			$fila = $recurso->seek();


			// construimos un formulario con los valores por defecto de la tupla de la recurso que queremos modificar

			new recurso_DELETE($fila);	
	}

	function borrar(){

			$recurso = new RECURSO_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $recurso->DELETE();

			new MESSAGE1($respuesta,'RECURSO', 'buscar');
			
} //end of function borrar

	function desconectar(){
		session_destroy();
		header('Location:index.php');
	}

} //FIN DE CLASS
?>
