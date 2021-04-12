<?php
include './COMMON/config.php';

abstract class Abstract_Model{
	
	private static $db_host = host;
	private static $db_user = user;
	private static $db_pass = pass;
	private static $directorioLog = directorioLog;
	private static $log_name = log_name;
	private static $db_name = BD;
	private static $db_test= BD_test;
	protected $query;
	protected $rows = array();
	private $conn;
	public $ok = true;
	public $code = '00000';
	public $resource = '';
	public $feedback = array();
	public $erroresdatos = [];
	
# métodos abstractos para ABM de clases que hereden


	abstract protected function EDIT();
	abstract protected function DELETE();
	abstract protected function ADD();
	abstract protected function SEARCH();
	abstract protected function seek();
	abstract protected function fillfields();

	function connection(){
		
		if (isset($_SESSION['test'])){ //estamos realizando un test
			// conectamos con el gestor con el usuario y password
			$this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass); 
			if (!$this->conn->select_db(self::$db_test)){ // si no existe la bd de test
				// leemos el fichero de sql de la bd de test
				$fileSQL = file_get_contents('./MODEL/ET1_test.sql');
				// creamos la bd de test
				$this->conn->multi_query($fileSQL);
			}
			// seleccionamos y devolvemos la respuesta de conectarnos a la bd de test
			return($this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db_test) or die('fallo conexion'));
		}
		else{
			$this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass); 
			if (!$this->conn->select_db(self::$db_name)){ // si no existe la bd de test
				// leemos el fichero de sql de la bd de test
				$fileSQL = file_get_contents('./MODEL/ET1_test.sql');
				// creamos la bd de test
				$this->conn->multi_query($fileSQL);
			}
			// seleccionamos y devolvemos la respuesta de conectarnos a la bd de ejecucion
			return($this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db_name) or die('fallo conexion'));
		}
	}

# Desconectar la base de datos

	private function close_connection() {
		$this->conn->close();
	}

# Ejecutar un query simple del tipo INSERT, DELETE, UPDATE

	protected function execute_single_query() {

			if (!($this->connection())){
				$this->ok = false;
				$this->code  = '99999'; //no conecta con el gestor
				$this->construct_response();
			}
			else{
				if ($this->conn->query($this->query)){
					$this->ok = true;
					$this->code  = '00001'; //sql ejecutada con exito
					$this->construct_response();
				}
				else{
					$this->ok = false;
					$this->code  = '00002'; //sql no ejecutada
					$this->construct_response();
				}
				$this->close_connection();
			}

	}

# Traer resultados de una consulta en un Array

	protected function get_results_from_query() {

		if (!($this->connection())){
			$this->ok = false;
			$this->code  = '99999'; //error conexion bd
			$this->construct_response();
		}
		else{
			$result = $this->conn->query($this->query);
			if ($result != true){
				$this->ok = false;
				$this->code  = '00002'; //sql no ejecutada
				$this->construct_response();
			}else{
			//
				if ($result->num_rows == 0){
					$this->ok = true;
					$this->code  = '00003'; // el recordset viene vacio
					$this->construct_response();
				}else{
				for($i=0;$i<$result->num_rows;$i++){
					$this->rows[]=$result->fetch_assoc();
					}
					$result->close();
					$this->ok = true;
					$this->code  = '00004'; // el recordset vuelve con datos
					$this->construct_response();
				}
			}		
			$this->close_connection();
		}
	}

# Ejecutar un query por clave primaria que debe devolver una túpla de resultado 

	protected function get_one_result_from_query() {

		if (!($this->connection())){
				$this->ok = false;
				$this->code  = '99999'; //no conecta con el gestor
				$this->construct_response();
		}
		else{
				$result = $this->conn->query($this->query);
				if ($result != true){
					$this->ok = false;
					$this->code  = '00002'; //sql no ejecutada
					$this->construct_response();
				}else{
					if ($result->num_rows == 0){
						$this->ok = true;
						$this->code  = '00003'; // el recordset viene vacio
						$this->construct_response();
					}else{
						$this->rows = $result->fetch_assoc();
						$this->ok = true;
						$this->code  = '00004'; // el recordset vuelve con datos
						$this->construct_response();
					}
				}		
			$this->close_connection();
		}

	}

	protected function construct_response() {
		$this->feedback['ok'] = $this->ok;
		$this->feedback['code'] = $this->code;
		$this->feedback['resource'] = $this->resource;
	}

	static function test_atributo($entidad,$action,$atributo,$valor,$erroresperado,$mensajeerror, $arrayresultados){

	$model = $entidad.'_MODEL';
	$obj = new $model;

	$obj->$atributo = $valor;
	$res = $obj->$action();
	$feedback = array_shift($res);

	$resultado['entidad'] = $entidad;
	$resultado['atributo'] = $atributo;
	$resultado['error'] = $mensajeerror;
	$resultado['dato'] = $valor;
	$resultado['esperado'] = $erroresperado;
	$resultado['obtenido'] = $feedback['code'];
	if ($feedback['code'] === $erroresperado){
		$resultado['conclusion'] = '1';	
	}
	else{
		$resultado['conclusion'] = '0';		
	}
	

	array_push($arrayresultados, $resultado);

	return $arrayresultados;
}

	static function test_accion($entidad,$action,$atributos,$erroresperado,$mensajeerror,$arrayresultados){

	$model = $entidad.'_MODEL';
	$obj = new $model;

	foreach ($atributos as $key => $value) {
		$obj->$key = $value;
	}
	
	$feedback = $obj->$action();

	$resultado['entidad'] = $entidad;
	$resultado['atributo'] = 'tupla';
	$resultado['error'] = $mensajeerror;
	$resultado['dato'] = $atributos;
	$resultado['esperado'] = $erroresperado;
	$resultado['obtenido'] = $feedback['code'];
	if ($feedback['code'] === $erroresperado){
		$resultado['conclusion'] = '1';	
	}
	else{
		$resultado['conclusion'] = '0';		
	}
	

	array_push($arrayresultados, $resultado);

	return $arrayresultados;
}

}

?>