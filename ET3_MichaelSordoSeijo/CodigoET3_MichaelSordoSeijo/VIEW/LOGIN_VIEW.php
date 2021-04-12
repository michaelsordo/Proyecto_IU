<?php
class LOGIN_VIEW{

function __construct(){
	$this->render();
}

function render(){

    include './VIEW/header.php'
	
?>

<!--Incluimos el html que contiene la pagina de login-->        

<html lang="es">
 
        <title>Login</title>
       
    </head>
    <div class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4 titulo"></h3></div>
                                    <div class="card-body">

                                        <!--Enviamos por POST los datos al index para buscar controladores-->
                                            
                                        <form name="formulariologin" action="./index.php" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Usuario</label>
                                                <input class="form-control py-4" id="login_usuario" type="text" name="login_usuario" placeholder="correo_place" onblur="if (esNoVacio('login_usuario')) comprobarLetrasNumeros('login_usuario',15)";/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1 pass_usuario" for="inputPassword">Contraseña</label>
                                                <input class="form-control py-4" id="pass_usuario" type="password" name="pass_usuario" placeholder="pass_place" onblur="esNoVacio('pass_usuario')";/>
                                            </div>
                                            <div class="form-group d-flex align-items-center">
                                                <!--<input type="submit" class="btn btn-primary center-block"  value="Login" >-->
											
                                                <!--<img src='./VIEW/icons/login.png' type="submit" height="40" width="40" onclick = "insertacampo(document.formulariologin,'action','login'); insertacampo(document.formulariologin,'controlador','LOGIN'); enviaformcorrecto(document.formulariologin, comprobar_login());">
                                                -->

                                                <button class="button" onclick="insertacampo(document.formulariologin,'action','login'); insertacampo(document.formulariologin,'controlador','LOGIN'); enviaformcorrecto(document.formulariologin, comprobar_login());"> <img src="./VIEW/icons/login.png" height="35" width="35"> </button>

                                            </div>
                                        </form>
                                        <p class="No_tienes_cuenta"></p><a style="cursor: pointer" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','formregistrar'); insertacampo(document.formenviar,'controlador','REGISTRO');enviaform(document.formenviar);"><b class="aqui">aquí</b></a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
    </div>
</html>
		
	<?php

	include './VIEW/footer.php';
	} //fin de render
} //fin de clase
?>
