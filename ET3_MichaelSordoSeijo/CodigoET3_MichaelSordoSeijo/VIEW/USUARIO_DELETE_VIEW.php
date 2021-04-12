<?php

class USUARIO_DELETE{

//ATRIBUTOS
var $fila;


//METODOS

	function __construct($fila){
		$this->fila = $fila;
		$this->render();
	}

	function render(){

		include './VIEW/header.php';
?>
Bienvenidos al formulario de confirmación de borrado<BR><BR><BR>

Para confirmar el borrado de un usuario pulse borrar <img src=./VIEW/icons/basura.png height="40" width="40" onclick = "insertacampo(document.formularioborrar,'action','borrar'); insertacampo(document.formularioborrar,'controlador','USUARIO'); enviaform(document.formularioborrar);"><BR><BR><BR>

<form class="form-horizontal" name="formularioborrar" action="index.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2 login_usuario" for="login_usuario">Nombre de usuario:</label>
    <div class="col-sm-10">
      <input type='text' name='login_usuario' class="form-control" value="<?php echo $this->fila['LOGIN_USUARIO']; ?>" readonly >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 pass_usuario" for="pass_usuario">Contraseña usuario:</label>
    <div class="col-sm-10">
      <input type='text' name='pass_usuario' class="form-control" value="<?php echo $this->fila['PASS_USUARIO']; ?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 nombre_usuario" for="nombre_usuario">Nombre Usuario:</label>
    <div class="col-sm-10">
     <input type='text' name='nombre_usuario' class="form-control" value="<?php echo $this->fila['NOMBRE_USUARIO']; ?>" readonly>
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2 email_usuario" for="email_usuario">Email usuario:</label>
    <div class="col-sm-10">
      <input type='text' name='email_usuario' class="form-control" value="<?php echo $this->fila['EMAIL_USUARIO']; ?>" readonly><br>
    </div>
  </div>
 

 


</form>



<img src='./VIEW/icons/volver.png' height="40" width="40" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','USUARIO');enviaform(document.formenviar);">
<br>
<br>
<br>
<br>
<br>
<br>

<?php
	
	include './VIEW/footer.php';

	}// fin de render

} //FIN DE CLASE MESSAGE
?>
