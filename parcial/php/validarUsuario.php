<?php 
session_start();


require "../clases/usuario.php";
require "../clases/AccesoDatos.php";

$recordar = $_POST["recordarme"];
$correo = $_POST["correo"];
$clave = $_POST["clave"];
if(usuario::validarUsuario($correo,$clave))
{

	$_SESSION['usuarioActual']=$_POST['correo'];

	if($recordar=="true")
	{
		setcookie("correo",$correo,  time()+36000 , '/');
		setcookie("clave",$clave,  time()+36000 , '/');
	}
	$retorno="ingreso";
}
else
{
	$retorno = "no esta en la base de datos";
}
echo $retorno;

?>