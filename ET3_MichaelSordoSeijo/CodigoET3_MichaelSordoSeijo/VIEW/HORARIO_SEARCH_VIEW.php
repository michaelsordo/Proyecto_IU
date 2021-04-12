<?php

class HORARIO_SEARCH
{

    function __construct()
    {
        $this->render();
    }

    function render()
    {

        include './VIEW/header.php';
?>


        <a class='saludoSEARCH'>-</a><BR><BR>

        <form class="form-horizontal" name="formulariobuscar" action="index.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2 id_calendario" for="id_calendario">ID calendario:</label>
                <div class="col-sm-10">
                    <input type="text" name="id_calendario" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 id_horario" for="id_horario">ID horario:</label>
                <div class="col-sm-10">
                    <input type="text" name="id_horario" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 id_recurso" for="id_recurso">ID recurso:</label>
                <div class="col-sm-10">
                    <input type="text" name="id_recurso" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 fecha_horario" for="fecha_horario">Fecha:</label>
                <div class="col-sm-10">
                    <input type="date" name="fecha_horario" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 hora_inicio_horario" for="hora_inicio_horario">Hora inicio :</label>
                <div class="col-sm-10">
                    <input type="time" name="hora_inicio_horario" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 hora_fin_horario" for="hora_fin_horario">Hora fin:</label>
                <div class="col-sm-10">
                    <input type="time" name="hora_fin_horario" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 motivo_horario" for="motivo_horario">Motivo Horario:</label>
                <div class="col-sm-10">
                    <input type="text" name="motivo_horario" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 hora_fin_horario" for="hora_fin_horario">Hora fin:</label>
                <div class="col-sm-10">
                    <input type="time" name="hora_fin_horario" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 fecha_solicitud_recurso" for="fecha_solicitud_recurso">Fecha solicitud recurso:</label>
                <div class="col-sm-10">
                    <input type="date" name="fecha_solicitud_recurso" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 login_usuario" for="login_usuario">Login usuario :</label>
                <div class="col-sm-10">
                    <input type="text" name="login_usuario" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class='es_reserva control-label col-sm-2'>Reserva:</label>
                <div class="col-sm-10">
                    <select name='es_reserva' class="form-control">
                        <option value=''>-------</option>
                        <option value='SI'>SI</option>
                        <option value='NO'>NO</option>
                    </select><br>
                </div>
                <div class="form-group">
                    <label class='es_rechazada control-label col-sm-2'>Rechazadas:</label>
                    <div class="col-sm-10">
                        <select name='es_rechazada' class="form-control">
                            <option value=''>-------</option>
                            <option value='SI'>SI</option>
                            <option value='NO'>NO</option>
                        </select><br>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 fecha_respuesta_recurso" for="fecha_respuesta_recurso">Fecha respuesta recurso :</label>
                        <div class="col-sm-10">
                            <input type="date" name="fecha_respuesta_recurso" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 motivo_rechazo_solicitud" for="motivo_rechazo_solicitud">Motivo rechazo solicitud :</label>
                        <div class="col-sm-10">
                            <input type="text" name="motivo_rechazo_solicitud" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class='fue_usado control-label col-sm-2'>Fue usado</label>
                        <div class="col-sm-10">
                            <select name='fue_usado' class="form-control">
                                <option value=''>-------</option>
                                <option value='SI'>SI</option>
                                <option value='NO'>NO</option>
                            </select><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 coste_solicitud" for="coste_solicitud">Coste solicitud:</label>
                        <div class="col-sm-10">
                            <input type="text" name="coste_solicitud" class="form-control">
                        </div>
                    </div>

                    <input type='hidden' name='controlador' value='HORARIO'>
                    <input type='submit' name='action' value='buscar_view'>

        </form>


        para volver al menú pulsa <a href="index.php">aqui</a>

        </body>

        </html>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>



<?php

        include './VIEW/footer.php';
    } //fin de render
} //FIN DE CLASS
?>