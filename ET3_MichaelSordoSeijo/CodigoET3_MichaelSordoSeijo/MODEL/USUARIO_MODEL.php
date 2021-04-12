<?php

include_once './ABSTRACT_CLASS/ABSTRACT_CLASS.php';
include_once './COMMON/Validar_Model.php';
include_once './VIEW/TEST_VIEW.php';

class USUARIO_MODEL extends Abstract_Model
{

	//ATRIBUTOS
	var $login_usuario;
	var $pass_usuario;
	var $nombre_usuario;
	var $email_usuario;
	var $es_admin;
	var $es_activo;
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

		$this->login_usuario = '';
		$this->pass_usuario = '';
		$this->nombre_usuario = '';
		$this->email_usuario = '';
		$this->es_admin = '';
		$this->es_activo = '';



		if ($_POST) {
			if (isset($_POST['login_usuario'])) $this->login_usuario = $_POST['login_usuario'];
			if (isset($_POST['pass_usuario'])) $this->pass_usuario = $_POST['pass_usuario'];
			if (isset($_POST['nombre_usuario'])) $this->nombre_usuario = $_POST['nombre_usuario'];
			if (isset($_POST['email_usuario'])) $this->email_usuario = $_POST['email_usuario'];
			if (isset($_POST['es_admin'])) $this->es_admin = $_POST['es_admin'];
			if (isset($_POST['es_activo'])) $this->es_activo = $_POST['es_activo'];
		} else {
			if ($_GET) {
				if (isset($_GET['login_usuario'])) $this->login_usuario = $_GET['login_usuario'];
				if (isset($_GET['pass_usuario'])) $this->pass_usuario = $_GET['pass_usuario'];
				if (isset($_GET['nombre_usuario'])) $this->nombre_usuario = $_GET['nombre_usuario'];
				if (isset($_GET['email_usuario'])) $this->email_usuario = $_GET['email_usuario'];
				if (isset($_GET['es_admin'])) $this->es_admin = $_GET['es_admin'];
				if (isset($_GET['es_activo'])) $this->es_activo = $_GET['es_activo'];
			}
		}
	}

	function existe_usuario()
	{

		$fila = $this->seek(); // busco en la bd por el login de usuario.

		if (!empty($fila)) {
			return true; // el usuario existe
		} else {
			return false; // el usuario no existe
		}
	}

	function password_correcta()
	{

		$fila = $this->seek();

		if ($this->pass_usuario === $fila['PASS_USUARIO']) {
			return true;
		} else {
			return false;
		}
	}

	function existe_email()
	{

		$fila = $this->getById('EMAIL_USUARIO', $this->email_usuario);

		if (empty($fila)) {
			return false;
		} else {
			return true;
		}
	}

	function registrar()
	{

		if (!($this->existe_usuario())) { //no existe el usuario
			if (!($this->existe_email())) { //no existe el email
				$this->ADD();
				$this->feedback['code'] = '02004'; //registrado correctamente
			} else {
				$this->feedback['code'] = '02104'; // el email ya existe
			}
		} else {
			$this->feedback['code'] = '02105'; // existe el usuario
		}
		return $this->feedback;
	}

	function login()
	{

		if ($this->existe_usuario()) {
			if (!($this->password_correcta())) {
				$this->feedback['ok'] = false;
				$this->feedback['code'] = '02103'; // password incorrecta
			} else {
				//rellenamos los campos
				$fila = $this->seek();
				$this->login_usuario = $fila["LOGIN_USUARIO"];
				$this->pass_usuario = $fila["PASS_USUARIO"];
				$this->nombre_usuario = $fila["NOMBRE_USUARIO"];
				$this->email_usuario = $fila["EMAIL_USUARIO"];
				$this->es_admin = $fila["ES_ADMIN"];
				$this->es_activo = $fila["ES_ACTIVO"];

				$this->feedback['ok'] = true;
				$this->feedback['code'] = '02106'; // login y password correcto
			}
		} else {
			$this->feedback['ok'] = false;
			return '02102'; // no existe el usuario
		}
		return $this->feedback;
	}

	function validar_atributos()
	{

		$this->validar_login_usuario();
		$this->validar_nombre_usuario();
		$this->validar_email_usuario();
		$this->validar_es_admin();
		$this->validar_es_activo();


		if ($this->erroresdatos === []) {
			return true;
		} else {
			return $this->erroresdatos;
		}
	}


	function validar_login_usuario()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'USUARIO';

		if ($validar->Longitud_minima($this->login_usuario, 3) === false) {
			$this->code = '02110';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($validar->Longitud_maxima($this->login_usuario, 15) === false) {
			$this->code = '02111';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($validar->Es_string_espacios_guiones_todos($this->login_usuario) === false) {
			$this->code = '02112';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}else{
			$this->code = '00000';
			$this->ok = false;
			$this->resource = 'USUARIO';
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


	function validar_nombre_usuario()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'USUARIO';

		if ($validar->No_vacio($this->nombre_usuario) === false) {
			$this->code = '02113';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($validar->Longitud_maxima($this->nombre_usuario, 60) === false) {
			$this->code = '02114';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($validar->Es_string_espacios_guiones($this->nombre_usuario) === false) {
			$this->code = '02115';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}else{
			$this->code = '00000';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);

		}

		if ($this->ok) {
			return true;
		}

		return $this->erroresdatos;
	}

	function validar_email_usuario()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'USUARIO';

		if ($validar->Longitud_maxima($this->email_usuario, 40) === false) {
			$this->code = '02119';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($validar->Formato_email($this->email_usuario) === false) {
			$this->code = '02116';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}else{
			$this->code = '00000';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);

		}

		if ($this->ok) {
			return true;
		}

		return $this->erroresdatos;
	}

	function validar_es_admin()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'USUARIO';

		if ($validar->En_valores($this->es_admin, array('SI', 'NO')) === false) {
			$this->code = '02117';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}else{
			//Si no introducimos esto aqui no funciona los test, porque va con el array vacio, y no lleva el code 0000
			$this->code = '00000';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($this->ok) {
			return true;
		}

		

		return $this->erroresdatos;
	}

	function validar_es_activo()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'USUARIO';

		if ($validar->En_valores($this->es_activo, array('SI', 'NO')) === false) {
			$this->code = '02118';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}else{
			$this->code = '00000';
			$this->ok = false;
			$this->resource = 'USUARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);

		}

		if ($this->ok) {
			return true;
		}

		return $this->erroresdatos;
	}



	function ADD()
	{

		$this->seek();
		if (($this->feedback['code']) === '00004') { //existe el usuario
			$this->feedback['ok'] = false;
			$this->feedback['code'] = '02101'; //usuario ya existe
			//$this->feedback['code'] = '02104'; //email ya existe
		} else {
			// construimos la sentencia de insercion en la bd
			$this->query = 	"INSERT INTO USUARIO
								(LOGIN_USUARIO,
								PASS_USUARIO,
								NOMBRE_USUARIO,
								EMAIL_USUARIO,
								ES_ADMIN,
								ES_ACTIVO)
							VALUES
								('$this->login_usuario',
								'$this->pass_usuario',
								'$this->nombre_usuario',
								'$this->email_usuario',
								'$this->es_admin',
								'$this->es_activo'
							)";
			//var_dump($this->query);
			$this->execute_single_query();

			if ($this->feedback['ok']) {
				$this->feedback['code'] = '02001'; //insertado con exito
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
		$this->query = "SELECT * FROM USUARIO
					WHERE
					(
						(LOGIN_USUARIO LIKE '%$this->login_usuario%') and
						(PASS_USUARIO LIKE '%$this->pass_usuario%') and
						(NOMBRE_USUARIO LIKE '%$this->nombre_usuario%') and
						(EMAIL_USUARIO LIKE '%$this->email_usuario%') and
						(ES_ADMIN LIKE '%$this->es_admin%') and
						(ES_ACTIVO LIKE '%$this->es_activo%')
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
		$this->query = "SELECT * FROM USUARIO
						WHERE
						(
							(LOGIN_USUARIO = '$this->login_usuario')
						)";

		$this->get_one_result_from_query();

		// recuperamos la unica fila que viene en el recordset resultado de la consulta
		$fila = $this->rows;

		return $fila;
	}

	function getById($atributo, $valor)
	{

		// construimos la sentencia sql de búsqueda con valor concreto de clave		
		$sql = "SELECT * FROM USUARIO
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


		// construimos la sentencia sql de búsqueda con valor concreto de clave		
		$this->query = "UPDATE USUARIO SET
					PASS_USUARIO = '$this->pass_usuario',
					NOMBRE_USUARIO = '$this->nombre_usuario',
					EMAIL_USUARIO = '$this->email_usuario',
					ES_ADMIN = '$this->es_admin',
					ES_ACTIVO = '$this->es_activo'
					
					WHERE
					(LOGIN_USUARIO = '$this->login_usuario')
					";

		$this->execute_single_query();

		if ($this->feedback['ok']) {
			$this->feedback['code'] = '02002'; //modificado con exito
		} else {
			if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
				$this->feedback['code'] = '02107'; //modificacion fallida
		}

		return $this->feedback;
	}

	//Para editar solo el perfil de cada usuario
	function EDIT_PERFIL()
	{


		// construimos la sentencia sql de búsqueda con valor concreto de clave		
		$this->query = "UPDATE USUARIO SET
					PASS_USUARIO = '$this->pass_usuario',
					NOMBRE_USUARIO = '$this->nombre_usuario',
					EMAIL_USUARIO = '$this->email_usuario'
	
					
					WHERE
					(LOGIN_USUARIO = '$this->login_usuario')
					";

		$this->execute_single_query();

		if ($this->feedback['ok']) {
			$this->feedback['code'] = '02002'; //modificado con exito
		} else {
			if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
				$this->feedback['code'] = '02107'; //modificacion fallida
		}

		return $this->feedback;
	}

	function DELETE()
	{

		// construimos la sentencia sql de borrado con el valor concreto de clave a borrar		
		$this->query = "DELETE FROM USUARIO 
					WHERE
					(LOGIN_USUARIO = '$this->login_usuario')
					";

		$this->execute_single_query();

		if ($this->feedback['ok']) {
			$this->feedback['code'] = '02003'; //borrado con exito
		} else {
			if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
				$this->feedback['code'] = '02108'; //borrado fallido
		}

		return $this->feedback;
	}




	//TEST

	function test_validation($arrayresultados)
	{

		$arrayresultados = self::test_atributo('USUARIO', 'validar_login_usuario', 'login_usuario', 'jrodeiro', '00000', 'login usuario correcto', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_login_usuario', 'login_usuario', 'jr', '02110', 'login usuario pequeño', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_login_usuario', 'login_usuario', 'jrodeiroiiiiiiiiiiiiiii', '02111', 'login usuario largo', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_login_usuario', 'login_usuario', 'jrodeiro%', '02112', 'login usuario incorrecto', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_nombre_usuario', 'nombre_usuario', 'Javier Rodeiro Iglesias', '00000', 'nombre usuario correcto', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_nombre_usuario', 'nombre_usuario', '', '02113', 'nombre usuario vacio', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_nombre_usuario', 'nombre_usuario', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '02114', 'nombre usuario largo', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_nombre_usuario', 'nombre_usuario', 'Javier Rodeiro _ Iglesias', '02115', 'nombre usuario incorrecto', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_email_usuario', 'email_usuario', 'jrodeiro@uvigo.es', '00000', 'email usuario correcto', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_email_usuario', 'email_usuario', 'jrodeiro@uvigo', '02116', 'email usuario NO correcto', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_email_usuario', 'email_usuario', 'jrodeiro@uvigoxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '02119', 'email usuario largo', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_es_admin', 'es_admin', 'SI', '00000', 'es admin correcto', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_es_admin', 'es_admin', 'NO', '00000', 'es admin correcto', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_es_admin', 'es_admin', 'ca', '02117', 'no es admin correcto', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_es_activo', 'es_activo', 'SI', '00000', 'es activo correcto', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_es_activo', 'es_activo', 'NO', '00000', 'es activo correcto', $arrayresultados);
		$arrayresultados = self::test_atributo('USUARIO', 'validar_es_activo', 'es_activo', 'tu', '02118', 'no es activo correcto', $arrayresultados);

		return $arrayresultados;
	}

	function test_validation_display()
	{

		$vacio = array();
		$arrayresultados = $this->test_validation($vacio);
		//include_once_once './VIEW/TEST_VIEW.php';
		new TEST_VIEW($arrayresultados);
	}

	function test_action($arrayresultados)
	{


		$atributos = array('login_usuario' => 'jriglesias', 'pass_usuario' => 'lakjdflajflakf', 'nombre_usuario' => 'Javier Rodeiro Iglesias', 'email_usuario' => 'jriglesias@esei.uvigo.es', 'es_admin' => 'NO', 'es_activo' => 'SI');
		$arrayresultados = self::test_accion('USUARIO', 'ADD', $atributos, '02001', 'insercion usuario correcta', $arrayresultados);

		//$atributos = array('login_usuario' => 'jriglesi', 'pass_usuario' => 'lkajdflkajflkajfl', 'nombre_usuario' => 'Javier Rodeiro Iglesia', 'email_usuario' => 'jriglesias@esei.uvigo.es', 'es_admin' => 'SI', 'es_activo' => 'SI');
		//$arrayresultados = self::test_accion('USUARIO', 'ADD', $atributos, '02104', 'email duplicado', $arrayresultados);

		$atributos = array('login_usuario' => 'jriglesias', 'pass_usuario' => 'lakjdflajflakf', 'nombre_usuario' => 'Javier Rodeiro Iglesias', 'email_usuario' => 'jriglesias1@esei.uvigo.es', 'es_admin' => 'NO', 'es_activo' => 'SI');
		$arrayresultados = self::test_accion('USUARIO', 'ADD', $atributos, '02101', 'usuario ya existe', $arrayresultados);

		$atributos = array('login_usuario' => 'jriglesias', 'pass_usuario' => 'lakjdflajflakf', 'nombre_usuario' => 'Javier Rodeiro Iglesias', 'email_usuario' => 'jriglesias@esei.uvigo.es', 'es_admin' => 'SI', 'es_activo' => 'SI');
		$arrayresultados = self::test_accion('USUARIO', 'EDIT', $atributos, '02002', 'modificacion USUARIO correcta', $arrayresultados);

		$atributos = array('login_usuario' => 'jriglesias', 'pass_usuario' => 'lakjdflajflakf', 'nombre_usuario' => 'Javier Rodeiro Iglesias', 'email_usuario' => 'jriglesias@esei.uvigo.es', 'es_admin' => 'SI', 'es_activo' => 'SI');
		$arrayresultados = self::test_accion('USUARIO', 'DELETE', $atributos, '02003', 'borrado USUARIO correcto', $arrayresultados);

		return $arrayresultados;
	}

	function test_action_display()
	{

		$vacio = array();
		$arrayresultados = $this->test_action($vacio);
		//include_once_once './VIEW/TEST_VIEW.php';
		new TEST_VIEW($arrayresultados);
	}
}
