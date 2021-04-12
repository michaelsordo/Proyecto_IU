<?php

class INFORME{
	// incluimos los ficheros necesarios
	
	
	function __construct(){
        include './VIEW/INFORME_SHOWALL_VIEW.php';
        include './VIEW/INFORME_SEARCH_VIEW.php';
        include './MODEL/INFORME_MODEL.php';

	}
	
	
	
	function formulariobuscar(){

		new INFORME_SEARCH();

	}
	function buscar(){

			$INFORME = new INFORME_MODEL();

			$respuesta = $INFORME->SEARCH();

			// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
			if ($respuesta['ok'] === true){
			// construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
				new INFORME_SHOWALL($respuesta['resource']);
			}
			else{
				new MESSAGE1($respuesta['code'],'INFORME','buscar');
			}

	
    }
    
    function buscar_informe(){

        $INFORME = new INFORME_MODEL();

        $respuesta = $INFORME->INFORME();

        // construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
        if ($respuesta['ok'] === true){
        // construimos una tabla html empezando con los titulos de las columnas para mostrar los resultados de la busqueda
            new INFORME_SHOWALL($respuesta['resource']);
        }
        else{
            new MESSAGE1($respuesta['code'],'INFORME','buscar');
        }


}
	
	function desconectar(){
		session_destroy();
		header('Location:index.php');
	}

} //FIN DE CLASS
?>
