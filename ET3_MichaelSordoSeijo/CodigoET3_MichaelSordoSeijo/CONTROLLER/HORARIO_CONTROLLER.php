<?php

class HORARIO{
	// incluimos los ficheros necesarios
	
	
	function __construct(){
		include './VIEW/MESSAGE_VIEW.php';
		include './VIEW/HORARIO_SHOWALL_VIEW.php';
		include './VIEW/HORARIO_EDIT_VIEW.php';
		include './VIEW/HORARIO_DELETE_VIEW.php';
		include './VIEW/HORARIO_ADD_VIEW.php';
		include './VIEW/HORARIO_SEARCH_VIEW.php';
		include './MODEL/HORARIO_MODEL.php';

		//Estos para gestionar las reservas del HORARIO
		include './VIEW/RESERVA_ADD_USER_VIEW.php';
		include './VIEW/RECURSO_SHOWALL_USER_VIEW.php';

		//Para que se pueda ver la pantalla de Mis Reservas
		include './VIEW/MIS_RESERVAS_SHOWALL_VIEW.php';

		//Para que un responsable pueda ver las reservas que tiene pendientes de aceptar
		include './VIEW/RESERVAS_SOY_RESPONSABLE_SHOWALL_VIEW.php';

		//Para las vistas de aceptar y denegar reservas
		include './VIEW/RESERVAS_SOY_RESPONSABLE_ACCEPT_VIEW.php';
		include './VIEW/RESERVAS_SOY_RESPONSABLE_DENY_VIEW.php';

	}
	
	function formularioinsertar(){

		new HORARIO_ADD();
	}

	function formularioinsertar_reserva(){

			// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
			$HORARIO = new HORARIO_MODEL();

			$fila = $HORARIO->seek_recurso();
			$calendario = new HORARIO_MODEL();
			$respuestaCalendario = $calendario->SEARCH_CALENDARIO();

			// construimos un formulario con los valores por defecto de la tupla de la HORARIO que queremos modificar
			new RESERVA_ADD_USER($fila,$respuestaCalendario['resource']);
	}


	function insertar(){

		
			$HORARIO = new HORARIO_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $HORARIO->ADD();

			new MESSAGE1($respuesta, 'HORARIO', 'buscar');
				
	} //end of function insertar 

	function insertar_reserva(){

		$HORARIO = new HORARIO_MODEL();
		//comprobamos el resultado de la ejecución de la sentencia sql en la bd

		$respuesta = $HORARIO->ADD_RESERVA();

		new MESSAGE1($respuesta, 'HORARIO', 'buscar');
			
} //end of function insertar 
	
	function formulariobuscar(){

		new HORARIO_SEARCH();

	}
	function buscar(){

			$HORARIO = new HORARIO_MODEL();

			$respuesta = $HORARIO->SEARCH();

			// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
			if ($respuesta['ok'] === true){
			// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
				new HORARIO_SHOWALL($respuesta['resource']);
			}
			else{
				new MESSAGE1($respuesta,'HORARIO','buscar');
			}

	
	}

	function buscar_view(){

		$HORARIO = new HORARIO_MODEL();

		$respuesta = $HORARIO->SEARCH_VIEW();

		// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
		if ($respuesta['ok'] === true){
		// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
			new HORARIO_SHOWALL($respuesta['resource']);
		}
		else{
			new MESSAGE1($respuesta,'HORARIO','buscar');
		}


}

	function buscar_reserva(){

		$HORARIO = new HORARIO_MODEL();

		$respuesta = $HORARIO->SEARCH_MIS_RESERVAS();

		// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
		if ($respuesta['ok'] === true){
		// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
			new MIS_RESERVAS_SHOWALL($respuesta['resource']);
		}
		else{
			new MESSAGE1($respuesta,'HORARIO','buscar');
		}


}

function buscar_reservas_soy_responsable(){

	$HORARIO = new HORARIO_MODEL();

	$respuesta = $HORARIO->SEARCH_SOY_RESPONSABLE();

	// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
	if ($respuesta['ok'] === true){
	// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
		new RESERVAS_SOY_RESPONSABLE_SHOWALL($respuesta['resource']);
	}
	else{
		new MESSAGE1($respuesta,'HORARIO','buscar');
	}


}


function formularioeditar_reservas_accept(){
	// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
		$HORARIO = new HORARIO_MODEL();

		$fila = $HORARIO->seek();

		// construimos un formulario con los valores por defecto de la tupla de la HORARIO que queremos modificar
		new RESERVAS_SOY_RESPONSABLE_ACCEPT($fila);
}

function formularioeditar_reservas_deny(){
	// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
		$HORARIO = new HORARIO_MODEL();

		$fila = $HORARIO->seek();

		// construimos un formulario con los valores por defecto de la tupla de la HORARIO que queremos modificar
		new RESERVAS_SOY_RESPONSABLE_DENY($fila);
}

	
	function formularioeditar(){
		// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
			$HORARIO = new HORARIO_MODEL();

			$fila = $HORARIO->seek();

			// construimos un formulario con los valores por defecto de la tupla de la HORARIO que queremos modificar
			new HORARIO_EDIT($fila);
	}

	function editar(){

			$HORARIO = new HORARIO_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $HORARIO->EDIT();

			new MESSAGE1($respuesta, 'HORARIO', 'buscar');
		

} //end of function editar

	function formularioborrar(){
		// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
			$HORARIO = new HORARIO_MODEL();

			$fila = $HORARIO->seek();


			// construimos un formulario con los valores por defecto de la tupla de la HORARIO que queremos modificar

			new HORARIO_DELETE($fila);	
	}

	function borrar(){

			$HORARIO = new HORARIO_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $HORARIO->DELETE();

			new MESSAGE1($respuesta, 'HORARIO', 'buscar');
			
} //end of function borrar

	function desconectar(){
		session_destroy();
		header('Location:index.php');
	}

} //FIN DE CLASS
?>
