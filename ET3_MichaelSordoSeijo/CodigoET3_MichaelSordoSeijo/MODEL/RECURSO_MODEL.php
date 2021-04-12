<?php

include_once './ABSTRACT_CLASS/ABSTRACT_CLASS.php';
include_once './COMMON/Validar_Model.php';
include_once './VIEW/TEST_VIEW.php';

class RECURSO_MODEL extends Abstract_Model
{

	//ATRIBUTOS
	var $id_recurso;
	var $nombre_recurso;
	var $descripcion_recurso;
	var $login_responsable;
	var $tarifa_recurso;
	var $rango_tarifa;
	var $erroresdatos = [];
	var $conexion;

	//METODOS

	function __construct()
	{
		$this->fillfields();
		$this->conexion = $this->connection();
	}

	function fillfields()
	{

		$this->id_recurso = '';
		$this->nombre_recurso = '';
		$this->descripcion_recurso = '';
		$this->login_responsable = '';
		$this->tarifa_recurso = '';
		$this->rango_tarifa = '';




		if ($_POST) {
			if (isset($_POST['id_recurso'])) $this->id_recurso = $_POST['id_recurso'];
			if (isset($_POST['nombre_recurso'])) $this->nombre_recurso = $_POST['nombre_recurso'];
			if (isset($_POST['descripcion_recurso'])) $this->descripcion_recurso = $_POST['descripcion_recurso'];
			if (isset($_POST['login_responsable'])) $this->login_responsable = $_POST['login_responsable'];
			if (isset($_POST['tarifa_recurso'])) $this->tarifa_recurso = $_POST['tarifa_recurso'];
			if (isset($_POST['rango_tarifa'])) $this->rango_tarifa = $_POST['rango_tarifa'];
		} else {
			if ($_GET) {
				if (isset($_GET['id_recurso'])) $this->id_recurso = $_GET['id_recurso'];
				if (isset($_GET['nombre_recurso'])) $this->nombre_recurso = $_GET['nombre_recurso'];
				if (isset($_GET['descripcion_recurso'])) $this->descripcion_recurso = $_GET['descripcion_recurso'];
				if (isset($_GET['login_responsable'])) $this->login_responsable = $_GET['login_responsable'];
				if (isset($_GET['tarifa_recurso'])) $this->tarifa_recurso = $_GET['tarifa_recurso'];
				if (isset($_GET['rango_tarifa'])) $this->rango_tarifa = $_GET['rango_tarifa'];
			}
		}
	}

	//Validaciones Back

	function validar_atributos()
	{

		$this->validar_id_recurso();
		$this->validar_nombre_recurso();
		$this->validar_descripcion_recurso();
		$this->validar_login_responsable();
		$this->validar_tarifa_recurso();

		//echo var_dump($this->validar_id_recurso());

		if ($this->erroresdatos === []){
			return true;
			
		}
		else{
			return $this->erroresdatos;
		}
	}

	function validar_atributos_search(){

	}

	function validar_id_recurso()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'RECURSO';

