<?php

class MENUUSER{
	// incluimos los ficheros necesarios
	
	
	function __construct(){
	}

	function MENUUSER(){
		
		include './VIEW/MENUUSER_VIEW.php';
		new MENUUSER_VIEW;

	}


} //FIN DE CLASS
?>
