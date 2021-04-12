<?php

class INFORME_SHOWALL
{

    //ATRIBUTOS
    var $datos;


    //METODOS

    function __construct($datos)
    {
        $this->datos = $datos;
        $this->render();
    }

    function render()
    {
        include './VIEW/header.php';
?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4 Informe">Informe de uso</h1>
                    <ol class="breadcrumb mb-4">

                        <li class="breadcrumb-item active informe_uso">Bienvenido al informe de uso de recursos</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body ver">
                            Aquí podrás ver si un recurso fue usado o no, puedes buscar por recurso o por fecha.

                            <img src='./VIEW/icons/busqueda.png' height="20" width="20" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','formulariobuscar'); insertacampo(document.formenviar,'controlador','INFORME');enviaform(document.formenviar);">
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Informe
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> NOMBRE_RECURSO</th>
                                            <th> FUE_USADO </th>
                                            <th> FECHA </th>
                                    </thead>


                                    <?php

                                    foreach ($this->datos as $fila) {
                                        // para cada fila que viene en el array la escribimos en una fila de la tabla html y cada atributo en una columna (no es un recordset sino un array asociativo)

                                    ?>

                                        <tr>

                                            <td> <?php echo $fila['NOMBRE_RECURSO']; ?> </td>
                                            <td> <?php echo $fila['FUE_USADO']; ?> </td>
                                            <td> <?php echo $fila['FECHA_SOLICITUD_RECURSO']; ?> </td>



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


        <img src='./VIEW/icons/volver.png' height="40" width="40" onclick="crearform('formenviar','post'); /*insertacampo(document.formenviar,'action',''); insertacampo(document.formenviar,'controlador','');*/enviaform(document.formenviar);">
        <br></br>
        <br></br>
        <br></br>
        <br></br>
<?php

        include './VIEW/footer.php';
    } // fin de render



} //FIN DE CLASE MESSAGE
?>