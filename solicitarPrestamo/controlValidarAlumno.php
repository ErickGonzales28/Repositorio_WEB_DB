<?PHP
session_start();
function verficarCampo($codigo){
		if(strlen($codigo)>3)
			return(true);
		else
			return(false);
}

$boton = $_POST['btnCod'];
//$usuario_c = $_POST['usuario'];
if(isset($boton))
	{
		$codigo = trim($_POST['codigoAlum']);
		
		if(verficarCampo($codigo) == false)
		{
			echo "<CENTER>El codigo de alumno no existe o no esta registrado";
			echo "<CENTER><a href='../solicitarPrestamo/prueba.php'>Ir al inicio</a>";	
		}
		else
		{
			include_once("../dao/UsuarioDAO.php");
			$objetoControlValidar = new UsuarioDAO();
			$alumnoValidado = $objetoControlValidar -> SelectUsuario($codigo);
			if($alumnoValidado->getCodigo() == null){
				echo "Se ha detectado un codigo no valido","<a href='../solicitarPrestamo/prueba.php'>Ir al inicio</a>";	
			}else if($alumnoValidado->getEstado() == 0){
				echo "Se ha detectado un estado invalido";	
			}else if($alumnoValidado->getCodigo() == $codigo and $alumnoValidado->getTipo()=='C'){
				include_once("../solicitarPrestamo/formBuscarLibro.php");
				$objetoFormLibro = new formBuscarLibro();
				$objetoFormLibro -> formBuscarLibroShow($codigo);
				//echo $usuario_c;
			}else{
				echo "Busqueda no valida","<a href='../solicitarPrestamo/prueba.php'>Ir al inicio</a>";	
			}
		}
	}
	else
	{
		echo "Se ha detectado un ingreso no valido","<a href='../solicitarPrestamo/prueba.php'>Ir al inicio</a>";	
	}

?>