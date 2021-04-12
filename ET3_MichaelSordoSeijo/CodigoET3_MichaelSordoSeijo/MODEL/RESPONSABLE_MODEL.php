<?php

include_once './ABSTRACT_CLASS/ABSTRACT_CLASS.php';
include_once './COMMON/Validar_Model.php';
include_once './VIEW/TEST_VIEW.php';

class RESPONSABLE_MODEL extends Abstract_Model
{

	//ATRIBUTOS
	var $login_responsable;
	var $direccion_responsable;
	var $telefono_responsable;
	var $erroresdatos = [];
	var $email_usuario;


	//METODOS

	function __construct()
	{
		$this->fillfields();
		$this->conexion = $this->connection();
	}

	function fillfields()
	{

		$this->login_responsable = '';
		$this->direccion_responsable = '';
		$this->telefono_responsable = '';



		if ($_POST) {
			if (isset($_POST['login_responsable'])) $this->login_responsable = $_POST['login_responsable'];
			if (isset($_POST['direccion_responsable'])) $this->direccion_responsable = $_POST['direccion_responsable'];
			if (isset($_POST['telefono_responsable'])) $this->telefono_responsable = $_POST['telefono_responsable'];
		} else {
			if ($_GET) {
				if (isset($_GET['login_responsable'])) $this->login_responsable = $_GET['login_responsable'];
				if (isset($_GET['direccion_responsable'])) $this->direccion_responsable = $_GET['direccion_responsable'];
				if (isset($_GET['telefono_responsable'])) $this->telefono_responsable = $_GET['telefono_responsable'];
			}
		}
	}

	//Validaciones Back

	function validar_atributos()
	{

		$this->validar_login_responsable();
		$this->validar_direccion_responsable();
		$this->validar_telefono();


		//echo var_dump($this->validar_id_recurso());

		if ($this->erroresdatos === []) {
			return true;
		} else {
			return $this->erroresdatos;
		}
	}

	function validar_atributos_search()
	{
	}

	//Validar LOGIN_RESPONSABLE

	function validar_login_responsable()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'RESPONSABLE';

		if ($validar->Longitud_minima($this->login_responsable, 3) === false) {
			$this->code = '03116';
			$this->ok = false;
			$this->resource = 'RESPONSABLE';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}


