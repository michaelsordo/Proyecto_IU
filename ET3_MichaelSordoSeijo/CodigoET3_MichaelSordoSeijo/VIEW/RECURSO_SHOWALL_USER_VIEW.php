<?php

class RECURSO_SHOWALL_USER{

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
                        <h1 class="mt-4 recursos">Recursos</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active bienvenido_recurso"></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <a class="reserva_recursos"></a>
                                
    <img src='./VIEW/icons/busqueda.png' height="20" width="20" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formulariobuscar'); insertacampo(document.formenviar,'controlador','RECURSO');enviaform(document.formenviar);">
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Recursos
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th class="NOMBRE_RECURSO"></th>
                                            <th class="DESCRIPCION_RECURSO"></th>
                                            <th class="TARIFA_RECURSO"></th>
                                            <th class="RANGO_TARIFA"></th>
                                            <th class="SOLICITAR"></th>
                                        </thead>
                                       

<?php

            foreach ($this->datos as $fila)
            {
                // para cada fila que viene en el array la escribimos en una fila de la tabla html y cada atributo en una columna (no es un recordset sino un array asociativo)

?>
               
               <tr>
                                     
                                                <td> <?php echo $fila['NOMBRE_RECURSO']; ?> </td>
                                                <td> <?php echo $fila['DESCRIPCION_RECURSO']; ?> </td>
                                                <td> <?php echo $fila['TARIFA_RECURSO']; ?> </td>
                                                <td> <?php echo $fila['RANGO_TARIFA_RECURSO']; ?> </td>

                                                

                    <td> 

                    <img src='./VIEW/icons/reserva.png' height="40" width="40" style="cursor: pointer" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formularioinsertar_reserva'); insertacampo(document.formenviar,'controlador','HORARIO');insertacampo(document.formenviar,'id_recurso','<?php echo $fila['ID_RECURSO']; ?>'); enviaform(document.formenviar);">
                        
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

