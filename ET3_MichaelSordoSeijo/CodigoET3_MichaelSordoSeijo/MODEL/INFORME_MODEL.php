<?php

include './ABSTRACT_CLASS/ABSTRACT_CLASS.php';

class INFORME_MODEL extends Abstract_Model{
	
	//ATRIBUTOS
	var $nombre_recurso;
	var $fue_usado;
	var $fecha_solicitud_recurso;
	var $id_recurso;
	

	//METODOS

	function __construct(){
		$this->fillfields();
		$this->conexion = $this->connection();
	}

	function fillfields(){

		$this->nombre_recurso = '';
		$this->fue_usado = '';
		$this->fecha_solicitud_recurso='';
		$this->id_recurso='';
		



		if ($_POST){
			if(isset($_POST['nombre_recurso'])) $this->nombre_recurso = $_POST['nombre_recurso'];
			if(isset($_POST['fue_usado'])) $this->fue_usado = $_POST['fue_usado'];
			if(isset($_POST['fecha_solicitud_recurso'])) $this->fecha_solicitud_recurso = $_POST['fecha_solicitud_recurso'];
			if(isset($_POST['id_recurso'])) $this->fecha_solicitud_recurso = $_POST['id_recurso'];

		}
		else{
			if ($_GET){
				if(isset($_GET['nombre_recurso'])) $this->nombre_recurso = $_GET['nombre_recurso'];
				if(isset($_GET['fue_usado'])) $this->fue_usado = $_GET['fue_usado'];
				if(isset($_GET['fecha_solicitud_recurso'])) $this->fecha_solicitud_recurso = $_GET['fecha_solicitud_recurso'];
				if(isset($_GET['id_recurso'])) $this->fecha_solicitud_recurso = $_GET['id_recurso'];

					}
			}

	}


	function SEARCH(){

		// construimos la sentencia sql de búsqueda con comodines		
		$this->query = "SELECT RECURSO.NOMBRE_RECURSO,HORARIO.FUE_USADO,HORARIO.FECHA_SOLICITUD_RECURSO
		FROM RECURSO,HORARIO
			WHERE
			(
				(NOMBRE_RECURSO LIKE '%$this->nombre_recurso%') and
				(FUE_USADO LIKE '%$this->fue_usado%') and
				(FECHA_SOLICITUD_RECURSO LIKE '%$this->fecha_solicitud_recurso%') and
				(RECURSO.ID_RECURSO=HORARIO.ID_RECURSO) 

		
			)";
		// ejecutamos la consulta y guardamos los resultados en una variable
		$this->get_results_from_query();

		if ($this->feedback['ok'] === true){
			$this->feedback['resource'] = $this->rows;
		}

		return $this->feedback;

} //fin de searchall

	function ADD(){
		
}

function INFORME(){

	// construimos la sentencia sql de búsqueda con comodines		
	$this->query = "SELECT RECURSO.NOMBRE_RECURSO,HORARIO.FUE_USADO,HORARIO.FECHA_SOLICITUD_RECURSO
	FROM RECURSO,HORARIO
		WHERE
		(
			(NOMBRE_RECURSO LIKE '%$this->nombre_recurso%') and
			(FUE_USADO LIKE '%$this->fue_usado%') and
			(FECHA_SOLICITUD_RECURSO LIKE '%$this->fecha_solicitud_recurso%') and
			(RECURSO.ID_RECURSO=HORARIO.ID_RECURSO) 

	
		)";
	// ejecutamos la consulta y guardamos los resultados en una variable
	$this->get_results_from_query();

	if ($this->feedback['ok'] === true){
		$this->feedback['resource'] = $this->rows;
	}

	return $this->feedback;

} //fin de searchall

function seek(){

		// construimos la sentencia sql de búsqueda con valor concreto de clave		
		$this->query = "SELECT * FROM HORARIO
					WHERE
					(
						(ID_RECURSO = '$this->id_recurso')
					)";

		$this->get_one_result_from_query();

		// recuperamos la unica fila que viene en el recordset resultado de la consulta
		$fila = $this->rows;

		return $fila;
}

function getById($atributo, $valor){

		// construimos la sentencia sql de búsqueda con valor concreto de clave		
		$sql = "SELECT * FROM HORARIO
					WHERE
					(
						($atributo = '$valor')
					)";

		$this->get_one_result_from_query();

		// recuperamos la unica fila que viene en el recordset resultado de la consulta
		$fila = $this->rows;

		return $fila;
}

function EDIT(){

}

function DELETE(){

	

}

}
?>