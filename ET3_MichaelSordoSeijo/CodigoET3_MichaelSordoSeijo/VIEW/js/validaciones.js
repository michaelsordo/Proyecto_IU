    
    //jrodeiro
    //3/10/2017
    //cierra la ventan modal de muestra de un mensaje de error
    //
    function cerrarModal(){
      document.getElementById("modal").style.display = "none"; 
    }

    //jrodeiro
    //3/10/2017
    //Abre una ventan modal para mostrar un mensaje de error
    //    
    function abrirModal(idelemento, texto){
      document.getElementById("modal").style.display = "block";   
      document.getElementById("mensajeError").innerHTML = texto;
      document.getElementById("mensajeError").style.margin = "30px 0 0 160px";
      document.getElementById("cerrar").focus();
    } 


    //jrodeiro
    //25/9/2017
    //Valida un campo del formulario para ver si viene null o sin contenido
    //
    function esNoVacio(idelemento){
      
      var correcto = false;
      valor = document.getElementById(idelemento).value;
      nombre = document.getElementById(idelemento).name;
      longitud = document.getElementById(idelemento).value.length;
      if ((valor == null) || (longitud == 0)){
        abrirModal(idelemento, "El "+ nombre +" no puede ser vacio");
        correcto = false;
      } 
      else{
        correcto = true;
      }

      if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
      }
      
    }


  	//jrodeiro
    //4/10/2017
    //Valida la longitud de un texto pasandole el objeto y el tamaño en caracteres letras y numeros que puede tener.
    //
    // 
    function comprobarLetrasNumeros(idelemento,size) {

      var correcto = true;
		  
      if (document.getElementById(idelemento).value.length>size) {
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" excede el tamaño. Tiene "+document.getElementById(idelemento).value.length+" caracteres");
        correcto = false;
  		}
		  
     	var patron = /^[A-Za-z0-9\s]+$/g; // Cambiamos el patron para permitir espacios, cambio 06/01/2021 hecho por msseijo18
  		if (!patron.test(document.getElementById(idelemento).value)){ // si no cumple el patron pq hay elementos que no son digitos
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" solo debe contener letras y digitos");
        correcto = false;
      }
      
      if (correcto){
      	document.getElementById(idelemento).style.borderColor = "green"; // cambiamos el color del borde del elemento html a verde
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
      }

    }

    //jrodeiro
    //26/9/2017
    //Valida la longitud de un texto pasandole el objeto y el tamaño en caracteres solo letras que puede tener.
    //
    // 
    function comprobarSoloLetras(idelemento,size) {
    
      var correcto = true;

      if (document.getElementById(idelemento).value.length>size) {
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" excede el tamaño");
        correcto = false;
      }
      var patron = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;
      //var patron = /^[a-zA-Z]+$/; // establecemos un patron para cualquier letra incluyendo acentos y ñ
      if (!patron.test(document.getElementById(idelemento).value)){ // si no cumple el patron pq hay elementos que no son digitos
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" solo admite letras");
        correcto = false;
      }

      if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green'; // cambiamos el color del borde del elemento html a verde
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
      }
      
    }

    //jrodeiro
    //25/9/2017
    //Valida todos los campos del formulario antes de permitir hacer el submit

    function comprobar_login(){
      
      if(
        esNoVacio('login_usuario') && comprobarLetrasNumeros('login_usuario',15)
       
      ){
        // si todas estan correctas devuelve un true
        encriptar();
        return true;
      }
      else{
        // si alguna falla devuelve un false
        return false;
      }
    }

    //jrodeiro
    //26/9/2017
    //Comprueba que sea un email formado correctamente
    //
    // 
    function comprobarEmail(idelemento,size) {
    
      var correcto = true;

      if (document.getElementById(idelemento).value.length>size) {
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" excede el tamaño");
        correcto = false;
      }
      
      var patron = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/; // establecemos un patron para un email
      if (!patron.test(document.getElementById(idelemento).value)){ // si no cumple el patron pq hay elementos que no son digitos
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" no tiene formato correcto");
        correcto = false;
      }

      if (correcto){      
        document.getElementById(idelemento).style.borderColor = 'green'; // cambiamos el color del borde del elemento html a verde
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
      }
      
    }

    //jrodeiro
    //25/9/2017
    //Valida la longitud de un int pasandole el objeto y el tamaño en digitos que puede tener.
    //
    //
    function comprobarSoloNumeros(idelemento,size) {
      
      var correcto = true;

      var patron = /^\d+$/; // establecemos un patron para cualquier numero de digitos
  		if (!patron.test(document.getElementById(idelemento).value)){ // si no cumple el patron pq hay elementos que no son digitos
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" debe contener digitos");
        correcto = false;
  		}

      if (document.getElementById(idelemento).value.length>size) {
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" excede el tamaño");
        correcto = false;
      }

      if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green'; // ponemos el bordercolor a verde
    	  return true; // devolvemos true
      }
      else{
        document.getElementById(idelemento).style.borderColor = 'red'; // ponemos el bordercolor a rojo
        return false;
      }
    	
    }

    //jrodeiro
    //10/10/2017
    //encriptar()
    //encripta en md5 el valor del campo password
    function encriptar(){
      document.getElementById('pass_usuario').value = hex_md5(document.getElementById('pass_usuario').value);
      return true;
    }

    //jrodeiro
    //04/10/2017
    //Valida que un campo lleve el formato nn:nn
    //
    
    function comprobarHoras(idelemento) {
      
      var correcto = true;

      var patron = /^[0-9]{2}:[0-9]{2}$/; // establecemos un patron para nn:nn
      if (!patron.test(document.getElementById(idelemento).value)){ // si no cumple el patron 
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" debe ser nn:nn");
        correcto = false;
      }

      if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green'; // ponemos el bordercolor a verde
        return true; // devolvemos true
      }
      else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
      }
      
    }

    //jrodeiro
    //04/10/2017
    //Comprueba el formato y lo da valido si es dni o nie
    //
    
    function comprobarDni(idelemento) {
      
      var correcto = true;

      var validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
      var nifRexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
      var nieRexp = /^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
      var str = document.getElementById(idelemento).value.toString().toUpperCase();

      if (!nifRexp.test(str) && !nieRexp.test(str)){
        abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" tiene formato incorrecto");
        correcto = false;        
      } 
      else{
        var nie = str
            .replace(/^[X]/, '0')
            .replace(/^[Y]/, '1')
            .replace(/^[Z]/, '2');

        var letter = str.substr(-1);
        var charIndex = parseInt(nie.substr(0, 8)) % 23;

        if (validChars.charAt(charIndex) === letter){
          correcto = true;
        }
        else{
          abrirModal(idelemento, "El "+document.getElementById(idelemento).name+" tiene formato incorrecto");
          correcto =  false;
        }
      }

      if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green'; // ponemos el bordercolor a verde
        return true; // devolvemos true
      }
      else{
        document.getElementById(idelemento).style.borderColor = 'red';
        return false;
      }
      
    }
  
   function comprobarLongitud(idelemento, size){
      
      var correcto = false;
      longitud = document.getElementById(idelemento).value.length;
      
      if (longitud > size){
        abrirModal(idelemento, "El "+ document.getElementById(idelemento).name + " no puede superar los " + size + " caracteres");
        correcto = false;
      } 
      else{
        correcto = true;
      }

      if (correcto){
        document.getElementById(idelemento).style.borderColor = 'green';
        return true;
      }
      else{
        document.getElementById(idelemento).style.borderColor = "red";
        return false;
      }
      
    }

    //
    //
    //

    function comprobar_Fichero(){

      idelemento = document.getElementById('Ruta');
      valor = document.getElementById('Ruta').value;
      extensiones_nopermitidas = new Array(".php",".sh");
      correcto = false;
           
      if (!valor) { 
         //Si no tengo archivo, es que no se ha seleccionado un archivo en el formulario 
         // abrirModal(idelemento, "No se ha seleccionado ningún archivo");
          //correcto = false;
          return true;
      }
      else{ 
         //recupero la extensión de este nombre de archivo 
         extension = valor.substring(valor.lastIndexOf(".")).toLowerCase(); 
      
         //compruebo si la extensión está entre las permitidas 
         
         /*for (var i = 0; i < extensiones_nopermitidas.length; i++) { 
            alert(extensiones_nopermitidas[i]+'-'+extension);
            if (extensiones_nopermitidas[i] == extension) { 
              permitida = false; 
              break; 
            } 
         } */
         if (extension == '.php'){
            abrirModal(idelemento, "No se pueden subir archivos .php");
            return false;
         }
         else{ 
            return true;
            //document.getElementById('Form').submit();
         } 
               
      }
    }


    //jrodeiro
    //25/9/2017
    //Valida todos los campos del formulario antes de permitir hacer el submit

    function comprobar_registro(){
      
      if(
        esNoVacio('login_usuario') && comprobarLetrasNumeros('login_usuario',15) &&
        esNoVacio('pass_usuario') && comprobarLetrasNumeros('pass_usuario',15) &&
        esNoVacio('nombre_usuario')  && comprobarSoloLetras('nombre_usuario',60) &&
        esNoVacio('email_usuario') && comprobarEmail('email_usuario',40)
      ){
        // si todas estan correctas devuelve un true
        encriptar();
        return true;
      }
      else{
        // si alguna falla devuelve un false
        return false;
      }
    }

    //jrodeiro
    //25/9/2017
    //Valida todos los campos del formulario antes de permitir hacer el submit

    function comprobar_login(){
      
      if(
        esNoVacio('login_usuario') && comprobarLetrasNumeros('login_usuario',15) &&
        esNoVacio('pass_usuario') && comprobarLetrasNumeros('pass_usuario',15)
      ){
        // si todas estan correctas devuelve un true
        encriptar();
        return true;
      }
      else{
        // si alguna falla devuelve un false
        return false;
      }
    }

    //jrodeiro
    //28/10/2017
    //Valida todos los campos del formulario antes de permitir hacer el submit

    /*function comprobar_EVALUACION(){
      
      if (comprobarLongitud('ComentarioIncorrecto',300)){
        // si todas estan correctas devuelve un true
        return true;
      }
      else{
        // si alguna falla devuelve un false
        return false;
      }
    }*/
