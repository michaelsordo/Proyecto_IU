<?php

class MENU_RESPONSABLE{
	// incluimos los ficheros necesarios
	
	
	function __construct(){
	}

	function MENU_RESPONSABLE(){
		
		include './VIEW/MENU_RESPONSABLE_VIEW.php';
		new MENU_RESPONSABLE_VIEW;

	}


} //FIN DE CLASS
?>
