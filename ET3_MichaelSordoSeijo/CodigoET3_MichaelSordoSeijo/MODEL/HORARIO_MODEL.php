<?php

include_once './ABSTRACT_CLASS/ABSTRACT_CLASS.php';
include_once './COMMON/Validar_Model.php';
include_once './VIEW/TEST_VIEW.php';

class HORARIO_MODEL extends Abstract_Model
{

	//ATRIBUTOS
	var $id_horario;
	var $id_calendario;
	var $id_recurso;
	var $fecha_horario;
	var $hora_inicio_horario;
	var $hora_fin_horario;
	var $motivo_horario;
	var $fecha_solicitud_recurso;
	var $login_usuario;
	var $es_reserva;
	var $es_rechazada;
	var $fecha_respuesta_recurso;
	var $motivo_rechazo_solicitud;
	var $fue_usado;
	var $coste_solicitud;
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

		$this->id_horario = '';
		$this->id_calendario = '';
		$this->id_recurso = '';
		$this->fecha_horario = '';
		$this->hora_inicio_horario = '';
		$this->hora_fin_horario = '';
		$this->motivo_horario = '';
		$this->fecha_solicitud_recurso = '';
		$this->login_usuario = '';
		$this->es_reserva = '';
		$this->es_rechazada = '';
		$this->fecha_respuesta_recurso = '';
		$this->motivo_rechazo_solicitud = '';
		$this->fue_usado = '';
		$this->coste_solicitud = '';





		if ($_POST) {
			if (isset($_POST['id_horario'])) $this->id_horario = $_POST['id_horario'];
			if (isset($_POST['id_calendario'])) $this->id_calendario = $_POST['id_calendario'];
			if (isset($_POST['id_recurso'])) $this->id_recurso = $_POST['id_recurso'];
			if (isset($_POST['fecha_horario'])) $this->fecha_horario = $_POST['fecha_horario'];
			if (isset($_POST['hora_inicio_horario'])) $this->hora_inicio_horario = $_POST['hora_inicio_horario'];
			if (isset($_POST['hora_fin_horario'])) $this->hora_fin_horario = $_POST['hora_fin_horario'];
			if (isset($_POST['motivo_horario'])) $this->motivo_horario = $_POST['motivo_horario'];
			if (isset($_POST['fecha_solicitud_recurso'])) $this->fecha_solicitud_recurso = $_POST['fecha_solicitud_recurso'];
			if (isset($_POST['login_usuario'])) $this->login_usuario = $_POST['login_usuario'];
			if (isset($_POST['es_reserva'])) $this->es_reserva = $_POST['es_reserva'];
			if (isset($_POST['es_rechazada'])) $this->es_rechazada = $_POST['es_rechazada'];
			if (isset($_POST['fecha_respuesta_recurso'])) $this->fecha_respuesta_recurso = $_POST['fecha_respuesta_recurso'];
			if (isset($_POST['motivo_rechazo_solicitud'])) $this->motivo_rechazo_solicitud = $_POST['motivo_rechazo_solicitud'];
			if (isset($_POST['fue_usado'])) $this->fue_usado = $_POST['fue_usado'];
			if (isset($_POST['coste_solicitud'])) $this->coste_solicitud = $_POST['coste_solicitud'];
		} else {
			if ($_GET) {
				if (isset($_GET['id_horario'])) $this->id_horario = $_GET['id_horario'];
				if (isset($_GET['id_calendario'])) $this->id_calendario = $_GET['id_calendario'];
				if (isset($_GET['id_recurso'])) $this->id_recurso = $_GET['id_recurso'];
				if (isset($_GET['fecha_horario'])) $this->fecha_horario = $_GET['fecha_horario'];
				if (isset($_GET['hora_inicio_horario'])) $this->hora_inicio_horario = $_GET['hora_inicio_horario'];
				if (isset($_GET['hora_fin_horario'])) $this->hora_fin_horario = $_GET['hora_fin_horario'];
				if (isset($_GET['motivo_horario'])) $this->hora_fin_horario = $_GET['motivo_horario'];
				if (isset($_GET['fecha_solicitud_recurso'])) $this->fecha_solicitud_recurso = $_GET['fecha_solicitud_recurso'];
				if (isset($_GET['login_usuario'])) $this->login_usuario = $_GET['login_usuario'];
				if (isset($_GET['es_reserva'])) $this->es_reserva = $_GET['es_reserva'];
				if (isset($_GET['es_rechazada'])) $this->es_rechazada = $_GET['es_rechazada'];
				if (isset($_GET['fecha_respuesta_recurso'])) $this->fecha_respuesta_recurso = $_GET['fecha_respuesta_recurso'];
				if (isset($_GET['motivo_rechazo_solicitud'])) $this->motivo_rechazo_solicitud = $_GET['motivo_rechazo_solicitud'];
				if (isset($_GET['fue_usado'])) $this->fue_usado = $_GET['fue_usado'];
				if (isset($_GET['coste_solicitud'])) $this->coste_solicitud = $_GET['coste_solicitud'];
			}
		}
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
				$this->query = "INSERT INTO HORARIO
				(ID_CALENDARIO,
				ID_HORARIO,
				ID_RECURSO,
				FECHA_HORARIO,
				HORA_INICIO_HORARIO,
				HORA_FIN_HORARIO,
				MOTIVO_HORARIO,
				FECHA_SOLICITUD_RECURSO,
				LOGIN_USUARIO,
				ES_RESERVA,
				ES_RECHAZADA,
				FECHA_RESPUESTA_RECURSO,
				MOTIVO_RECHAZO_SOLICITUD,
				FUE_USADO,
				COSTE_SOLICITUD)
			VALUES
				('$this->id_calendario',
				'$this->id_horario',
				'$this->id_recurso',
				'$this->fecha_horario',
				'$this->hora_inicio_horario',
				'$this->hora_fin_horario',
				'$this->motivo_horario',
				'$this->fecha_solicitud_recurso',
				'$this->login_usuario',
				'$this->es_reserva',
				'$this->es_rechazada',
				'$this->fecha_respuesta_recurso',
				'$this->motivo_rechazo_solicitud',
				'$this->fue_usado',
				'$this->coste_solicitud'
	
	
	
			)";
			$this->execute_single_query();
			//var_dump($this->query );

