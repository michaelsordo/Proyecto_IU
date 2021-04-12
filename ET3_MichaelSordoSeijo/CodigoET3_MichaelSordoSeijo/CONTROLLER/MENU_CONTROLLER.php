<?php

class MENU{
	// incluimos los ficheros necesarios
	
	
	function __construct(){
	}

	function MENU(){
		
		include './VIEW/MENU_VIEW.php';
		new MENU_VIEW;

	}


} //FIN DE CLASS
?>
