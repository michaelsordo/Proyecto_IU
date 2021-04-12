<?php

class MENU_VIEW
{

	//ATRIBUTOS



	//METODOS

	function __construct()
	{
		$this->render();
	}

	function render()
	{
		include './VIEW/header.php';
?>

		<body>

			<div id="layoutSidenav">
				<div id="layoutSidenav_nav">
					<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
						<div class="sb-sidenav-menu">
							<div class="nav">
								<div class="sb-sidenav-menu-heading administracion">Administracion</div>
								<br>
								<br>

								<li class="GestRec" style="cursor:pointer" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','RECURSO');enviaform(document.formenviar);"></li>
								<br>
								<br>
								<li class="GestRes" style="cursor:pointer" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','HORARIO');enviaform(document.formenviar);"></li>
								<br>
								<br>
								<li class="GestUsu" style="cursor:pointer" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','USUARIO');enviaform(document.formenviar);"></li>
								<br>
								<br>
								<li class="GestCal" style="cursor:pointer" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','CALENDARIO');enviaform(document.formenviar);"></li>
								<br>
								<br>
								<li class="GestResponsable" style="cursor:pointer" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar'); insertacampo(document.formenviar,'controlador','RESPONSABLE');enviaform(document.formenviar);"></li>
								<br>
								<div class="sb-sidenav-menu-heading menu_user">Menu de usuario</div>
								<br>
								<br>
								<li class="recursos" style="cursor:pointer" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar_user'); insertacampo(document.formenviar,'controlador','RECURSO');enviaform(document.formenviar);"></li>
								<br>
								<br>
								<li class="MisRes" style="cursor:pointer" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar_reserva'); insertacampo(document.formenviar,'controlador','HORARIO');enviaform(document.formenviar);"></li>
								<br>
								<br>
								<li class="Informe" style="cursor:pointer" onclick="crearform('formenviar','post'); insertacampo(document.formenviar,'action','buscar_informe'); insertacampo(document.formenviar,'controlador','INFORME');enviaform(document.formenviar);"></li>
								<br>

							</div>
								

						</div>
					</nav>
				</div>
				<div id="layoutSidenav_content">
					<main>
						<div class="container-fluid">
							<h1 class="mt-4 menu_aplicacion"></h1>
							<ol class="breadcrumb mb-4">
								<li class="breadcrumb-item menu_calendario"><a>Calendario</a></li>
								<li class="breadcrumb-item active menu_aplicacion"></li>

							</ol>
							<div class="card mb-4">
								<div class="card-body">
									<p class="mb-0">
										<!--Integración de un calendario en el centro-->

									<div id='calendar'></div>

									<script>
										$(document).ready(function() {
											$('#calendar').fullCalendar({
												header: {
													left: 'today,prev,next',
													center: 'title',
													right: 'month,basicWeek,BasicDay,agendaWeek,agendaDay'

												},

												events: './MODEL/FULLCALENDAR_MODEL.php',
												
											});
										});
									</script>
								</div>
							</div>
						</div>
					</main>
				</div>
			</div>
		</body>



		</html>

		<br>
		<br>
		<br>


<?php
		include './VIEW/footer.php';
	} // fin de render

} //FIN DE CLASE MESSAGE
?>