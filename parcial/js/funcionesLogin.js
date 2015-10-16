function validarLogin()
{
		var correo=$("#correo").val();
		var clave=$("#clave").val();
		var recordar=$("#recordarme").is(':checked');
		
$("#sidebar").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");

	var funcionAjax=$.ajax({
		url:"php/validarUsuario.php",
		type:"post",
		data:{

			recordarme:recordar,
			correo:correo,
			clave:clave
		}
	});
	funcionAjax.done(function(retorno){
		alert(retorno);
			if(retorno.trim()=="ingreso"){
				Mostrar('MostrarGrilla');
				//MostarLogin();
			}
        else
        {
			MostarLogin();
        }
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#sidebar").html(retorno.responseText);
	});

}