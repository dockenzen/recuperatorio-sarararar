function GuardarUsuario()
{

        var id = $("#id").val()
		var nombre=$("#nombre").val();
		var correo=$("#correo").val();
        var clave=$("#clave").val();

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"POST",
		data:{
			queHacer:"GuardarUsuario",
			nombre:nombre,
			correo:correo,
            clave:clave,
            id:id
            
		}
	});
	funcionAjax.done(function(retorno){
		MostrarGrilla();
		$("#informe").html("cantidad de agregados "+ retorno);

	});
	funcionAjax.fail(function(retorno){
		//alert(retorno);
		$("#informe").html(retorno.responseText);
	});
}
function BorrarUsuario(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarUsuario",
			id:idParametro
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrilla");
		$("#informe").html("cantidad de eliminados "+ retorno);

	});
	funcionAjax.fail(function(retorno){
		$("#informe").html(retorno.responseText);
	});
}

function EditarUsuario(idParametro)
{
    Mostrar('alta');
	//alert("Modificar");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerUsuario",
			id:idParametro
		}
	});
	funcionAjax.done(function(retorno){
		alert(retorno);
		var usuario =JSON.parse(retorno);
		$("#id").val(usuario.id);
		$("#nombre").val(usuario.nombre);
        $("#correo").val(usuario.correo);
        $("#clave").val(usuario.clave);

	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(retorno.responseText);
	});
}