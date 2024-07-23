<?PHP
function verficarCampo($codigo){
		if(strlen($codigo)>3)
			return(true);
		else
			return(false);
}
$boton = $_POST['btnid_Libro'];
if(isset($boton))
	{
		$cod_l = trim($_POST['id_Libro']);
		$cod_a =  trim($_POST['cod_alumno']);
		if(verficarCampo($cod_l) == false)
		{
			echo "<CENTER>Nose a ingresado el codigo del libro";
			echo "<CENTER><a href='../solicitarPrestamo/prueba.php'>Ir al inicio</a>";	
		}
		else
		{
			include_once("../dao/LibroDAO.php");
			$objetoControlLibro = new LibroDAO();
			$libroValidado = $objetoControlLibro -> SelectLibroDisponible($cod_l);
			if($libroValidado->getCodigoLib() == null){
				echo "<CENTER>El libro se encuentra reservado";
				echo "<CENTER><a href='../solicitarPrestamo/prueba.php'>REGRESAR Y VOLVER</a>";	
			}else if($libroValidado->getCodigoLib() == $cod_l){
				include_once("../solicitarPrestamo/formHistorialAlumno.php");
				$objetoFormLibro = new formHistorialAlumno();
				$objetoFormLibro -> formHistorialAlumnoShow($cod_l,$cod_a);
				
				//echo $cod_a."2";
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