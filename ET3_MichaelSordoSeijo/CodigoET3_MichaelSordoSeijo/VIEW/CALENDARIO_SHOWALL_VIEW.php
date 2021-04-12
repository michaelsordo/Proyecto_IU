<?php

class CALENDARIO_SHOWALL{

//ATRIBUTOS
var $datos;


//METODOS

	function __construct($datos){
		$this->datos = $datos;
		$this->render();
	}

	function render(){
		include './VIEW/header.php';
?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4 calendarios">Calendarios</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active tabla_muestra">Bienvenido a la tabla de muestra de Calendarios</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <a class="En_esta_pantalla">En esta pantalla podrás añadir,buscar,editar eliminar y volver atrás,gracias a los botones interactivos.</a>
                                <img src='./VIEW/icons/anadir.png' height="20" width="20" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formularioinsertar'); insertacampo(document.formenviar,'controlador','CALENDARIO');enviaform(document.formenviar);">
    &nbsp&nbsp
    <img src='./VIEW/icons/busqueda.png' height="20" width="20" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formulariobuscar'); insertacampo(document.formenviar,'controlador','CALENDARIO');enviaform(document.formenviar);">
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                <a class="calendarios"></a>
                               
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="id_calendarios"></th>
                                                <th class="nombre_calendario"></th>
                                                <th class="descripcion_calendario"></th>
                                                <th class="fecha_inicio_calendario"></th>
                                                <th class="fecha_fin_calendario"></th>
                                                <th class="hora_inicio_calendario"></th>
                                                <th class="hora_fin_calendario"> </th>
                                            </tr>
                                        </thead>
                                       

<?php

			foreach ($this->datos as $fila)
			{
				// para cada fila que viene en el array la escribimos en una fila de la tabla html y cada atributo en una columna (no es un recordset sino un array asociativo)

?>
               
               <tr>
                                                <td> <?php echo $fila['ID_CALENDARIO']; ?> </td>
                                                <td> <?php echo $fila['NOMBRE_CALENDARIO']; ?> </td>
                                                <td> <?php echo $fila['DESCRIPCION_CALENDARIO']; ?> </td>
                                                <td> <?php echo $fila['FECHA_INICIO_CALENDARIO']; ?> </td>
                                                <td> <?php echo $fila['FECHA_FIN_CALENDARIO']; ?> </td>
                                                <td> <?php echo $fila['HORA_INICIO_CALENDARIO']; ?> </td>
                                                <td> <?php echo $fila['HORA_FIN_CALENDARIO']; ?> </td>

                                                <td> 

                        <img src='./VIEW/icons/editar.png' height="40" width="40" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formularioeditar'); insertacampo(document.formenviar,'controlador','CALENDARIO'); insertacampo(document.formenviar,'id_calendario','<?php echo $fila['ID_CALENDARIO']; ?>'); enviaform(document.formenviar);">
                        
                    </td>
                    <td> 

                        <img src='./VIEW/icons/basura.png' height="40" width="40" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formularioborrar'); insertacampo(document.formenviar,'controlador','CALENDARIO'); insertacampo(document.formenviar,'id_calendario','<?php echo $fila['ID_CALENDARIO']; ?>'); enviaform(document.formenviar);">

                    </td>
                 </tr>
  
               
<?php
			}
?>


                </table>
            </div>
        </div>
    </div>
    </div>
</main>
</div>
</div>


<img src='./VIEW/icons/volver.png' height="40" width="40" onclick = "crearform('formenviar','post'); /*insertacampo(document.formenviar,'action',''); insertacampo(document.formenviar,'controlador','');*/enviaform(document.formenviar);">
<br></br>
<br></br>
<br></br>
<br></br>
<?php
    
    include './VIEW/footer.php';
    }// fin de render
   
   

} //FIN DE CLASE MESSAGE
?>

