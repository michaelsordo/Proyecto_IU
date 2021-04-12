<?php

class LOGIN{
	// incluimos los ficheros necesarios
	
	
	function __construct(){

		include './VIEW/MESSAGE_VIEW.php';
		include './MODEL/USUARIO_MODEL.php';

	}

	function formlogin(){
		include './VIEW/LOGIN_VIEW.php';
		new LOGIN_VIEW;
	}

	function login(){

		$usuario = new USUARIO_MODEL(); //instancio el modelo de usuario

		$respuesta = $usuario->login();

		if ($respuesta['ok'] === true){
			session_start(); 
			$_SESSION['login_usuario'] = $usuario->login_usuario;
			$_SESSION['es_admin'] = $usuario->es_admin;
			header('location: index.php');
		}
		else{
			new MESSAGE($respuesta['code'],'index.php');
		}
		
	}


	
	

} //FIN DE CLASS
?>
