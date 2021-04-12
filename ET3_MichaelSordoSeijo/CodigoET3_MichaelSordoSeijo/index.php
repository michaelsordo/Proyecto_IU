<?php

include './COMMON/FuncionesGenerales.php';





session_start();



if (Autenticacion()===false){
	

	if (!($_POST)){
		include_once './CONTROLLER/LOGIN_CONTROLLER.php';
		$login = new LOGIN;
		$login->formlogin();
	}
	else{
		if (isset($_POST['controlador']) && $_POST['controlador'] === 'REGISTRO'){
			if ($_REQUEST['action'] === 'formregistrar'){
				include './CONTROLLER/REGISTRO_CONTROLLER.php';
				$registro = new REGISTRO;
				$registro->formregistrar();
			}
			else{
				include './CONTROLLER/REGISTRO_CONTROLLER.php';
				$registro = new REGISTRO;
				$registro->registrar();	
			}
		}
		else{
			include_once './CONTROLLER/LOGIN_CONTROLLER.php';
			$login = new LOGIN;
			$login->login();
			
		}
	}
}
else{	    

			//echo var_dump($_SESSION); //para debug
			
		/*
			//esto funciona
			if(esResponsable()===true){
				echo "El responsable es true";
			}
			else{
				echo "El responsable es false";
			}

			//esto funciona

			*/
		
			//Si el usuario es un administrador
			if(AutenticacionAdmin()===true){

			if (!isset($_REQUEST['controlador'])){
				$controlador = 'MENU';	
				
			}
			else{
				$controlador = $_REQUEST['controlador'];	
			}
		
			if (!isset($_REQUEST['action'])) {
				$action = 'MENU';
			}
			else{
				$action = $_REQUEST['action'];
			}
		
			include_once './CONTROLLER/'.$controlador.'_CONTROLLER.php';
		
			$objcontrolador = new $controlador;
			$objcontrolador->$action();
		}
		else { //Si el usuario no es un administrador 

				if(esResponsable()===true){ // si el usuario es un responsable

				if (!isset($_REQUEST['controlador'])){
					$controlador = 'MENU_RESPONSABLE';	
					
				}
				else{
					$controlador = $_REQUEST['controlador'];	
				}
			
				if (!isset($_REQUEST['action'])) {
					$action = 'MENU_RESPONSABLE';
				}
				else{
					$action = $_REQUEST['action'];
				}
			
				include_once './CONTROLLER/'.$controlador.'_CONTROLLER.php';
			
				$objcontrolador = new $controlador;
				$objcontrolador->$action();
			}else{

			if (!isset($_REQUEST['controlador'])){
				$controlador = 'MENUUSER';	
				
			}
			else{
				$controlador = $_REQUEST['controlador'];	
			}
		
			if (!isset($_REQUEST['action'])) {
				$action = 'MENUUSER';
			}
			else{
				$action = $_REQUEST['action'];
			}
		
			include_once './CONTROLLER/'.$controlador.'_CONTROLLER.php';
		
			$objcontrolador = new $controlador;
			$objcontrolador->$action();

		}

		}



		
	



	

}
?>