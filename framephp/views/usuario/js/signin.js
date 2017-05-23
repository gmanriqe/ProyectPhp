if(typeof jQuery != 'undefined'){
	$(document).ready(fnInicializadora);
	
	function fnInicializadora(){
		$('#btn_registrar').click(validacion);
	}
	
	function validacion(){
		var usuario = document.getElementById("usuario").value;
		var nombre = document.getElementById("nombre").value
		var clave1 = document.getElementById("clave1").value
		var clave2 = document.getElementById("clave2").value
		var email = document.getElementById("email").value
		var telefono = document.getElementById("telefono").value
		
		if(usuario == ''){
			alert('Ingrese Usuario');
		}else if(nombre == ''){
			alert('Ingrese nombre');
		}else if(clave1 == ''){
			alert('Ingrese clave1');
		}else if(clave2 == ''){
			alert('Ingrese clave2');
		}else if(email == ''){
			alert('Ingrese email');
		}else if(telefono == ''){
			alert('Ingrese telefono');
		}else if( clave1 != clave2 ){
			alert('Las claves no coinciden');
		}else {
			//alert('muy bien');
			$.post('../usuario/registerus', {
				usuario: usuario,
				nombre: nombre,
				clave1: clave1,
				email: email,
				telefono: telefono
			}, function(respuesta){
				console.log(respuesta);
				if(respuesta == 'Ok'){
					$('#zona_respuesta').html('<font color="green">ya estas registrado</font>')
					window.location.href= "../index/iniciasesionus";
				}else {
					$('#zona_respuesta').html('<font color="green">Error al grabar</font>')
				}
			});
		}
	}
}