		if ($validar->Longitud_maxima($this->login_responsable, 15) === false) {
			$this->code = '03115';
			$this->ok = false;
			$this->resource = 'RESPONSABLE';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($validar->Es_alfanumerico($this->login_responsable) === false) {
			$this->code = '03114';
			$this->ok = false;
			$this->resource = 'RESPONSABLE';
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


	//VALIDAR DIRECCION

	function validar_direccion_responsable()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'RESPONSABLE';


		if ($validar->Longitud_maxima($this->direccion_responsable, 60) === false) {
			$this->code = '04118';
			$this->ok = false;
			$this->resource = 'RESPONSABLE';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($validar->Es_direccion($this->direccion_responsable) === false) {
			$this->code = '04117';
			$this->ok = false;
			$this->resource = 'RESPONSABLE';
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

	function validar_telefono()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'RESPONSABLE';


		if ($validar->Longitud_maxima($this->telefono_responsable, 9) === false) {
			$this->code = '04120';
			$this->ok = false;
			$this->resource = 'RESPONSABLE';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($validar->Es_numerico($this->telefono_responsable) === false) {
			$this->code = '04119';
			$this->ok = false;
			$this->resource = 'RESPONSABLE';
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

	function ADD()
	{


		if (is_array($this->validar_atributos())) {
			return $this->erroresdatos;
		}

		$this->seek();
		if (($this->feedback['code']) === '00004') { //existe el usuario
			$this->feedback['ok'] = false;
			$this->feedback['code'] = '02101'; //usuario ya existe
		} else {
			// construimos la sentencia de insercion en la bd
			$this->query = "INSERT INTO RESPONSABLE_RECURSO
				(LOGIN_RESPONSABLE,
				DIRECCION_RESPONSABLE,
				TELEFONO_RESPONSABLE)
			VALUES
				('$this->login_responsable',
				'$this->direccion_responsable',
				'$this->telefono_responsable'
				
			)";

			$this->execute_single_query();

			if ($this->feedback['ok']) {
				$this->feedback['code'] = '08001'; //insertado con exito
			} else {
				if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
					$this->feedback['code'] = '02106'; //insercion fallida
			}
		}

		return $this->feedback;
	}

	function SEARCH()
	{

		// construimos la sentencia sql de búsqueda con comodines		
		$this->query = "SELECT * FROM RESPONSABLE_RECURSO
	WHERE
	(
		(LOGIN_RESPONSABLE LIKE '%$this->login_responsable%') and
		(DIRECCION_RESPONSABLE LIKE '%$this->direccion_responsable%') and
		(TELEFONO_RESPONSABLE LIKE '%$this->telefono_responsable%') 
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
		$this->query = "SELECT * FROM RESPONSABLE_RECURSO
					WHERE
					(
						(LOGIN_RESPONSABLE = '$this->login_responsable')
					)";

		$this->get_one_result_from_query();

		// recuperamos la unica fila que viene en el recordset resultado de la consulta
		$fila = $this->rows;

		return $fila;
	}

	function getById($atributo, $valor)
	{

		// construimos la sentencia sql de búsqueda con valor concreto de clave		
		$sql = "SELECT * FROM RESPONSABLE_RECURSO
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

		if (is_array($this->validar_atributos())) {
			return $this->erroresdatos;
		}

		// construimos la sentencia sql de búsqueda con valor concreto de clave		
		$this->query = "UPDATE RESPONSABLE_RECURSO SET
				
		DIRECCION_RESPONSABLE = '$this->direccion_responsable',
		TELEFONO_RESPONSABLE = '$this->telefono_responsable'

		
		WHERE
		(LOGIN_RESPONSABLE = '$this->login_responsable')
		";

		$this->execute_single_query();

		if ($this->feedback['ok']) {
			$this->feedback['code'] = '08002'; //modificado con exito
		} else {
			if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
				$this->feedback['code'] = '08004'; //modificacion fallida
		}

		return $this->feedback;
	}

	function DELETE()
	{

		// construimos la sentencia sql de borrado con el valor concreto de clave a borrar		
		$this->query = "DELETE FROM RESPONSABLE_RECURSO 
		WHERE
		(LOGIN_RESPONSABLE = '$this->login_responsable')
		";

		$this->execute_single_query();

		if ($this->feedback['ok']) {
			$this->feedback['code'] = '08003'; //borrado con exito
		} else {
			if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
				$this->feedback['code'] = '02108'; //borrado fallido
		}

		return $this->feedback;
	}

	//funcion para ver si es un responsable

	function esResponsable()
	{


		$sql = "SELECT RESPONSABLE_RECURSO.LOGIN_RESPONSABLE,USUARIO.LOGIN_USUARIO  
			FROM RESPONSABLE_RECURSO,USUARIO
			WHERE
				RESPONSABLE_RECURSO.LOGIN_RESPONSABLE = $_SESSION ['LOGIN_USUARIO'];";

		// ejecutamos la consulta y guardamos los resultados en una variable
		$respuesta = $this->conexion->query($sql) or die('error al buscar');

		if ($respuesta == "") {
			return false;
		} else {
			return true;
		}
	}



	//TEST
	function test_validation($arrayresultados)
	{

		$arrayresultados = self::test_atributo('RESPONSABLE', 'validar_login_responsable', 'login_responsable', '098--', '03114', 'SOLO VALORES ALFANUMÉRICOS', $arrayresultados);
		$arrayresultados = self::test_atributo('RESPONSABLE', 'validar_login_responsable', 'login_responsable', 'Jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '03115', 'TAMAÑO MÁXIMO 15', $arrayresultados);
		$arrayresultados = self::test_atributo('RESPONSABLE', 'validar_direccion_responsable', 'direccion_responsable', '/&Ourense', '04117', 'SOLO FORMATO DE DIRECCION', $arrayresultados);
		$arrayresultados = self::test_atributo('RESPONSABLE', 'validar_direccion_responsable', 'direccion_responsable', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '04118', 'TAMAÑO MÁXIMO 60', $arrayresultados);
		$arrayresultados = self::test_atributo('RESPONSABLE', 'validar_telefono', 'telefono_responsable', 'nueve', '04119', 'SOLO FORMATO DE TELEFONO', $arrayresultados);
		$arrayresultados = self::test_atributo('RESPONSABLE', 'validar_telefono', 'telefono_responsable', '9999999999999', '04120', 'TAMAÑO MÁXIMO 9', $arrayresultados);


		//$arrayresultados = self::test_atributo('RECURSO', 'validar_id_recurso', 'id_recurso', '111111111', '02118', 'EL TAMAÑO DEL ID_RECURSO NO PUEDE SER MAYOR DE 3', $arrayresultados);
		//$arrayresultados = self::test_atributo('RECURSO', 'validar_id_recurso', 'id_recurso', '111111111', '02118', 'EL TAMAÑO DEL ID_RECURSO NO PUEDE SER MAYOR DE 3', $arrayresultados);


		return $arrayresultados;
	}

	function test_validation_display()
	{

		$vacio = array();
		$arrayresultados = $this->test_validation($vacio);
		//include_once './VIEW/TEST_VIEW.php';
		new TEST_VIEW($arrayresultados);
	}

	function test_action($arrayresultados)
	{


		$atributos = array('login_responsable' => 'michael', 'direccion_responsable' => 'Lugo', 'telefono_responsable' => '663029776');
		$arrayresultados = self::test_accion('RESPONSABLE', 'ADD', $atributos, '08001', 'INSERCION RESPONSABLE CORRECTO', $arrayresultados);

		$atributos = array('login_responsable' => 'michael', 'direccion_responsable' => 'Ourense', 'telefono_responsable' => '663029776');
		$arrayresultados = self::test_accion('RESPONSABLE', 'EDIT', $atributos, '08002', 'EDITAR RESPONSABLE CORRECTO', $arrayresultados);

		$atributos = array('login_responsable' => 'michael', 'direccion_responsable' => 'Ourense', 'telefono_responsable' => '663029776');
		$arrayresultados = self::test_accion('RESPONSABLE', 'DELETE', $atributos, '08003', 'BORRADO DE RESPONSABLE', $arrayresultados);

		



		return $arrayresultados;
	}

	function test_action_display()
	{

		$arrayresultados = $this->test_action(array());
		//include_once_once './VIEW/TEST_VIEW.php';
		new TEST_VIEW($arrayresultados);
	}
}
