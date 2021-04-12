<?php

class RESERVAS_SOY_RESPONSABLE_SHOWALL{

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
                        <h1 class="mt-4">Reservas de las que soy responsable</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">Bienvenido a la tabla de muestra de reservas</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                En esta pantalla podrás añadir,buscar,editar eliminar y volver atrás,gracias a los botones interactivos.
                                <img src='./VIEW/icons/anadir.png' height="20" width="20" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formularioinsertar'); insertacampo(document.formenviar,'controlador','HORARIO');enviaform(document.formenviar);">
    &nbsp&nbsp
    <img src='./VIEW/icons/busqueda.png' height="20" width="20" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formulariobuscar'); insertacampo(document.formenviar,'controlador','HORARIO');enviaform(document.formenviar);">
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Reservas
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
            <th> NOMBRE_RECURSO</th>    
            <th> ID_HORARIO</th>
            <th> ID_CALENDARIO</th>
            <th> ID_RECURSO </th>
            <th> FECHA_HORARIO</th>
            <th> HORA_INICIO_HORARIO</th>
            <th> HORA_FIN_HORARIO</th>
            <th> MOTIVO_HORARIO</th>
            <th> FECHA_SOLICITUD_RECURSO</th>
            <th> LOGIN_USUARIO</th>
            <th> ES_RESERVA</th>
            <th> ES_RECHAZADA</th>
            <th> FECHA_RESPUESTA_RECURSO</th>
            <th> MOTIVO_RECHAZO_SOLICITUD</th>
            <th> FUE_USADO</th>
            <th> COSTE_SOLICITUD</th>
            <th> ACEPTAR_RESERVA</th>
            <th> RECHAZAR_RESERVA</th>
                                        </thead>
                                       

<?php

            foreach ($this->datos as $fila)
            {
                // para cada fila que viene en el array la escribimos en una fila de la tabla html y cada atributo en una columna (no es un recordset sino un array asociativo)

?>
               
               <tr>
                    <td> <?php echo $fila['NOMBRE_RECURSO']; ?> </td>
                    <td> <?php echo $fila['ID_HORARIO']; ?> </td>
                    <td> <?php echo $fila['ID_CALENDARIO']; ?> </td>
                    <td> <?php echo $fila['ID_RECURSO']; ?> </td>
                    <td> <?php echo $fila['FECHA_HORARIO']; ?> </td>
                    <td> <?php echo $fila['HORA_INICIO_HORARIO']; ?> </td>
                    <td> <?php echo $fila['HORA_FIN_HORARIO']; ?> </td>
                    <td> <?php echo $fila['MOTIVO_HORARIO']; ?> </td>
                    <td> <?php echo $fila['FECHA_SOLICITUD_RECURSO']; ?> </td>
                    <td> <?php echo $fila['LOGIN_USUARIO']; ?> </td>
                    <td> <?php echo $fila['ES_RESERVA']; ?> </td>
                    <td> <?php echo $fila['ES_RECHAZADA']; ?> </td>
                    <td> <?php echo $fila['FECHA_RESPUESTA_RECURSO']; ?> </td>
                    <td> <?php echo $fila['MOTIVO_RECHAZO_SOLICITUD']; ?> </td>
                    <td> <?php echo $fila['FUE_USADO']; ?> </td>
                    <td> <?php echo $fila['COSTE_SOLICITUD']; ?> </td>

                                                

                    <td> 

                        <img src='./VIEW/icons/aceptar.png' height="40" width="40" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formularioeditar_reservas_accept'); insertacampo(document.formenviar,'controlador','HORARIO'); insertacampo(document.formenviar,'id_horario','<?php echo $fila['ID_HORARIO']; ?>'); enviaform(document.formenviar);">
                        
                    </td>
                    <td> 

                        <img src='./VIEW/icons/denegar.png' height="40" width="40" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formularioeditar_reservas_deny'); insertacampo(document.formenviar,'controlador','HORARIO'); insertacampo(document.formenviar,'id_horario','<?php echo $fila['ID_HORARIO']; ?>'); enviaform(document.formenviar);">

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

