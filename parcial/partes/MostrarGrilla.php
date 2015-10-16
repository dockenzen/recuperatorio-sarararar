<?php


require_once("clases/AccesoDatos.php");
require_once("clases/usuario.php");

$arrayUser = usuario::TraerTodoLosUsuarios();

echo "<table border = 1>";
echo "<tr><td>Nombre</td><td>Email</td><td>Password</td>	</tr>";
foreach ($arrayUser as $key) {
echo "<tr>	";

	//echo $key->$id;
	echo"<td>". $key->nombre."</td>";
	echo"<td>". $key->correo."</td>";
	echo"<td>". $key->clave."</td>";
	echo "</tr>";
}
echo "</table>";

?>