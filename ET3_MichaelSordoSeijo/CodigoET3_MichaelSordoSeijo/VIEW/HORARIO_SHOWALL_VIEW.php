<?php

class HORARIO_SHOWALL{

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
                        <h1 class="mt-4 horarios">Horarios</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active bienvenido_horarios">Bienvenido a la tabla de muestra de horarios</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <a class="En_esta_pantalla"></a>
                                <img src='./VIEW/icons/anadir.png' height="20" width="20" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formularioinsertar'); insertacampo(document.formenviar,'controlador','HORARIO');enviaform(document.formenviar);">
    &nbsp&nbsp
    <img src='./VIEW/icons/busqueda.png' height="20" width="20" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formulariobuscar'); insertacampo(document.formenviar,'controlador','HORARIO');enviaform(document.formenviar);">
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Horarios
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
            <th class="ID_HORARIO"> ID_HORARIO</th>
            <th class="ID_CALENDARIO"> ID_CALENDARIO</th>
            <th class="ID_RECURSO"> ID_RECURSO </th>
            <th class="FECHA_HORARIO"> FECHA_HORARIO</th>
            <th class="HORA_INICIO_HORARIO"> HORA_INICIO_HORARIO</th>
            <th class="HORA_FIN_HORARIO"> HORA_FIN_HORARIO</th>
            <th class="MOTIVO_HORARIO"> MOTIVO_HORARIO</th>
            <th class="FECHA_SOLICITUD_RECURSO"> FECHA_SOLICITUD_RECURSO</th>
            <th class="LOGIN_USUARIO"> LOGIN_USUARIO</th>
            <th class="ES_RESERVA"> ES_RESERVA</th>
            <th class="ES_RECHAZADA"> ES_RECHAZADA</th>
            <th class="FECHA_RESPUESTA_RECURSO"> FECHA_RESPUESTA_RECURSO</th>
            <th class="MOTIVO_RECHAZO_SOLICITUD"> MOTIVO_RECHAZO_SOLICITUD</th>
            <th class="FUE_USADO"> FUE_USADO</th>
            <th class="COSTE_SOLICITUD"> COSTE_SOLICITUD</th>
                                        </thead>
                                       

<?php

            foreach ($this->datos as $fila)
            {
                // para cada fila que viene en el array la escribimos en una fila de la tabla html y cada atributo en una columna (no es un recordset sino un array asociativo)

?>
               
               <tr>
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

                        <img src='./VIEW/icons/editar.png' height="40" width="40" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formularioeditar'); insertacampo(document.formenviar,'controlador','HORARIO'); insertacampo(document.formenviar,'id_horario','<?php echo $fila['ID_HORARIO']; ?>'); enviaform(document.formenviar);">
                        
                    </td>
                    <td> 

                        <img src='./VIEW/icons/basura.png' height="40" width="40" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formularioborrar'); insertacampo(document.formenviar,'controlador','HORARIO'); insertacampo(document.formenviar,'id_horario','<?php echo $fila['ID_HORARIO']; ?>'); enviaform(document.formenviar);">

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

