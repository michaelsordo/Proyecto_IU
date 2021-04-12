<?php

class RESPONSABLE_EDIT
{

    //ATRIBUTOS
    var $fila;


    //METODOS

    function __construct($fila)
    {
        $this->fila = $fila;
        $this->render();
    }

    function render()
    {

        include './VIEW/header.php';
?>
        Bienvenidos al formulario de edición<BR><BR><BR>


        <form name="formusuarioeditar" action="index.php" method="post">


            <form class="form-horizontal" name="formularioeditar" action="index.php" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2 login_responsable" for="login_responsable">Login Responsable:</label>
                    <div class="col-sm-10">
                        <input type="text" name="login_responsable" id="login_responsable" class="form-control" value="<?php echo $this->fila['LOGIN_RESPONSABLE']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 direccion_responsable" for="direccion_responsable">Direccion:</label>
                    <div class="col-sm-10">
                        <input type="text" name="direccion_responsable" id="direccion_responsable" class="form-control" value="<?php echo $this->fila['DIRECCION_RESPONSABLE']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 telefono_responsable" for="telefono_responsable">Telefono responsable:</label>
                    <div class="col-sm-10">
                        <input type="text" name="telefono_responsable" id="telefono_responsable" class="form-control" value="<?php echo $this->fila['TELEFONO_RESPONSABLE']; ?>" onblur="if (esNoVacio('telefono_responsable')) comprobarLetrasNumeros('telefono_responsable',60)">
                    </div>
                </div>

                    <img src=./VIEW/icons/editar.png height="40" width="40" onclick="insertacampo(document.formusuarioeditar,'action','editar'); insertacampo(document.formusuarioeditar,'controlador','RESPONSABLE'); enviaform(document.formusuarioeditar);">
                    <!--<input type='submit' name='action' value='editar'>-->

            </form>

            <br><br><img src='./VIEW/icons/volver.png' height="40" width="40" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','RESPONSABLE');enviaform(document.formenviar);">

            <br>
            <br>
            <br>
            <br>
            <br>

    <?php

        include './VIEW/footer.php';
    } // fin de render
    //this.form-asignatura-editar, 'action', 'editar') insertacampo(this.forms['form-asignatura-editar'], 'controlador','pepe');
} //FIN DE CLASE MESSAGE
    ?>