			if ($this->feedback['ok']){
				$this->feedback['code'] = '03021'; //insertado con exito
			}
			else{
				if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
					$this->feedback['code'] = '02106'; //insercion fallida
			}
		}

		return $this->feedback;
}

//Validaciones Back

function validar_atributos()
{

	$this->validar_id_calendario();
	$this->validar_id_horario();
	$this->validar_id_recurso();
	$this->validar_motivo_horario();
	$this->validar_login_usuario();
	$this->validar_motivo_rechazo_solicitud();
	$this->validar_es_reserva();
	$this->validar_es_rechazada();
	$this->validar_fue_usado();
	$this->validar_coste_solicitud();

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

//Funcion validar ID_CALENDARIO

function validar_id_calendario()
{

	$validar = new Validar();

	$this->code = '00000';
	$this->ok = true;
	$this->resource = 'HORARIO';

	if ($validar->Longitud_maxima($this->id_calendario, 2)===false) {
		$this->code = '01106';
		$this->ok = false;
		$this->resource = 'HORARIO';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if ($validar->Es_numerico($this->id_calendario) === false) {
		$this->code = '01107';
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

//Funcion validar ID_HORARIO

function validar_id_horario()
{

	$validar = new Validar();

	$this->code = '00000';
	$this->ok = true;
	$this->resource = 'HORARIO';

	if ($validar->Longitud_maxima($this->id_horario, 5)===false) {
		$this->code = '02116';
		$this->ok = false;
		$this->resource = 'HORARIO';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if ($validar->Es_numerico($this->id_horario) === false) {
		$this->code = '02117';
		$this->ok = false;
		$this->resource = 'HORARIO';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if ($this->ok) {
		return true;
		
	}else{
		


	return $this->erroresdatos;
	}
}

//Funcion validar ID_RECURSO

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

function validar_motivo_horario()
{

	$validar = new Validar();

	$this->code = '00000';
	$this->ok = true;
	$this->resource = 'HORARIO';

	if ($validar->Longitud_maxima($this->motivo_horario, 100) === false) {
		$this->code = '02123';
		$this->ok = false;
		$this->resource = 'HORARIO';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if ($validar->Es_string_espacios($this->motivo_horario) === false) {
		$this->code = '02122';
		$this->ok = false;
		$this->resource = 'HORARIO';
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


//Validar NOMBRE_RECURSO

function validar_login_usuario()
{

	$validar = new Validar();

	$this->code = '00000';
	$this->ok = true;
	$this->resource = 'HORARIO';

	if ($validar->Longitud_minima($this->login_usuario, 3) === false) {
		$this->code = '02126';
		$this->ok = false;
		$this->resource = 'HORARIO';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}


	if ($validar->Longitud_maxima($this->login_usuario, 15) === false) {
		$this->code = '02125';
		$this->ok = false;
		$this->resource = 'HORARIO';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if ($validar->Es_alfanumerico($this->login_usuario) === false) {
		$this->code = '02124';
		$this->ok = false;
		$this->resource = 'HORARIO';
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

function validar_motivo_rechazo_solicitud()
{

	$validar = new Validar();

	$this->code = '00000';
	$this->ok = true;
	$this->resource = 'HORARIO';

	if ($validar->Longitud_maxima($this->motivo_rechazo_solicitud, 100) === false) {
		$this->code = '02128';
		$this->ok = false;
		$this->resource = 'HORARIO';
		$this->construct_response();
		array_push($this->erroresdatos, $this->feedback);
	}

	if ($validar->Es_string_espacios($this->motivo_rechazo_solicitud) === false) {
		$this->code = '02127';
		$this->ok = false;
		$this->resource = 'HORARIO';
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

function validar_es_reserva()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'HORARIO';

		if ($validar->En_valores($this->es_reserva, array('SI', 'NO')) === false) {
			$this->code = '02130';
			$this->ok = false;
			$this->resource = 'HORARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($this->ok) {
			return true;
		}

		
		return $this->erroresdatos;
	}

	function validar_es_rechazada()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'HORARIO';

		if ($validar->En_valores($this->es_rechazada, array('SI', 'NO')) === false) {
			$this->code = '02131';
			$this->ok = false;
			$this->resource = 'HORARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($this->ok) {
			return true;
		}

		

		return $this->erroresdatos;
	}

	function validar_fue_usado()
	{

		$validar = new Validar();

		$this->code = '00000';
		$this->ok = true;
		$this->resource = 'HORARIO';

		if ($validar->En_valores($this->fue_usado, array('SI', 'NO')) === false) {
			$this->code = '02132';
			$this->ok = false;
			$this->resource = 'HORARIO';
			$this->construct_response();
			array_push($this->erroresdatos, $this->feedback);
		}

		if ($this->ok) {
			return true;
		}

		

		return $this->erroresdatos;
	}


//Validar LOGIN_RESPONSABLE

function validar_coste_solicitud()
{

	$validar = new Validar();

	$this->code = '00000';
	$this->ok = true;
	$this->resource = 'HORARIO';

	if ($validar->Longitud_maxima($this->coste_solicitud, 4) === false) {
		$this->code = '02129';
		$this->ok = false;
		$this->resource = 'HORARIO';
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


//ADD RESERVAS PARA EL USUARIO

function ADD_RESERVA(){
		
	$this->seek();
	if (($this->feedback['code']) === '00004'){ //existe el usuario
		$this->feedback['ok'] = false;
		$this->feedback['code'] = '02101'; //usuario ya existe
	}
	else{
		// construimos la sentencia de insercion en la bd
			$this->query = 	"INSERT INTO HORARIO
						(
						ID_CALENDARIO,
						ID_HORARIO,
						ID_RECURSO,
						FECHA_HORARIO,
						HORA_INICIO_HORARIO,
						HORA_FIN_HORARIO,
						MOTIVO_HORARIO,
						FECHA_SOLICITUD_RECURSO,
						LOGIN_USUARIO,
						COSTE_SOLICITUD
						)
					VALUES
						(
						'$this->id_calendario',
						'$this->id_horario',
						'$this->id_recurso',
						'$this->fecha_horario',
						'$this->hora_inicio_horario',
						'$this->hora_fin_horario',
						'$this->motivo_horario',
						'$this->fecha_solicitud_recurso',
						'$this->login_usuario',
						'$this->coste_solicitud'
					)";

		$this->execute_single_query();
		//var_dump($this->query);

		if ($this->feedback['ok']){
			$this->feedback['code'] = '03021'; //insertado con exito
		}
		else{
			if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
				$this->feedback['code'] = '02106'; //insercion fallida
		}
	}

	return $this->feedback;
}


//PARA LA VISTA DE USUARIO DE HORARIOS/RESERVAS

function SEARCH_USUARIO(){

	// construimos la sentencia sql de búsqueda con comodines		
	$this->query = "SELECT * FROM USUARIO
				WHERE
				(
					(LOGIN_USUARIO LIKE '%$this->login_usuario%')
				)";
	// ejecutamos la consulta y guardamos los resultados en una variable
	$this->get_results_from_query();

	if ($this->feedback['ok'] === true){
		$this->feedback['resource'] = $this->rows;
	}

	return $this->feedback;

} //fin de searchall

function SEARCH_RECURSO(){

	// construimos la sentencia sql de búsqueda con comodines		
	$this->query = "SELECT * FROM RECURSO
				WHERE
				(
					(ID_RECURSO LIKE '%$this->id_recurso%') and
					(BORRADO_LOGICO LIKE 'NO')
				)";
	// ejecutamos la consulta y guardamos los resultados en una variable
	$this->get_results_from_query();

	if ($this->feedback['ok'] === true){
		$this->feedback['resource'] = $this->rows;
	}

	return $this->feedback;

} //fin de searchall

function SEARCH_DISPONIBLES(){

	// construimos la sentencia sql de búsqueda con comodines		
	$this->query = "SELECT * FROM RECURSO
				WHERE
				(
					(BORRADO_LOGICO LIKE 'NO')
				)";
	// ejecutamos la consulta y guardamos los resultados en una variable
	$this->get_results_from_query();

		if ($this->feedback['ok'] === true){
			$this->feedback['resource'] = $this->rows;
		}

		return $this->feedback;

} //fin de searchall

function SEARCH_CALENDARIO(){

	// construimos la sentencia sql de búsqueda con comodines		
	$this->query = "SELECT * FROM CALENDARIO
				WHERE
				(
					(ID_CALENDARIO LIKE '%$this->id_calendario%') and
					(FECHA_FIN_CALENDARIO  >= NOW())
				)";
	// ejecutamos la consulta y guardamos los resultados en una variable
	$this->get_results_from_query();

	if ($this->feedback['ok'] === true){
		$this->feedback['resource'] = $this->rows;
	}

	return $this->feedback;

} //fin de searchall


function seek_recurso(){
	
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

function seekcal(){
	
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

function SEARCH(){

	// construimos la sentencia sql de búsqueda con comodines		
	$this->query = "SELECT * FROM HORARIO
	WHERE
	(
		(ID_HORARIO LIKE '%$this->id_horario%') and
		(ID_CALENDARIO LIKE '%$this->id_calendario%') and
		(ID_RECURSO LIKE '%$this->id_recurso%') and
		(FECHA_HORARIO LIKE '%$this->fecha_horario%') and
		(HORA_INICIO_HORARIO LIKE '%$this->hora_inicio_horario%') and
		(HORA_FIN_HORARIO LIKE '%$this->hora_fin_horario%') and
		(MOTIVO_HORARIO LIKE '%$this->motivo_horario%') and
		(FECHA_SOLICITUD_RECURSO LIKE '%$this->fecha_solicitud_recurso%') and
		(LOGIN_USUARIO LIKE '%$this->login_usuario%') and
		(ES_RESERVA LIKE '%$this->es_reserva%') and
		(ES_RECHAZADA LIKE '%$this->es_rechazada%') and
		(FUE_USADO LIKE '%$this->fue_usado%') and
		(COSTE_SOLICITUD LIKE '%$this->coste_solicitud%')
		



	)";
	// ejecutamos la consulta y guardamos los resultados en una variable
	$this->get_results_from_query();

	if ($this->feedback['ok'] === true){
		$this->feedback['resource'] = $this->rows;
	}

	return $this->feedback;

} //fin de searchall

//Necesidad de otro Search para la vista Search, ya que habia problemas con los atributos nulos y la versión de php que utiliza debian.
function SEARCH_VIEW(){

	// construimos la sentencia sql de búsqueda con comodines		
	$this->query = "SELECT * FROM HORARIO
	WHERE
	(
		(ID_HORARIO LIKE '%$this->id_horario%') and
		(ID_CALENDARIO LIKE '%$this->id_calendario%') and
		(ID_RECURSO LIKE '%$this->id_recurso%') and
		(FECHA_HORARIO LIKE '%$this->fecha_horario%') and
		(HORA_INICIO_HORARIO LIKE '%$this->hora_inicio_horario%') and
		(HORA_FIN_HORARIO LIKE '%$this->hora_fin_horario%') and
		(MOTIVO_HORARIO LIKE '%$this->motivo_horario%') and
		(FECHA_SOLICITUD_RECURSO LIKE '%$this->fecha_solicitud_recurso%') and
		(LOGIN_USUARIO LIKE '%$this->login_usuario%') and
		(ES_RESERVA LIKE '%$this->es_reserva%') and
		(ES_RECHAZADA LIKE '%$this->es_rechazada%') and
		(FECHA_RESPUESTA_RECURSO LIKE '%$this->fecha_respuesta_recurso%') and
		(MOTIVO_RECHAZO_SOLICITUD LIKE '%$this->motivo_rechazo_solicitud%') and
		(FUE_USADO LIKE '%$this->fue_usado%') and
		(COSTE_SOLICITUD LIKE '%$this->coste_solicitud%')
		



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
						(ID_HORARIO = '$this->id_horario')
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


		// construimos la sentencia sql de búsqueda con valor concreto de clave		
		$this->query = "UPDATE HORARIO SET
		
		ID_CALENDARIO = '$this->id_calendario',
		ID_RECURSO = '$this->id_recurso',
		FECHA_HORARIO = '$this->fecha_horario',
		HORA_INICIO_HORARIO = '$this->hora_inicio_horario',
		HORA_FIN_HORARIO = '$this->hora_fin_horario',
		MOTIVO_HORARIO = '$this->motivo_horario',
		FECHA_SOLICITUD_RECURSO = '$this->fecha_solicitud_recurso',
		LOGIN_USUARIO = '$this->login_usuario',
		ES_RESERVA = '$this->es_reserva',
		ES_RECHAZADA = '$this->es_rechazada',
		FECHA_RESPUESTA_RECURSO = '$this->fecha_respuesta_recurso',
		MOTIVO_RECHAZO_SOLICITUD = '$this->motivo_rechazo_solicitud',
		FUE_USADO = '$this->fue_usado',
		COSTE_SOLICITUD = '$this->coste_solicitud'
		
		WHERE
		(ID_HORARIO = '$this->id_horario') 
		
		";

		$this->execute_single_query();
		//var_dump($this->query);

		if ($this->feedback['ok']){
			$this->feedback['code'] = '03023'; //modificado con exito
		}
		else{
			if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
				$this->feedback['code'] = '03024'; //modificacion fallida
		}

		return $this->feedback;
}


function SEARCH_MIS_RESERVAS(){

	// construimos la sentencia sql de búsqueda con comodines		
	$this->query = "SELECT RECURSO.NOMBRE_RECURSO, HORARIO.* 
	FROM RECURSO,HORARIO,USUARIO
		WHERE
		
			(HORARIO.LOGIN_USUARIO=USUARIO.LOGIN_USUARIO ) and (RECURSO.ID_RECURSO=HORARIO.ID_RECURSO) and
			(HORARIO.LOGIN_USUARIO LIKE '" . $_SESSION['login_usuario'] . "')";
	// ejecutamos la consulta y guardamos los resultados en una variable
	$this->get_results_from_query();

	if ($this->feedback['ok'] === true){
		$this->feedback['resource'] = $this->rows;
	}

	return $this->feedback;

} //fin de searchall

function SEARCH_SOY_RESPONSABLE(){

	// construimos la sentencia sql de búsqueda con comodines		
	$this->query = "SELECT RECURSO.NOMBRE_RECURSO, HORARIO.* ,RECURSO.LOGIN_RESPONSABLE
	FROM RECURSO,HORARIO,RESPONSABLE_RECURSO
		WHERE
		
			(RECURSO.ID_RECURSO=HORARIO.ID_RECURSO) and (RESPONSABLE_RECURSO.LOGIN_RESPONSABLE=RECURSO.LOGIN_RESPONSABLE) and
			(RECURSO.LOGIN_RESPONSABLE LIKE  '" . $_SESSION['login_usuario'] . "') and 
			(HORARIO.ES_RESERVA='SI')";
	// ejecutamos la consulta y guardamos los resultados en una variable
	$this->get_results_from_query();

	if ($this->feedback['ok'] === true){
		$this->feedback['resource'] = $this->rows;
	}

	return $this->feedback;

} //fin de searchall


function DELETE(){

		// construimos la sentencia sql de borrado con el valor concreto de clave a borrar		
		$this->query = "DELETE FROM HORARIO 
		WHERE
		(ID_HORARIO = '$this->id_horario')
		";


		$this->execute_single_query();

		if ($this->feedback['ok']){
			$this->feedback['code'] = '03022'; //borrado con exito
		}
		else{
			if ($this->feedback['code'] != '00000') //sino es fallo conexion gestor
				$this->feedback['code'] = '02108'; //borrado fallido
		}

		return $this->feedback;

}

//TEST
function test_validation($arrayresultados){
	

	$arrayresultados = self::test_atributo('HORARIO', 'validar_id_calendario', 'id_calendario', '113', '01106', 'EL TAMAÑO DEL ID_CALENDARIO NO PUEDE SER MAYOR DE 2', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_id_calendario', 'id_calendario', 'H1', '01107', 'EL ID_CALENDARIO SOLO PUEDE TENER NUMEROS', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_id_horario', 'id_horario', '111111', '02116', 'EL ID_HORARIO TIENE TAMAÑO MAX 5', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_id_horario', 'id_horario', 'H1', '02117', 'EL ID_HORARIO SOLO PUEDE TENER NUMEROS', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_id_recurso', 'id_recurso', '111111111', '02118', 'EL TAMAÑO DEL ID_RECURSO NO PUEDE SER MAYOR DE 3', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_id_recurso', 'id_recurso', 'pr', '02119', 'EL ID DE RECURSO SOLO PUEDE TENER NUMEROS', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_motivo_horario', 'motivo_horario', 'Mot)(/&es', '02122', 'EL MOTIVO SOLO PUEDE TENER LETRAS', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_motivo_horario', 'motivo_horario', 'recursodecuarenteaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '02123', 'EL TAMAÑO DEL MAXIMO DEL MOTIVO DE HORARIO ES 100', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_login_usuario', 'login_usuario', '098--', '02124', 'SOLO VALORES ALFANUMÉRICOS PARA EL LOGIN DE USUARIO', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_login_usuario', 'login_usuario', 'Jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '02125', 'TAMAÑO MÁXIMO 15 PARA LOGIN DE USUARIO', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_login_usuario', 'login_usuario', 'jj', '02126', 'TAMAÑO MINIMO 3 PARA LOGIN DE USUARIO', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_motivo_rechazo_solicitud', 'motivo_rechazo_solicitud', 'Rechazo por 56 == 50', '02127', 'EL MOTIVO DE RECHAZO SOLO PUEDE TENER LETRAS Y NUMEROS', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_es_reserva', 'es_reserva', 'XX', '02130', 'ES RESERVA INVALIDO', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_es_rechazada', 'es_rechazada', 'XX', '02131', 'ES RECHAZADA INVALIDO', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_fue_usado', 'fue_usado', 'XX', '02132', 'FUE USADO INVALIDO', $arrayresultados);



	
	$arrayresultados = self::test_atributo('HORARIO', 'validar_motivo_rechazo_solicitud', 'motivo_rechazo_solicitud', 'recursodecuarenteaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '02128', 'EL TAMAÑO DEL MAXIMO DEL MOTIVO DE RECHAZO DE SOLICITUD ES 100', $arrayresultados);
	$arrayresultados = self::test_atributo('HORARIO', 'validar_coste_solicitud', 'coste_solicitud', '111111111', '02129', 'EL TAMAÑO DEL COSTE DE SOLICITUD NO PUEDE SER MAYOR DE 9999,99', $arrayresultados);

	




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

	
	$atributos = array('id_calendario'=>'10', 'id_horario'=>'10', 'id_horario'=>'10', 'id_recurso'=>'10','fecha_horario'=>'2017-01-17','fecha_solicitud_recurso'=>'2017-01-17','hora_inicio_horario'=>'07:33:00','hora_fin_horario'=>'07:40:00','motivo_horario'=>'prueba', 'es_reserva'=>'SI','es_rechazada'=>'SI', 'fecha_respuesta_recurso'=>'2017-01-17','login_usuario'=>'admin','motivo_rechazo_solicitud'=>'rechazo','fue_usado'=>'NO','coste_solicitud'=>'10');
	$arrayresultados = self::test_accion('HORARIO', 'ADD', $atributos, '03021', 'INSERCION HORARIO CORRECTO', $arrayresultados);

	$atributos = array('id_calendario'=>'10', 'id_horario'=>'10', 'id_horario'=>'10', 'id_recurso'=>'11','fecha_horario'=>'2017-01-17','fecha_solicitud_recurso'=>'2017-01-17','hora_inicio_horario'=>'07:33:00','hora_fin_horario'=>'07:40:00','motivo_horario'=>'prueba', 'es_reserva'=>'SI','es_rechazada'=>'SI', 'fecha_respuesta_recurso'=>'2017-01-17','login_usuario'=>'admin','motivo_rechazo_solicitud'=>'rechazo','fue_usado'=>'NO','coste_solicitud'=>'10');
	$arrayresultados = self::test_accion('HORARIO', 'EDIT', $atributos, '03023', 'EDITAR HORARIO CORRECTO', $arrayresultados);

	$atributos = array('id_calendario'=>'10', 'id_horario'=>'10', 'id_horario'=>'10', 'id_recurso'=>'11','fecha_horario'=>'','fecha_solicitud_recurso'=>'','hora_inicio_horario'=>'07:33:00','hora_fin_horario'=>'07:40:00','motivo_horario'=>'prueba', 'es_reserva'=>'SI','es_rechazada'=>'SI', 'fecha_respuesta_recurso'=>'2017-01-17','login_usuario'=>'admin','motivo_rechazo_solicitud'=>'rechazo','fue_usado'=>'NO','coste_solicitud'=>'10');
	$arrayresultados = self::test_accion('HORARIO', 'EDIT', $atributos, '03024', 'EDITAR HORARIO FALLIDO', $arrayresultados);

	//var_dump($arrayresultados);

	$atributos = array('id_calendario'=>'10', 'id_horario'=>'10', 'id_recurso'=>'11','motivo_horario'=>'prueba', 'descripcion_recurso'=>'prueba', 'login_usuario'=>'admin','motivo_rechazo_solicitud'=>'rechazo','coste_solicitud'=>'10');
	$arrayresultados = self::test_accion('HORARIO', 'DELETE', $atributos, '03022', 'BORRADO HORARIO CORRECTO', $arrayresultados);

	
	
	return $arrayresultados;
}

function test_action_display(){

	$arrayresultados = $this->test_action(array());
	//include_once_once './VIEW/TEST_VIEW.php';
	new TEST_VIEW($arrayresultados);

}


}
?>