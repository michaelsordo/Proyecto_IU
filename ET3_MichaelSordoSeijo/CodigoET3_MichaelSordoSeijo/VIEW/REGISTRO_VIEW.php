<?php
class REGISTRO_VIEW{

function __construct(){
	$this->render();
}

function render(){

	include './VIEW/header.php';
?>

<body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-1 rounded-lg mt-10">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4 registro">Registro</h3></div>
                                    <div class="card-body">

                                        <!--Enviamos por POST los datos al index para buscar controladores-->
                                            
                                        <form name="formularioregistro" action="index.php" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1 login_usuario" for="inputEmailAddress">Usuario</label>
                                                <input class="form-control py-3" id="login_usuario" type="text" name="login_usuario" placeholder="Escribe el login" size = '15' onblur="if (esNoVacio('login_usuario')) comprobarLetrasNumeros('login_usuario',15);" />
                                            </div>
											<div class="form-group">
                                                <label class="small mb-1 nombre_usuario" for="inputPassword">Nombre</label>
                                                <input class="form-control py-3" id="nombre_usuario" type="text" name="nombre_usuario" placeholder="Escribe la contraseña" name='nombre_usuario' size = '60' onblur="if (esNoVacio('nombre_usuario')) comprobarSoloLetras('nombre_usuario',60);"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1 pass_usuario" for="inputPassword">Contraseña</label>
                                                <input class="form-control py-3" id="pass_usuario" type="password" name="pass_usuario" placeholder="Escribe la contraseña"size = '15' onblur="if (esNoVacio('pass_usuario')) comprobarLetrasNumeros('pass_usuario',15);" />
                                            </div>
											<div class="form-group">
                                                <label class="small mb-1 email_usuario" for="inputPassword">Email</label>
                                                <input class="form-control py-3" id="email_usuario" type="email" name="email_usuario" placeholder="Escribe la contraseña"size = '40' onblur="if (esNoVacio('email_usuario')) comprobarEmail('email_usuario',40);" />
                                            </div>
											
                                            <div class="form-group d-flex align-items-center">
                                            <!--Para enviar los datos a BD , informando que no es admin y que es usuario activo, sin esto no funciona en máquina-->
                                            <input id="es_admin" name="es_admin" type="hidden" value="NO">
                                            <input id="es_activo" name="es_activo" type="hidden" value="SI">
											<button class="btnsesion"> <img src="./VIEW/icons/register.png" alt="Icono para crear" height="20" width="20" onclick = "insertacampo(document.formularioregistro,'action','registrar'); insertacampo(document.formularioregistro,'controlador','REGISTRO');enviaformcorrecto(document.formularioregistro, comprobar_registro());"> </button>
                                               
                                            </div>
											
                                        </form>
                                        <p class="Ya_cuenta"></p><a style="cursor: pointer" href="./index.php"> <b class="aqui">aquí</b></a>	  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
    </body>


	<BR><BR><BR>

<!--
	<a class = 'saludoREGISTRO'>-</a><BR><BR><BR>

	<form name="formularioregistro" action="index.php" method="post">

	<label class='login_usuario'>-</label> 
		<input type='text' id='login_usuario' name='login_usuario' size = '15' onblur="if (esNoVacio('login_usuario')) comprobarLetrasNumeros('login_usuario',15);"><br>
	<label class='pass_usuario'>N</label>
		<input type='password' id='pass_usuario' name='pass_usuario' size = '15' onblur="if (esNoVacio('pass_usuario')) comprobarLetrasNumeros('pass_usuario',15);"><br>
	<label class='nombre_usuario'>N</label>
		<input type='text' id = 'nombre_usuario' name='nombre_usuario' size = '60' onblur="if (esNoVacio('nombre_usuario')) comprobarSoloLetras('nombre_usuario',60);"><br>
	<label class='email_usuario'>N</label>
		<input type='text' id = 'email_usuario' name='email_usuario' size = '40' onblur="if (esNoVacio('email_usuario')) comprobarEmail('email_usuario',40);"><br>
	

	<button class="btnsesion"> <img src="./VIEW/icons/anadir.png" alt="Icono para crear" height="50" width="50" onclick = "insertacampo(document.formularioregistro,'action','registrar'); insertacampo(document.formularioregistro,'controlador','REGISTRO');enviaformcorrecto(document.formularioregistro, comprobar_registro());"> </button>
	</form>

	-->


	

	<?php

	include './VIEW/footer.php';
	} //fin de render
} //fin de clase
?>