		if ($validar->Longitud_maxima($this->id_recurso, 3)===false) {
			$this->code = '02118';
			$this->ok = false;
			$this->resource = 'RECURSO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($validar->Es_numerico($this->id_recurso) === false) {
			$this->code = '02119';
			$this->ok = false;
			$this->resource = 'RECURSO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($this->ok) {
			return true;
			
		}else{
			
	

		return $this->erroresdatos;
		}
	}

	//Validar NOMBRE_RECURSO

	function validar_nombre_recurso()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'RECURSO';

		if ($validar->Longitud_maxima($this->nombre_recurso, 40) === false) {
			$this->code = '03111';
			$this->ok = false;
			$this->resource = 'RECURSO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($validar->Es_string($this->nombre_recurso) === false) {
			$this->code = '03110';
			$this->ok = false;
			$this->resource = 'RECURSO';
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


	//Validar DESCRIPCION_RECURSO

	function validar_descripcion_recurso()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'RECURSO';

		if ($validar->Longitud_maxima($this->descripcion_recurso, 100) === false) {
			$this->code = '03113';
			$this->ok = false;
			$this->resource = 'RECURSO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($validar->Es_string_espacios($this->descripcion_recurso) === false) {
			$this->code = '03112';
			$this->ok = false;
			$this->resource = 'RECURSO';
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


	//Validar LOGIN_RESPONSABLE

	function validar_login_responsable()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'RECURSO';

		if ($validar->Longitud_minima($this->login_responsable, 3) === false) {
			$this->code = '03116';
			$this->ok = false;
			$this->resource = 'RECURSO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}


		if ($validar->Longitud_maxima($this->login_responsable, 15) === false) {
			$this->code = '03115';
			$this->ok = false;
			$this->resource = 'RECURSO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($validar->Es_alfanumerico($this->login_responsable) === false) {
			$this->code = '03114';
			$this->ok = false;
			$this->resource = 'RECURSO';
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


	//validar TARIFA_RECURSO

	function validar_tarifa_recurso()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'RECURSO';

		if ($validar->Longitud_maxima($this->tarifa_recurso, 3) === false) {
			$this->code = '03118';
			$this->ok = false;
			$this->resource = 'RECURSO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
			//echo var_dump(array_push($this->erroresdatos, $this->feedback));
		}

		if ($validar->Es_numerico($this->tarifa_recurso) === false) {
			$this->code = '03117';
			$this->ok = false;
			$this->resource = 'RECURSO';
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
		
		//var_dump($this->validar_atributos());

		if (is_array($this->validar_atributos())){
			return $this->erroresdatos;
		}

		$this->seek();
		if (($this->feedback['code']) === '00004'){ //existe el ID_RECURSO
			$this->feedback['ok'] = false;
			$this->feedback['code'] = '01101'; //RECURSO ya existe
		}
		else{
		// construimos la sentencia de insercion en la bd
			$this->query = 	"INSERT INTO RECURSO
			(ID_RECURSO,
			NOMBRE_RECURSO,
			DESCRIPCION_RECURSO,
			LOGIN_RESPONSABLE,
			TARIFA_RECURSO,
			RANGO_TARIFA_RECURSO)
		VALUES
			('$this->id_recurso',
			'$this->nombre_recurso',
			'$this->descripcion_recurso',
			'$this->login_responsable',
			'$this->tarifa_recurso',
			'$this->rango_tarifa'
		)";

			//echo $this->query ;
			$this->execute_single_query();

			if ($this->feedback['ok']){
				$this->feedback['code'] = '03001'; //insertado con exito
			}
			else{
				if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
					$this->feedback['code'] = '01100'; //insercion fallida
			}
		}

		return $this->feedback;
}

	function SEARCH()
	{

		// construimos la sentencia sql de búsqueda con comodines		
		$this->query = "SELECT * FROM RECURSO
	WHERE
	(
		(ID_RECURSO LIKE '%$this->id_recurso%') and
		(NOMBRE_RECURSO LIKE '%$this->nombre_recurso%') and
		(DESCRIPCION_RECURSO LIKE '%$this->descripcion_recurso%') and
		(LOGIN_RESPONSABLE LIKE '%$this->login_responsable%') and
		(TARIFA_RECURSO LIKE '%$this->tarifa_recurso%') and
		(RANGO_TARIFA_RECURSO LIKE '%$this->rango_tarifa%')



	)";
		// ejecutamos la consulta y guardamos los resultados en una variable
		$this->get_results_from_query();

		if ($this->feedback['ok'] === true) {
			$this->feedback['resource'] = $this->rows;
		}

		return $this->feedback;
	} //fin de searchall

	function seek()
	{

		// construimos la sentencia sql de búsqueda con valor concreto de clave		
		$this->query = "SELECT * FROM RECURSO
					WHERE
					(
						(ID_RECURSO = '$this->id_recurso')
					)";

		$this->get_one_result_from_query();

		// recuperamos la unica fila que viene en el recordset resultado de la consulta
		$fila = $this->rows;

		return $fila;
	}

	function getById($atributo, $valor)
	{

		// construimos la sentencia sql de búsqueda con valor concreto de clave		
		$sql = "SELECT * FROM RECURSO
					WHERE
					(
						($atributo = '$valor')
					)";

		$this->get_one_result_from_query();

		// recuperamos la unica fila que viene en el recordset resultado de la consulta
		$fila = $this->rows;

		return $fila;
	}

	function EDIT()
	{

		if (is_array($this->validar_atributos())){
			return $this->erroresdatos;
		}

		// construimos la sentencia sql de búsqueda con valor concreto de clave		
		$this->query = "UPDATE RECURSO SET
		NOMBRE_RECURSO = '$this->nombre_recurso',
		DESCRIPCION_RECURSO = '$this->descripcion_recurso',
		LOGIN_RESPONSABLE = '$this->login_responsable',
		TARIFA_RECURSO = '$this->tarifa_recurso',
		RANGO_TARIFA_RECURSO = '$this->rango_tarifa'
		
		WHERE
		(ID_RECURSO = '$this->id_recurso')
		";

		$this->execute_single_query();

		if ($this->feedback['ok']) {
			$this->feedback['code'] = '03002'; //modificado con exito
		} else {
			if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
				$this->feedback['code'] = '03003'; //modificacion fallida
		}

		return $this->feedback;
	}

	function DELETE()
	{

		// construimos la sentencia sql de borrado con el valor concreto de clave a borrar		
		$this->query = "DELETE FROM RECURSO
		WHERE
		(ID_RECURSO = '$this->id_recurso')
		";

		$this->execute_single_query();

		if ($this->feedback['ok']) {
			$this->feedback['code'] = '03004'; //borrado con exito
		} else {
			if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
				$this->feedback['code'] = '02108'; //borrado fallido
		}

		return $this->feedback;
	}


//TEST
function test_validation($arrayresultados){
	
	$arrayresultados = self::test_atributo('RECURSO', 'validar_id_recurso', 'id_recurso', '111111111', '02118', 'EL TAMAÑO DEL ID_RECURSO NO PUEDE SER MAYOR DE 3', $arrayresultados);
	$arrayresultados = self::test_atributo('RECURSO', 'validar_id_recurso', 'id_recurso', 'pr', '02119', 'EL ID DE RECURSO SOLO PUEDE TENER NUMEROS', $arrayresultados);
	$arrayresultados = self::test_atributo('RECURSO', 'validar_nombre_recurso', 'nombre_recurso', '111111111', '03110', 'EL NOMBRE SOLO PUEDE TENER LETRAS', $arrayresultados);
	$arrayresultados = self::test_atributo('RECURSO', 'validar_nombre_recurso', 'nombre_recurso', 'recursodecuarenteaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '03111', 'EL TAMAÑO DEL MAXIMO DEL NOMBRE DE RECURSO ES 40', $arrayresultados);
	$arrayresultados = self::test_atributo('RECURSO', 'validar_descripcion_recurso', 'descripcion_recurso', '//dESCRipci¡?', '03112', 'DEBE SER ALFANUMERICO', $arrayresultados);
	$arrayresultados = self::test_atributo('RECURSO', 'validar_descripcion_recurso', 'descripcion_recurso', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '03113', 'EL TAMAÑO DEL MAXIMO DEL NOMBRE DE RECURSO ES 100', $arrayresultados);
	$arrayresultados = self::test_atributo('RECURSO', 'validar_login_responsable', 'login_responsable', '098--', '03114', 'SOLO VALORES ALFANUMÉRICOS', $arrayresultados);
	$arrayresultados = self::test_atributo('RECURSO', 'validar_login_responsable', 'login_responsable', 'Jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '03115', 'TAMAÑO MÁXIMO 15', $arrayresultados);
	$arrayresultados = self::test_atributo('RECURSO', 'validar_tarifa_recurso', 'tarifa_recurso', 'Do', '03117', 'SOLO NUMEROS', $arrayresultados);
	$arrayresultados = self::test_atributo('RECURSO', 'validar_tarifa_recurso', 'tarifa_recurso', '1234', '03118', 'TAMAÑO MÁXIMO 3', $arrayresultados);



	//$arrayresultados = self::test_atributo('RECURSO', 'validar_id_recurso', 'id_recurso', '111111111', '02118', 'EL TAMAÑO DEL ID_RECURSO NO PUEDE SER MAYOR DE 3', $arrayresultados);
	//$arrayresultados = self::test_atributo('RECURSO', 'validar_id_recurso', 'id_recurso', '111111111', '02118', 'EL TAMAÑO DEL ID_RECURSO NO PUEDE SER MAYOR DE 3', $arrayresultados);


	return $arrayresultados;
}

function test_validation_display(){
	
	$vacio = array();
	$arrayresultados = $this->test_validation($vacio);
	//include_once './VIEW/TEST_VIEW.php';
	new TEST_VIEW($arrayresultados);
}

function test_action($arrayresultados){

	
	$atributos = array('id_recurso'=>'10', 'nombre_recurso'=>'prueba', 'descripcion_recurso'=>'prueba', 'login_responsable'=>'admin','tarifa_recurso'=>'10','rango_tarifa'=>'HORA');
	$arrayresultados = self::test_accion('RECURSO', 'ADD', $atributos, '03001', 'INSERCION RECURSO CORRECTO', $arrayresultados);

	$atributos = array('id_recurso'=>'10', 'nombre_recurso'=>'prueba', 'descripcion_recurso'=>'pruebamodificado', 'login_responsable'=>'admin','tarifa_recurso'=>'10','rango_tarifa'=>'HORA');
	$arrayresultados = self::test_accion('RECURSO', 'EDIT', $atributos, '03002', 'MODIFICACION RECURSO CORRECTO', $arrayresultados);

	$atributos = array('id_recurso'=>'10', 'nombre_recurso'=>'prueba', 'descripcion_recurso'=>'prueba_modificado', 'login_responsable'=>'admin','tarifa_recurso'=>'10','rango_tarifa'=>'HORA');
	$arrayresultados = self::test_accion('RECURSO', 'DELETE', $atributos, '03004', 'RECURSO ELIMINADO CORRECTO', $arrayresultados);

	
	
	return $arrayresultados;
}

function test_action_display(){

	$arrayresultados = $this->test_action(array());
	//include_once_once './VIEW/TEST_VIEW.php';
	new TEST_VIEW($arrayresultados);

}


}
?>