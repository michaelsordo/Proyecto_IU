<?php

include_once './ABSTRACT_CLASS/ABSTRACT_CLASS.php';
include_once './COMMON/Validar_Model.php';
include_once './VIEW/TEST_VIEW.php';

class CALENDARIO_MODEL extends Abstract_Model{
	
	//ATRIBUTOS
	var $id_calendario;
	var $nombre_calendario;
	var $descripcion_calendario;
	var $fecha_inicio_calendario;
	var $fecha_fin_calendario;
    var $hora_inicio_calendario;
	var $hora_fin_calendario;
	var $erroresdatos = [];
	var $conexion;

	//METODOS

	function __construct(){
		$this->fillfields();
		$this->conexion = $this->connection();
	}

	function fillfields(){

		$this->id_calendario = '';
		$this->nombre_calendario = '';
		$this->descripcion_calendario = '';
		$this->fecha_inicio_calendario = '';
		$this->fecha_fin_calendario = '';
        $this->hora_inicio_calendario = '';
        $this->hora_fin_calendario = '';
        




		if ($_POST){
			if(isset($_POST['id_calendario'])) $this->id_calendario = $_POST['id_calendario'];
			if(isset($_POST['nombre_calendario'])) $this->nombre_calendario = $_POST['nombre_calendario'];
			if(isset($_POST['descripcion_calendario'])) $this->descripcion_calendario = $_POST['descripcion_calendario'];
			if(isset($_POST['fecha_inicio_calendario'])) $this->fecha_inicio_calendario = $_POST['fecha_inicio_calendario'];
			if(isset($_POST['fecha_fin_calendario'])) $this->fecha_fin_calendario = $_POST['fecha_fin_calendario'];
            if(isset($_POST['hora_inicio_calendario'])) $this->hora_inicio_calendario = $_POST['hora_inicio_calendario'];		
            if(isset($_POST['hora_fin_calendario'])) $this->hora_fin_calendario = $_POST['hora_fin_calendario'];	
		}
		else{
			if ($_GET){
				if(isset($_GET['id_calendario'])) $this->id_calendario = $_GET['id_calendario'];
				if(isset($_GET['nombre_calendario'])) $this->nombre_calendario = $_GET['nombre_calendario'];
				if(isset($_GET['descripcion_calendario'])) $this->descripcion_calendario = $_GET['descripcion_calendario'];
				if(isset($_GET['fecha_inicio_calendario'])) $this->fecha_inicio_calendario = $_GET['fecha_inicio_calendario'];
				if(isset($_GET['fecha_fin_calendario'])) $this->fecha_fin_calendario = $_GET['fecha_fin_calendario'];
                if(isset($_GET['hora_inicio_calendario'])) $this->hora_inicio_calendario = $_GET['hora_inicio_calendario'];	
                if(isset($_GET['hora_fin_calendario'])) $this->hora_inicio_calendario = $_GET['hora_fin_calendario'];	
			}
		}

	}

		//Validaciones Back

		function validar_atributos()
		{
	
			$this->validar_id_calendario();
			$this->validar_nombre_calendario();
			$this->validar_descripcion_calendario();

	
			//echo var_dump($this->validar_id_calendario());
	
			if ($this->erroresdatos === []){
				return true;
				
			}
			else{
				return $this->erroresdatos;
			}
		}
	
		function validar_atributos_search(){
	
		}
	
		function validar_id_calendario()
		{
	
			$validar = new Validar();
	
			$this->code = '00000';
			$this->ok = true;
			$this->resource = 'CALENDARIO';
	
			if ($validar->Longitud_maxima($this->id_calendario, 2)===false) {
				$this->code = '01106';
				$this->ok = false;
				$this->resource = 'CALENDARIO';
				$this->construct_response();
				array_push($this->erroresdatos, $this->feedback);
			}
	
			if ($validar->Es_numerico($this->id_calendario) === false) {
				$this->code = '01107';
				$this->ok = false;
				$this->resource = 'CALENDARIO';
				$this->construct_response();
				array_push($this->erroresdatos, $this->feedback);
			}
	
			if ($this->ok) {
				return true;
				
			}else{
				
		
	
			return $this->erroresdatos;
			}
		}
	
		//Validar NOMBRE_CALENDARIO
	
		function validar_nombre_calendario()
		{
	
			$validar = new Validar();
	
			$this->code = '00000';
			$this->ok = true;
			$this->resource = 'CALENDARIO';
	
			if ($validar->Longitud_maxima($this->nombre_calendario, 40) === false) {
				$this->code = '01108';
				$this->ok = false;
				$this->resource = 'CALENDARIO';
				$this->construct_response();
				array_push($this->erroresdatos, $this->feedback);
			}
	
			if ($validar->Es_string_espacios($this->nombre_calendario) === false) {
				$this->code = '01109';
				$this->ok = false;
				$this->resource = 'CALENDARIO';
				$this->construct_response();
				array_push($this->erroresdatos, $this->feedback);
			}
	
			if ($this->ok) {
				return true;
			}
	
			//$this->construct_response();
			//array_push($this->erroresdatos, $this->feedback);
	
			return $this->erroresdatos;
		}
	
	
		//Validar descripcion_calendario
	
