<?php

require_once("clases/AccesoDatos.php");
require_once("clases/usuario.php");
$queHago=$_POST['queHacer'];

switch ($queHago) 
{

		case 'MostrarLogin':
			include("partes/formLogin.php");
			break;
		case 'alta':
			include("partes/formUsuario.php");
			break;
		case 'GuardarUsuario':			
			$user = new usuario();
			$user->id = $_POST["id"];
			$user->nombre = $_POST["nombre"];
			$user->correo = $_POST["correo"];
			$user->clave = $_POST["clave"];

			$cantidad = $user->GuardarUsuario();
			echo $cantidad;
			break;

		case 'TraerUsuario':
			session_start();
			$usuario = usuario::TraerUnUsuario($_SESSION['usuarioActual']);
			echo json_encode($usuario);
			break;
			case 'MostrarGrilla':
				include("partes/MostrarGrilla.php");
				break;

}


?>