<?
	include_once('../shared/Conexion.php');
	include_once('../clases/Usuario.php');
	class UsuarioDAO
	{
		private $objetoUsuario;
		public function UsuarioDAO() 
		{
            Conexion::getInstancia();
			$this->objetoUsuario = new Usuario();
		}

		public function insertUsuario($codigo, $password, $nombres, $apellidos, $telefono, $tipo, $estado)
		{
			$sql = "INSERT INTO usuario VALUES('".$codigo."','".$password."','".$nombres."','".$apellidos."','".$telefono."','".$tipo."','".$estado."')";
            if (mysql_query($sql)) {
                echo "Usuario registrado correctamente";
              } else {
                echo "Error al registrar usuario: " . mysql_error();
              }	
		}

		public function updateUsuario($codigo, $password, $nombres, $apellidos, $telefono, $tipo, $estado)
		{
			$sql = "UPDATE usuario SET password = '".$password."', nombres = '".$nombres."', apellidos = '".$apellidos."'
            , telefono = '".$telefono."', tipo = '".$tipo."', estado = '".$estado."' WHERE codigo = '".$codigo."'";
            if (mysql_query($sql)) {
                echo "Usuario actualizado correctamente";
              } else {
                echo "Error al actualizar usuario: " . mysql_error();
              }
		}

		public function deleteUsuario()
		{
		
		}

		public function SelectUsuario($codigo)
		{
			$sql = "SELECT * FROM usuario WHERE codigo = '$codigo'";
			$resultado = mysql_query($sql);
			$numeroFilasEncontradas = mysql_num_rows($resultado);			
			if($numeroFilasEncontradas == 1)
			{
				$fila = mysql_fetch_array($resultado,MYSQL_ASSOC);
                $this->objetoUsuario->setCodigo($fila['codigo']);
				$this->objetoUsuario->setPassword($fila['password']);
				$this->objetoUsuario->setNombres($fila['nombres']);
				$this->objetoUsuario->setApellidos($fila['apellidos']);
				$this->objetoUsuario->setTelefono($fila['telefono']);
				$this->objetoUsuario->setTipo($fila['tipo']);
				$this->objetoUsuario->setEstado($fila['estado']);
				
			}
			else
			{
                $this->objetoUsuario->setCodigo(null);
				$this->objetoUsuario->setPassword(null);
				$this->objetoUsuario->setNombres(null);
				$this->objetoUsuario->setApellidos(null);
				$this->objetoUsuario->setTelefono(null);
				$this->objetoUsuario->setTipo(null);
				$this->objetoUsuario->setEstado(null);
			}
            Conexion::cerrar();
			return($this->objetoUsuario);
		}

		public function autenticarUsuario($codigo,$password)
		{
			$sql = "SELECT * FROM usuario WHERE codigo = '$codigo'";
			$resultado = mysql_query($sql);
			$objetoUsuario = new Usuario();
			$numeroFilasEncontradas = mysql_num_rows($resultado);			
			if($numeroFilasEncontradas == 1)
			{
				$fila = mysql_fetch_array($resultado,MYSQL_ASSOC);
                $objetoUsuario->setCodigo($fila['codigo']);
				$objetoUsuario->setPassword($fila['password']);
				$objetoUsuario->setNombres($fila['nombres']);
				$objetoUsuario->setApellidos($fila['apellidos']);
				$objetoUsuario->setTelefono($fila['telefono']);
				$objetoUsuario->setTipo($fila['tipo']);
				$objetoUsuario->setEstado($fila['estado']);
			}
			else
			{
                $objetoUsuario->setCodigo(null);
				$objetoUsuario->setPassword(null);
				$objetoUsuario->setNombres(null);
				$objetoUsuario->setApellidos(null);
				$objetoUsuario->setTelefono(null);
				$objetoUsuario->setTipo(null);
				$objetoUsuario->setEstado(null);
			}
            Conexion::cerrar();
			return($objetoUsuario);
		}
	}
?>