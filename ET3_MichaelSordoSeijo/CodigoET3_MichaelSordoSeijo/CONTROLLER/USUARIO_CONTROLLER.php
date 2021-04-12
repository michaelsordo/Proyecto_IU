<?php

class USUARIO{
	// incluimos los ficheros necesarios
	
	
	function __construct(){
		include './VIEW/MESSAGE_VIEW.php';
		include './VIEW/USUARIO_SHOWALL_VIEW.php';
		include './VIEW/USUARIO_EDIT_VIEW.php';
	 	include './VIEW/USUARIO_DELETE_VIEW.php';
		include './VIEW/USUARIO_ADD_VIEW.php';
		include './VIEW/USUARIO_SEARCH_VIEW.php';
		include './MODEL/USUARIO_MODEL.php';
		include './VIEW/PERFIL_EDIT_VIEW.php';

	}
	
	function formularioinsertar(){

		new USUARIO_ADD();
	}


	function insertar(){

		
			$usuario = new USUARIO_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $usuario->ADD();

			new MESSAGE1($respuesta, 'USUARIO', 'buscar');
				
	} //end of function insertar 
	
	function formulariobuscar(){

		new USUARIO_SEARCH();

	}
	function buscar(){

			$usuario = new USUARIO_MODEL();

			$respuesta = $usuario->SEARCH();

			// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
			if ($respuesta['ok'] === true){
			// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
				new USUARIO_SHOWALL($respuesta['resource']);
			}
			else{
				new MESSAGE1($respuesta,'USUARIO','buscar');
			}

	
	}
	
	function formularioeditar(){
		// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
			$usuario = new USUARIO_MODEL();

			$fila = $usuario->seek();

			// construimos un formulario con los valores por defecto de la tupla de la usuario que queremos modificar
			new USUARIO_EDIT($fila);
	}

	function formularioeditar_perfil(){
		// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
			$usuario = new USUARIO_MODEL();

			$fila = $usuario->seek();

			// construimos un formulario con los valores por defecto de la tupla de la usuario que queremos modificar
			new PERFIL_EDIT($fila);
	}

	function editar(){

			$usuario = new USUARIO_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $usuario->EDIT();

			new MESSAGE1($respuesta, 'USUARIO', 'buscar');
		

} //end of function editar

function editar_perfil(){

	$usuario = new USUARIO_MODEL();
	//comprobamos el resultado de la ejecución de la sentencia sql en la bd

	$respuesta = $usuario->EDIT_PERFIL();

	new MESSAGE1($respuesta, 'USUARIO', 'buscar');


} //end of function editar

	function formularioborrar(){
		// recuperamos el valor que viene por get de la tabla de resultado de búsqueda
			$usuario = new USUARIO_MODEL();

			$fila = $usuario->seek();


			// construimos un formulario con los valores por defecto de la tupla de la usuario que queremos modificar

			new USUARIO_DELETE($fila);	
	}

	function borrar(){

			$usuario = new USUARIO_MODEL();
			//comprobamos el resultado de la ejecución de la sentencia sql en la bd

			$respuesta = $usuario->DELETE();

			new MESSAGE1($respuesta, 'USUARIO', 'buscar');
			
} //end of function borrar

	function desconectar(){
		session_destroy();
		header('Location:index.php');
	}

} //FIN DE CLASS
?>
