<?php

class TEST_COMPARE_VIEW{

//ATRIBUTOS
var $test;



//METODOS

	function __construct($res_test){
		$this->res_test = $res_test;
		$this->render();
	}

	function render(){
		include './VIEW/header.php';

		
?>
	

<?php
// presentacion de resultados
?>

<h1>Comparación de Test de unidad</h1>
<table border='1'>
	<tr>
		<th>
			Entidad
		</th>
		<th>
			Atributo
		</th>
		<th>
			Error
		</th>
		<th>
			Valor
		</th>
		<th>
			Respuesta SYS
		</th>
		<th>
			Respuesta USER
		</th>
	</tr>
<?php
	foreach ($this->res_test as $test)
	{
?>
	<tr>
		<td>
			<?php echo $test['entidad'];?>
		</td>
		<td>
			<?php echo $test['atributo'];?>
		</td>
		<td>
			<?php echo $test['error'].'<BR>'.'<a class=\''.$test['USER'].'\'>'; ?>
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
			<?php echo $test['GEN']; ?>
		</td>
		<td>
			<?php echo $test['USER']; ?>
		</td>
	</tr>
<?php	
	}
?>
</table>




<?php
	include './VIEW/footer.php';
	}// fin de render

} //FIN DE CLASE TEST_VIEW

