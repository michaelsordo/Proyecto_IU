<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="author" content="Michael Sordo Seijo" />

	<!--Idiomas-->
	<script type="text/javascript" src="./LOCALE/Lang_ES.js"></script>
	<script type="text/javascript" src="./LOCALE/Lang_GA.js"></script>
	<script type="text/javascript" src="./LOCALE/Lang_EN.js"></script>
	<script type="text/javascript" src="./LOCALE/idioma.js"></script>

	<!--Estilos css propios y de bootstrap, contenidos estes últimos en la carpeta css/styles.css-->
	<link href="VIEW/css/styles.css" rel="stylesheet" />
	<link href="VIEW/css/estilospropios.css" rel="stylesheet" />

	<!--Estilos para las validaciones-->
	<link rel="stylesheet" type="text/css" href="./VIEW/css/modal.css" />

	<!--Diseño de cruds con bootstrap-->
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

	<!--Calendario,validaciones y funciones comunes-->
	<script type="text/javascript" src="./VIEW/js/tcal.js"></script>
	<script type="text/javascript" src="./VIEW/js/md5.js"></script>
	<script type="text/javascript" src="./VIEW/js/validaciones.js"></script>
	<script type="text/javascript" src="./VIEW/js/funcionescomunes.js"></script>

	<!--Scripts necesarios para que funcione el desplegable en el icono de usuario-->
	<script src="VIEW/js/scriptuser.js"></script>
	<script src="VIEW/js/slim.min.js"></script>
	<script src="VIEW/js/popper.min.js"></script>
	<script src="VIEW/js/bootstrap.min.js"></script>
	<!--
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	-->
	<!--Scripts necesarios para el uso de la api fullcallendar-->
  
	<script src='./VIEW/fullcallendar/js/jquery.min.js'></script>
	<script src='./VIEW/fullcallendar/js/moment.min.js'></script>
	<link href='./VIEW/fullcallendar/css/fullcalendar.min.css' rel='stylesheet' />
	<script src='./VIEW/fullcallendar/js/fullcalendar.min.js'></script>
	<script src='./VIEW/fullcallendar/locale/es.js'></script>

	<!--Para favicon -->
	<link rel="icon" type="image/png"  href="./VIEW/icons/calendar.png">


	


</head>
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
	<img src="./VIEW/icons/calendar.png" height="50" width=50><h2>CalendarAPP</h2>

	<!--Idiomas y validaciones-->

	<body onload="setLang()">
		<div class="idioma">
			<a onclick="setLang('ES')"><img class="flag" style="cursor:pointer" src="./VIEW/img/spain.png" height="30" width="30"></a>
			<a onclick="setLang('GA')" function galego();><img class="flag" style="cursor:pointer" src="./VIEW/img/gal.png" height="30" width="30"></a>
			<a onclick="setLang('EN')"><img class="flag" style="cursor:pointer" src="./VIEW/img/uk.png" height="30" width="30"></a>

		</div>

		<div id="modal" style="display:none">
			<div id="contenido-interno">
				<div id="aviso"><img src="./VIEW/icons/salir.png" name="aviso" /></div>
				<div id="mensajeError"></div>
				<a id="cerrar" href="#" onclick="cerrarModal();">
					<img style="cursor: pointer" alt="" src="./VIEW/icons/salir.png" width="25" />
				</a>
			</div>
		</div>


		<!-- Sidebar Toggle (Topbar) -->
		<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
			<i class="fa fa-bars"></i>
		</button>

		<!-- Topbar Navbar -->
		<ul class="navbar-nav ml-auto">


			<!-- Nav Item - User Information -->
			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					
					

					<!--<a class = 'usuarioconectado'>Usuario conectado : </a>-->
					<!--Mostramos en el header la sesion del usuario-->
					<?php
					if (!$_SESSION) {
						echo "";
					?>
						<b class="sin_user"></b>
					<?php
					} else {
						echo $_SESSION['login_usuario'];
					}
					?>

					<img class="img-profile rounded-circle" src="./VIEW/img/perfil.svg" height="40" width="40">
				</a>
				<!-- Dropdown - User Information -->
				<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

					<?php
					if (Autenticacion() === true) {
					?>

						<a class="dropdown-item">

							<a style="cursor:pointer" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','formularioeditar_perfil'); insertacampo(document.formenviar,'controlador','USUARIO');enviaform(document.formenviar);insertacampo(document.formenviar,'login_usuario','<?php echo $_SESSION['login_usuario']; ?>'); enviaform(document.formenviar);">Perfil</a>

						</a>

						<a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">


								<a style="cursor:pointer" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','desconectar'); insertacampo(document.formenviar,'controlador','USUARIO');enviaform(document.formenviar);">Cerrar Sesión</a>

							<?php
						} else {
							?>
								<a class="dropdown-item user_no_register">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400 "></i>
									Usuario sin registrar
								</a>

							<?php
						}
							?>
							</a>
				</div>


			</li>

		</ul>

</nav>
<!-- End of Topbar -->
</body>
<!--
	
<?php
if (Autenticacion() === true) {
?>
	<a onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','desconectar'); insertacampo(document.formenviar,'controlador','USUARIO');enviaform(document.formenviar);">Desconectar</a><BR>

<?php
}
?>
-->


</html>