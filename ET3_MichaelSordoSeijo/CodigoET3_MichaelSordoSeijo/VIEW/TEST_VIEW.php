<?php

class TEST_VIEW{

//ATRIBUTOS
var $test;



//METODOS

	function __construct($res_test){
		$this->res_test = $res_test;
		$this->render();
	}

	function render(){
		//include './VIEW/header.php';

		$errores = 0;
		foreach ($this->res_test as $res) {
			//var_dump($res);
			if ($res['conclusion'] != '1'){
				$errores++;
			}	
		}
?>
	

	Mensaje del sistema<BR><BR><BR><BR><BR><BR>

	<h1>De <?php echo count($this->res_test); ?> tests hay <?php echo $errores; ?> test fallidos</h1>
<br>

<?php
// presentacion de resultados
?>
<h1>Test de unidad</h1>
<table>
	<tr>
		<th>
			Entidad
		</th>
		<th>
			Error
		</th>
		<th>
			Valor
		</th>
		<th>
			Error Esperado
		</th>
		<th>
			Error Obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
<?php
	foreach ($this->res_test as $test)
	{
?>
	<tr <?php if ($test['conclusion'] === '0') echo "bgcolor='red'"; ?>>
		<td>
			<?php echo $test['entidad'];?>
		</td>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php 
			
			if (is_array($test['dato'])){
				foreach ($test['dato'] as $key => $value) {
					echo $key.'='.$value.'<br>';
				}
			}
			else{
				echo $test['dato']; 
			}
			?>
		</td>
		<td>
			<?php echo $test['esperado']; ?>
		</td>
		<td>
			<?php echo $test['obtenido']; ?>
		</td>
		<td>
			<?php echo $test['conclusion']; ?>
		</td>
	</tr>
<?php	
	}
?>
</table>



	</body>
	</html>

<?php
	//include './VIEW/footer.php';
	}// fin de render

} //FIN DE CLASE TEST_VIEW

