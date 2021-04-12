<?php

function conectarBD(){

	$conexion = new mysqli('localhost', 'pma', 'iu', 'ET1') or die('fallo conexion');
	return $conexion;

}

function Autenticacion(){

	if ((isset($_SESSION['login_usuario'])) && ($_SESSION['login_usuario']!='')) {
		return true;
	}
	else{
		return false;
	}
	
}

function AutenticacionAdmin()
{
    if (Autenticacion() == true) {
        if (isset($_SESSION['es_admin']) && $_SESSION['es_admin'] == "SI") {
            return true;
        } else {
            return false;
        }
    } else {
        return null;
    }
}



function esResponsable(){


	$sql= ("SELECT RESPONSABLE_RECURSO.LOGIN_RESPONSABLE
	FROM RESPONSABLE_RECURSO
	WHERE
		RESPONSABLE_RECURSO.LOGIN_RESPONSABLE LIKE '".$_SESSION ['login_usuario'])."';";
	
	// ejecutamos la consulta y guardamos los resultados en una variable
	$conexion = new mysqli('localhost', 'pma', 'iu', 'ET1') or die('fallo conexion');
	$respuesta = $conexion->query($sql) or die ('error al buscar');
	$respuesta->fetch_assoc();
	//var_dump($respuesta);

	$numero_columnas = mysqli_num_rows($respuesta);
	//echo $numero_columnas;
	/*$resultado = (array) $respuesta;
	var_dump($resultado);*/


	if($numero_columnas=="0"){
		return false;
	}else{
		return true;
	}
	
	
	
	}

?>