		function validar_descripcion_calendario()
		{
	
			$validar = new Validar();
	
			$this->code = '00000';
			$this->ok = true;
			$this->resource = 'CALENDARIO';
	
			if ($validar->Longitud_maxima($this->descripcion_calendario, 100) === false) {
				$this->code = '01110';
				$this->ok = false;
				$this->resource = 'CALENDARIO';
				$this->construct_response();
				array_push($this->erroresdatos, $this->feedback);
			}
	
			if ($validar->Es_string_espacios($this->descripcion_calendario) === false) {
				$this->code = '01111';
				$this->ok = false;
				$this->resource = 'CALENDARIO';
				$this->construct_response();
				array_push($this->erroresdatos, $this->feedback);
			}
	
			if ($this->ok) {
				return true;
			}
	
			//$this->construct_response();
			//array_push($this->erroresdatos, $this->feedback);
	
			return $this->erroresdatos;
		}
	
	
	


	function ADD(){

		if (is_array($this->validar_atributos())){
			return $this->erroresdatos;
		}
		
		$this->seek();
		if (($this->feedback['code']) === '00004'){ //existe el usuario
			$this->feedback['ok'] = false;
			$this->feedback['code'] = '02101'; //usuario ya existe
		}
		else{
			// construimos la sentencia de insercion en la bd
				$this->query = 	"INSERT INTO CALENDARIO
				(ID_CALENDARIO,
				NOMBRE_CALENDARIO,
				DESCRIPCION_CALENDARIO,
				FECHA_INICIO_CALENDARIO,
				FECHA_FIN_CALENDARIO,
				HORA_INICIO_CALENDARIO,
				HORA_FIN_CALENDARIO)
			VALUES
				('$this->id_calendario',
				'$this->nombre_calendario',
				'$this->descripcion_calendario',
				'$this->fecha_inicio_calendario',
				'$this->fecha_fin_calendario',
				'$this->hora_inicio_calendario',
				'$this->hora_fin_calendario'
			)";

			$this->execute_single_query();

			if ($this->feedback['ok']){
				$this->feedback['code'] = '03400'; //insertado con exito
			}
			else{
				if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
					$this->feedback['code'] = '02106'; //insercion fallida
			}
		}

		return $this->feedback;
}

function SEARCH(){

	// construimos la sentencia sql de búsqueda con comodines		
	$this->query = "SELECT * FROM CALENDARIO
	WHERE
	(
		(ID_CALENDARIO LIKE '%$this->id_calendario%') and
		(NOMBRE_CALENDARIO LIKE '%$this->nombre_calendario%') and
		(DESCRIPCION_CALENDARIO LIKE '%$this->descripcion_calendario%') and
		(FECHA_INICIO_CALENDARIO LIKE '%$this->fecha_inicio_calendario%') and
		(FECHA_FIN_CALENDARIO LIKE '%$this->fecha_fin_calendario%') and
		(HORA_INICIO_CALENDARIO LIKE '%$this->hora_inicio_calendario%') and
		(HORA_FIN_CALENDARIO LIKE '%$this->hora_fin_calendario%')



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
		$this->query = "SELECT * FROM CALENDARIO
					WHERE
					(
						(ID_CALENDARIO = '$this->id_calendario')
					)";

		$this->get_one_result_from_query();

		// recuperamos la unica fila que viene en el recordset resultado de la consulta
		$fila = $this->rows;

		return $fila;
}

function getById($atributo, $valor){

		// construimos la sentencia sql de búsqueda con valor concreto de clave		
		$sql = "SELECT * FROM CALENDARIO
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


		// construimos la sentencia sql de búsqueda con valor concreto de clave		
		$this->query = "UPDATE CALENDARIO SET
		
		NOMBRE_CALENDARIO = '$this->nombre_calendario',
		DESCRIPCION_CALENDARIO = '$this->descripcion_calendario',
		FECHA_INICIO_CALENDARIO = '$this->fecha_inicio_calendario',
		FECHA_FIN_CALENDARIO = '$this->fecha_fin_calendario',
		HORA_INICIO_CALENDARIO = '$this->hora_inicio_calendario',
		HORA_FIN_CALENDARIO = '$this->hora_fin_calendario'
		
		WHERE
		(ID_CALENDARIO = '$this->id_calendario')
		";
		$this->execute_single_query();
		

		if ($this->feedback['ok']){
			$this->feedback['code'] = '03402'; //modificado con exito
		}
		else{
			if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
				$this->feedback['code'] = '03403'; //modificacion fallida
		}

		return $this->feedback;
	
}

function DELETE(){

		// construimos la sentencia sql de borrado con el valor concreto de clave a borrar		
		$this->query = "DELETE FROM CALENDARIO
		WHERE
		(ID_CALENDARIO = '$this->id_calendario')
		";


		$this->execute_single_query();

		if ($this->feedback['ok']){
			$this->feedback['code'] = '03401'; //borrado con exito
		}
		else{
			if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
				$this->feedback['code'] = '02108'; //borrado fallido
		}

		return $this->feedback;

}


//TEST
function test_validation($arrayresultados){
	
	$arrayresultados = self::test_atributo('CALENDARIO', 'validar_id_calendario', 'id_calendario', '111111111', '01106', 'EL TAMAÑO DEL id_calendario NO PUEDE SER MAYOR DE 2', $arrayresultados);
	$arrayresultados = self::test_atributo('CALENDARIO', 'validar_id_calendario', 'id_calendario', 'pr', '01107', 'EL ID DE CALENDARIO SOLO PUEDE TENER NUMEROS', $arrayresultados);
	$arrayresultados = self::test_atributo('CALENDARIO', 'validar_nombre_calendario', 'nombre_calendario', '111//**', '01109', 'EL NOMBRE SOLO PUEDE TENER LETRAS', $arrayresultados);
	$arrayresultados = self::test_atributo('CALENDARIO', 'validar_nombre_calendario', 'nombre_calendario', 'calendariodecuarenteaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '01108', 'EL TAMAÑO DEL MAXIMO DEL NOMBRE DE CALENDARIO ES 40', $arrayresultados);
	$arrayresultados = self::test_atributo('CALENDARIO', 'validar_descripcion_calendario', 'descripcion_calendario', '//dESCRipci¡?', '01111', 'DEBE SER ALFANUMERICO', $arrayresultados);
	$arrayresultados = self::test_atributo('CALENDARIO', 'validar_descripcion_calendario', 'descripcion_calendario', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '01110', 'EL TAMAÑO DEL MAXIMO DE LA DESCRIPCION DE CALENDARIO ES 100', $arrayresultados);




	//$arrayresultados = self::test_atributo('RECURSO', 'validar_id_calendario', 'id_calendario', '111111111', '02118', 'EL TAMAÑO DEL id_calendario NO PUEDE SER MAYOR DE 3', $arrayresultados);
	//$arrayresultados = self::test_atributo('RECURSO', 'validar_id_calendario', 'id_calendario', '111111111', '02118', 'EL TAMAÑO DEL id_calendario NO PUEDE SER MAYOR DE 3', $arrayresultados);


	return $arrayresultados;
}

function test_validation_display(){
	
	$vacio = array();
	$arrayresultados = $this->test_validation($vacio);
	//include_once './VIEW/TEST_VIEW.php';
	new TEST_VIEW($arrayresultados);
}

function test_action($arrayresultados){

	
	$atributos = array('id_calendario'=>'10', 'nombre_calendario'=>'prueba', 'descripcion_calendario'=>'prueba','fecha_inicio_calendario'=>'2021-01-16'
,'fecha_fin_calendario'=>'2022-01-16','hora_inicio_calendario'=>'15:00:00','hora_fin_calendario'=>'22:00:00');
	$arrayresultados = self::test_accion('CALENDARIO', 'ADD', $atributos, '03400', 'INSERCION CALENDARIO CORRECTO', $arrayresultados);

	$atributos = array('id_calendario'=>'10', 'nombre_calendario'=>'prueba_modificado', 'descripcion_calendario'=>'prueba','fecha_inicio_calendario'=>'2021-01-16'
	,'fecha_fin_calendario'=>'2022-01-16','hora_inicio_calendario'=>'15:00:00','hora_fin_calendario'=>'22:00:00');
		$arrayresultados = self::test_accion('CALENDARIO', 'EDIT', $atributos, '03402', 'EDITAR CALENDARIO CORRECTO', $arrayresultados);

	
		$atributos = array('id_calendario'=>'10', 'nombre_calendario'=>'prueba_modificado', 'descripcion_calendario'=>'prueba','fecha_inicio_calendario'=>'2021-01-16'
		,'fecha_fin_calendario'=>'','hora_inicio_calendario'=>'15:00:00','hora_fin_calendario'=>'22:00:00');
			$arrayresultados = self::test_accion('CALENDARIO', 'EDIT', $atributos, '03403', 'EDITAR CALENDARIO FALLIDO', $arrayresultados);

	$atributos = array('id_calendario'=>'10', 'nombre_calendario'=>'prueba_modificado', 'descripcion_calendario'=>'prueba');
	$arrayresultados = self::test_accion('CALENDARIO', 'DELETE', $atributos, '03401', 'BORRADO CALENDARIO CORRECTO', $arrayresultados);

	
	
	return $arrayresultados;
}

function test_action_display(){

	$arrayresultados = $this->test_action(array());
	//include_once_once './VIEW/TEST_VIEW.php';
	new TEST_VIEW($arrayresultados);

}

}
?>