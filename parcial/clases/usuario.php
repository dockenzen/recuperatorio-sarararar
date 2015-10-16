<?php


class Usuario
{
	
	public $id;
	public $nombre;
	public $correo;
	public $clave;

	public function BorrarUsuario()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarUsuario($this->id)");
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarUsuario()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("
				CALL ModificarUsuario('$this->id', '$this->nombre')");
			return $consulta->execute();

	 }
	public function InsertarUsuario()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                $consulta =$objetoAccesoDato->RetornarConsulta("CALL InsertarUsuario('$this->nombre','$this->correo','$this->clave')");
                $consulta->execute();       
                return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
	public function GuardarUsuario()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarUsuario();
	 		}else {
	 			$this->InsertarUsuario();
	 		}

	 }
	 public static function TraerTodoLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodosLosUsuarios()");
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");
	}

	public static function TraerUnUsuario($id)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUnUsuario('$id')");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;	


	}
	public static function validarUsuario($usuario,$clave)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where correo='$usuario' and clave='$clave'");
            $consulta->execute();
            return $consulta->rowCount();
     }


}

?>