
/*function enviaformulario(){
	
	formulario = document.forms['form-asignatura-editar'];

	var input = document.createElement("input");
    input.type = "hidden";
    input.name = "action";
    formulario.appendChild(input);
    formulario.elements.action.value = 'editar';

	formulario.submit();

}*/

function insertacampo(form ,name, value){
	
	formulario = form;
	var input = document.createElement('input');
    input.type = 'hidden';
    input.name = name;
    input.value = value;
    formulario.appendChild(input);
}

function crearform(name, method){
	
	var formu = document.createElement('form');
	document.body.appendChild(formu);
    formu.name = name;
    formu.method = method;
    formu.action = 'index.php';   
}


function enviaform(form){
	
	form.submit();

}

function enviaformcorrecto(form, funcion){
	
	if (funcion){
		form.submit();
	}
	else{
		return false;
	}

}

function saludos(){
	alert('hola');
}