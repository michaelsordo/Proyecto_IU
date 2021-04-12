arrayES = {

	// generales base de datos
	'00000': 'Error al conectar con la base de datos. Contacte con su administrador',
	//'00001' : 'Exito al ejecutar el sql',
	//'00002' : 'Error al ejecutar el sql', 
	//'00003' : 'El recordset esta vacio',
	//'00004' : 'El recordset no esta vacio',

	// generales interfaz
	'usuarioconectado': 'Usuario conectado : ',
	'desconectar': 'Desconectar',
	'GA': 'Galego (GA)',
	'ES': 'Español (ES)',
	'EN': 'English (EN)',

	//- titulos

	'saludoADD': 'Bienvenidos al formulario de inserción',
	'saludoSEARCH': 'Bienvenidos al formulario de búsqueda',

	//Traduccion para la vista de recursos

	'ID_RECURSO': 'ID_RECURSO',
	'NOMBRE_RECURSO': 'NOMBRE_RECURSO',
	'DESCRIPCION_RECURSO': 'DESCRIPCION_RECURSO',
	'LOGIN_RESPONSABLE': 'LOGIN_RESPONSABLE',
	'TARIFA_RECURSO': 'TARIFA_RECURSO',
	'RANGO_TARIFA': 'RANGO_TARIFA',

	//- errores add Recurso
	'02118': 'EL TAMAÑO DEL ID_RECURSO NO PUEDE SER MAYOR DE 3',
	'02119': 'El ID_RECURSO SOLO PUEDE CONTENER NUMEROS',
	'03110': 'EL NOMBRE DEL RECURSO SOLO PUEDE CONTENER LETRAS',
	'03111': 'EL NOMBRE DEL RECURSO DEBE TENER 40 COMO TAMAÑO MÁXIMO ',
	'03112': 'LA DESCRIPCIÓN DEL RECURSO SOLO DEBE CONTENER NUMEROS Y LETRAS ',
	'03113': 'EL TAMAÑO MÁXIMO DE DESCRIPCION RECURSO NO PUEDE SER MAYOR DE 100 ',
	'03116': 'EL TAMAÑO MÍNIMO DEL LOGIN DE RESPONSABLE ES 3 ',
	'03114': 'EL LOGIN DE USUARIO SOLO PUEDE CONTENER VALORES ALFANUMÉRICOS ',
	'03115': 'EL TAMAÑO MÁXIMO DEL LOGIN DE RESPONSABLE ES 15',
	'03117': 'LA TARIFA RECURSO SOLO PUEDE CONTENER NÚMEROS ',
	'03118': 'EL TAMAÑO MÁXIMO ES 3 ',

	//- errores add HORARIO

	'02116': 'EL TAMAÑO DEL ID_HORARIO NO PUEDE SER MAYOR DE 5',
	'02117': 'El ID_HORARIO SOLO PUEDE CONTENER NUMEROS',
	'01106': 'EL TAMAÑO DEL ID_CALENDARIO NO PUEDE SER MAYOR DE 2',
	'01107': 'El ID_CALENDARIO SOLO PUEDE CONTENER NUMEROS',
	'02118': 'EL TAMAÑO DEL ID_RECURSO NO PUEDE SER MAYOR DE 3',
	'02119': 'El ID_RECURSO SOLO PUEDE CONTENER NUMEROS',
	'02122': 'EL MOTIVO SOLO PUEDE CONTENTER LETRAS Y NÚMEROS CON ESPACIOS',
	'02123': 'EL MOTIVO DEL HORARIO SOLO PUEDE TENER COMO MÁXIMO 100 CARACTERES',
	'02124': 'EL LOGIN DE USUARIO SOLO PUEDE CONTENER VALORES ALFANÚMERICOS',
	'02125': 'EL TAMAÑO MÁXIMO DEL LOGIN DE USUARIO ES 15',
	'02126': 'EL TAMAÑO MÍNIMO DEL LOGIN DE USUARIO ES 3',
	'02127': 'EL MOTIVO SOLO PUEDE CONTENER LETRAS Y NÚMEROS',
	'02128': 'EL TAMAÑO MÁXIMO DEL MOTIVO ES 100',
	

	//errores add responsable

	'04118': 'TAMAÑO MAX DE DIRECCION 60',
	'04117': 'SOLO FORMATO DIRECCION',
	'04120': 'EL TELEFONO SOLO DEBE LLEVAR NUMEROS',
	'04119': 'EL TAMAÑO MÁXIMO PARA TELEFONO ES 9',


	//errores add calendario

	'01106': 'EL ID_CALENDARIO EXCEDE EL TAMAÑO',
	'01107': 'EL ID_CALENDARIO CONTIENE VALORES NO NUMÉRICOS',
	'01108': 'EL TAMAÑO DEL NOMBRE_CALENDARIO SOLO PUEDE SER DE 40',
	'01109': 'El NOMBRE_CALENDARIO SOLO PUEDE TENER LETRAS Y NUMEROS',
	'01110': 'SE EXCEDE EL TAMAÑO DE DESCRIPCION_CALENDARIO',
	'01111': 'SOLO LETRAS Y NUMEROS PARA LA DESCRIPCION',


	// exito ADD , EDIT Recurso

	'03001': 'Exito al insertar el recurso ',
	'03002': 'Exito al editar el recurso ',
	'03003': 'Error al editar el recurso ',
	'03004': 'Recurso borrado correctamente ',

	// exito ADD responsable

	'08001': 'Exito al insertar el responsable',
	'08002': 'Exito al editar el responsable',
	'08003': 'Exito al borrar el responsable',
	'08004': 'Error al editar el responsable',


	//exito y error ADD calendario

	'03400' : 'Exito al insertar el calendario',
	'03401' : 'Exito al borrar el calendario',
	'03402' : 'Exito al editar el calendario',
	'03403' : 'Error al editar el calendario',



	//exito y error ADD horario

	'03021' : 'Exito al insertar el horario',
	'03022' : 'Exito al borrar el horario',
	'03023' : 'Exito al editar el horario',
	'03024' : 'Error al editar el horario', 


	'01100': 'Error al insertar la asignatura',
	'01101': 'El código de recurso ya existe',
	'01102': 'Error al ejecutar la modificación de la asignatura',
	'01103': 'Error al ejecutar el borrado de la asignatura',
	'01104': 'Error al ejecutar la búsqueda en la base de datos',

	//-exito
	'01000': 'Exito al insertar la asignatura',
	'01001': 'Asignatura modificada correctamente',
	'01002': 'Asignatura borrada correctamente',

	//- errores formato
	'01105': 'EL TAMAÑO DEL CODIGO DE ASIGNATURA NO PUEDE SER MENOR QUE 8',
	
	
	// usuario
	//- titulos
	'GestUsu': 'Gestión de Usuarios',
	'saludoLOGIN': 'Bienvenido al formulario de login',
	'saludoREGISTRO': 'Bienvenido al formulario de registro',
	
	//- atributos
	'login_usuario': 'Nombre de Usuario',
	'pass_usuario': 'Contraseña de Usuario',
	'nombre_usuario': 'Nombre y Apellidos',
	'email_usuario': 'Email de Usuario',
	
	//- errores
	'02100': 'Error al insertar el usuario',
	'02101': 'El login de usuario ya existe',
	'02106': 'Error al insertar el usuario',
	'02107': 'Error al modificar el usuario',
	'02108': 'Error al borrar el usuario',
	'02102': 'No existe el usuario',
	'02103': 'La contraseña no es correcta',
	'02104': 'No se puede registrar porque el email ya existe',
	'02105': 'No se puede registrar porque el usuario ya existe',
	'02106': 'Usuario logueado correctamente',

	//-exito
	'02001': 'Exito al insertar la usuario',
	'02002': 'Usuario modificado correctamente',
	'02003': 'Usuario borrado correctamente',
	'02004': 'Usuario registrado correctamente',

	//header

	'user_no_register': 'Usuario sin registrar',
	'sin_user': 'Sin usuario',

	//login
	'saludoLOGIN': 'Bienvenido al formulario de login',
	'titulo': 'Inicia Sesión',
	'correo_place': 'Introduce tu correo',
	'pass_place': 'Introduce tu contraseña',
	'No_tienes_cuenta': 'Todavía no tienes cuenta?,Registrate',
	'aqui': 'aquí',

	//registro
	'saludoREGISTRO': 'Bienvenido al formulario de registro',
	'registro': 'Registro',
	'Ya_cuenta': 'Ya tienes una cuenta?, Inicia sesión',

	//recurso

	'id_recurso': 'ID recurso',
	'nombre_recurso': 'Nombre recurso',
	'descripcion_recurso': 'Descripcion recurso',
	'login_responsable': 'Login responsable',
	'tarifa_recurso': 'Tarifa recurso',
	'rango_tarifa': 'Rango tarifa',
	'recursos': 'Recursos',
	'bienvenido_recurso': 'Bienvenido a la tabla de muestra de Recursos',
	'recursos': 'Recursos',
	'SOLICITAR': 'SOLICITAR',
	'reserva_recursos': 'Bienvenido a la tabla de reserva de recursos',
	

	//horario

	'horarios': 'Horarios',
	'bienvenido_horarios':'Bienvenido a la tabla de muestra de horarios',
	'ID_HORARIO': 'ID_HORARIO',
	'ID_RECURSO': 'ID_RECURSO',
	'FECHA_HORARIO': 'FECHA_HORARIO',
	'HORA_INICIO_HORARIO': 'HORA_INICIO_HORARIO',
	'MOTIVO_HORARIO': 'MOTIVO_HORARIO',
	'FECHA_SOLICITUD_RECURSO': 'FECHA_SOLICITUD_RECURSO',
	'LOGIN_USUARIO': 'LOGIN_USUARIO',
	'ES_RESERVA': 'ES_RESERVA',
	'ES_RECHAZADA': 'ES_RECHAZADA',
	'FECHA_RESPUESTA_RECURSO': 'FECHA_RESPUESTA_RECURSO',
	'MOTIVO_RECHAZO_SOLICITUD': 'MOTIVO_RECHAZO_SOLICITUD',
	'FUE_USADO': 'FUE_USADO',
	'COSTE_SOLICITUD': 'COSTE_SOLICITUD',

	//informe

	'Informe': 'Informe de recurso',
	'informe_uso' : 'Bienvenido al informe de uso de recursos',
	'ver' : 'Aquí podrás ver si un recurso fue usado o no, puedes buscar por recurso o por fecha',
	

	//mis reservas

	'mis_reservas' : 'Mis reservas',
	'bienvenido_reservas': 'Bienvenido a la tabla de muestra de reservas',


	//titulos, menu

	'menu_aplicacion': 'Menú de la aplicación',
	'menu_aplicacion_usuario': 'Menu de la aplicación para usuarios',
	'menu_aplicacion_responsable': 'Menu de la aplicación para responsables',
	'menu_calendario' : 'Calendario',
	'administracion':'ADMINISTRACION',
	'menu_user':'MENU USUARIO',

	//calendario


	// usuario
	'usuarios': 'Usuarios',
	'tabla_muestra': 'Bienvenido a la tabla de muestra de Usuarios',
	'En_esta_pantalla': 'En esta pantalla podrás añadir,buscar,editar,eliminar y volver atrás,gracias a los botones interactivos.',
	'login_usuario': 'Nombre de Usuario',
	'pass_usuario': 'Contraseña de Usuario',
	'nombre_usuario': 'Nombre usuario',
	'email_usuario': 'Email usuario',
	'es_admin': 'Administrador',
	'es_activo': 'Usuario activo',
	'hacer_responsable': 'Hacer responsable',

	//calendario

	'calendarios': 'Calendarios',
	'tabla_muestra': 'Bienvenido a la tabla de muestra de Calendarios',
	'En_esta_pantalla': 'En esta pantalla podrás añadir,buscar,editar,eliminar y volver atrás,gracias a los botones interactivos.',
	'id_calendarios': 'ID_CALENDARIO',
	'ID_CALENDARIO': 'ID_CALENDARIO',
	'HORA_FIN_HORARIO' : 'HORA_FIN_HORARIO',
	'nombre_calendario': 'NOMBRE_CALENDARIO',
	'descripcion_calendario': 'DESCRIPCION_CALENDARIO',
	'fecha_inicio_calendario': 'FECHA_INICIO_CALENDARIO',
	'fecha_fin_calendario': 'FECHA_FIN_CALENDARIO',
	'hora_inicio_calendario': 'HORA_INICIO_CALENDARIO',
	'hora_fin_calendario': 'HORA_FIN_CALENDARIO',




	//errores
	'errorinsertarrecurso': 'Error al insertar el recurso',
	'errorborrarrecurso': 'Error al borrar el recurso',
	'erroreditarrecurso': 'Error al editar el recurso',
	'errorborrarasignatura': 'Error al borrar la asignatura',
	'errorinsertarusuario': 'Error al insertar el usuario',
	'erroreditarusuario': 'Error al modificar el usuario',
	'errorborrarusuario': 'Error al borrar el usuario',
	'0000z': 'No existe el usuario',
	'0000x': 'La contraseña no es correcta',
	'100002': 'No se puede registrar porque el email ya existe',
	'100003': 'No se puede registrar porque el usuario ya existe',
	'errorregistrousuario': 'No se ha podido registrar por error al acceder a la BD',
	'errorinsertarcalendario': 'Error al insertar el calendario',
	'errorborrarcalendario': 'Error al borrar el calendario',
	'erroreditarcalendario': 'Error al editar el calendario',
	'errorinsertarhorario': 'Error al insertar el horario',
	'errorborrarhorario': 'Error al borrar el horario',
	'erroreditarhorario': 'Error al editar el horario',


	//exito
	'exitoinsertarrecurso': 'Exito al insertar el recurso',
	'exitoeditarrecurso': 'Recurso modificado correctamente',
	'exitoborrarasignatura': 'Asignatura borrada correctamente',
	'exitoinsertarusuario': 'Exito al insertar la usuario',
	'exitoeditarusuario': 'Usuario modificado correctamente',
	'exitoborrarusuario': 'Usuario borrado correctamente',
	'existoregistrousuario': 'Usuario registrado correctamente',
	'exitoborrarrecurso': 'Recurso borrado con éxito',
	'exitoinsertarcalendario': 'Calendario creado con éxito',
	'exitoborrarcalendario': 'Calendario borrado con éxito',
	'exitoeditarcalendario': 'Calendario editado correctamente',
	'exitoinsertarhorario': 'Horario creado con éxito',
	'exitoborrarhorario': 'Horario borrado con éxito',
	'exitoeditarhorario': 'Horario editado con éxito',

	//administrador

	'GestUsu': 'Gestión de Usuarios',
	'GestRes': 'Gestion de Reservas',
	'GestRec': 'Gestión de Recursos',
	'GestCal': 'Gestión de Calendarios',
	'GestResponsable': 'Gestion de Responsables',

	//usuario

	'MisRes': 'Mis Reservas',

	//Responsable

	'reservas_usuarios': 'Gestion de reservas',

	//footer

	'sitio_creado' : 'Sitio creado por ',










}