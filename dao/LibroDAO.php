<?
	include_once('../shared/Conexion.php');
	include_once('../clases/Libro.php');
	class LibroDAO
	{
		private $objetoLibro;
		public function LibroDAO()
		{

		}	

		public function insertLibro($codigoLib, $titulo, $autor, $estado, $edicion, $anio, $disponibilidad)
		{
			Conexion::getInstancia();
			$sql = "INSERT INTO libro VALUES('".$codigoLib."','".$titulo."','".$autor."','".$estado."','".$edicion."','".$anio."','".$disponibilidad."')";
			if (mysql_query($sql)) {
				echo "Libro insertado correctamente";
			} else {
				echo "Error al registrar libro: " . mysql_error();
			}
			Conexion::getInstancia()->cerrar();
		}

		public function updateLibro($codigoLib, $titulo, $autor, $estado, $edicion, $anio, $disponibilidad)
		{
			Conexion::getInstancia();
			$sql = "UPDATE libro SET titulo = '".$titulo."', autor = '".$autor."', estado = ".$estado.", edicion = ".$edicion."
			, anio = ".$anio.", disponibilidad = ".$disponibilidad." WHERE codigoLib = '".$codigoLib."'";
			if (mysql_query($sql)) {
				echo "Libro actualizado correctamente";
			} else {
				echo "Error al actualizar libro: " . mysql_error();
			}
			Conexion::getInstancia()->cerrar();
		}
		
		public function updateLibroPrestado($codigoLib,$disponibilidad)
		{
			Conexion::getInstancia();
			$sql = "UPDATE libro SET estado = ".$disponibilidad." WHERE codigoLib = '".$codigoLib."'";
			if (mysql_query($sql)) {
				echo "Libro actualizado correctamente";
			} else {
				echo "Error al actualizar libro: " . mysql_error();
			}
			Conexion::getInstancia()->cerrar();
		}

		public function deleteLibro($obj)
		{
		
		}
		public function readAll(){
			Conexion::getInstancia();
			$sql = "SELECT * FROM libro";
			$resultado = mysql_query($sql);
			$registro = array();
			for($i=0; $fila = mysql_fetch_array($resultado); $i++ ){
				$registro[$i] = $fila;
			}
			Conexion::getInstancia()->cerrar();
			return($registro);
		}

		public function SelectLibro($codigoLib)
		{
			Conexion::getInstancia();
			$sql = "SELECT * FROM libro WHERE codigoLib = '$codigoLib'";
			$objetoLibro = new Libro();	
			$resultado = mysql_query($sql);
			$numeroFilasEncontradas = mysql_num_rows($resultado);	
			if($numeroFilasEncontradas == 1)
			{
				$fila = mysql_fetch_array($resultado,MYSQL_ASSOC);
				$objetoLibro->setCodigoLib($fila['codigoLib']);
				$objetoLibro->setTitulo($fila['titulo']);
				$objetoLibro->setAutor($fila['autor']);
				$objetoLibro->setEstado($fila['estado']);
				$objetoLibro->setEdicion($fila['edicion']);
				$objetoLibro->setAnio($fila['anio']);
				$objetoLibro->setDisponibilidad($fila['disponibilidad']);
			}
			else
			{
				$objetoLibro->setCodigoLib(null);
				$objetoLibro->setTitulo(null);
				$objetoLibro->setAutor(null);
				$objetoLibro->setEstado(null);
				$objetoLibro->setEdicion(null);
				$objetoLibro->setAnio(null); 	
				$objetoLibro->setDisponibilidad(null);
			}
			Conexion::getInstancia()->cerrar();
			return($objetoLibro);
		}
		
		public function SelectLibroDisponible($codigoLib)
		{
			Conexion::getInstancia();
			$sql = "SELECT * FROM libro WHERE codigoLib = '$codigoLib' AND disponibilidad='1' AND estado=1";
			$objetoLibro = new Libro();	
			$resultado = mysql_query($sql);
			$numeroFilasEncontradas = mysql_num_rows($resultado);	
			if($numeroFilasEncontradas == 1)
			{
				$fila = mysql_fetch_array($resultado,MYSQL_ASSOC);
				$objetoLibro->setCodigoLib($fila['codigoLib']);
				$objetoLibro->setTitulo($fila['titulo']);
				$objetoLibro->setAutor($fila['autor']);
				$objetoLibro->setEstado($fila['estado']);
				$objetoLibro->setEdicion($fila['edicion']);
				$objetoLibro->setAnio($fila['anio']);
				$objetoLibro->setDisponibilidad($fila['disponibilidad']);
			}
			else
			{
				$objetoLibro->setCodigoLib(null);
				$objetoLibro->setTitulo(null);
				$objetoLibro->setAutor(null);
				$objetoLibro->setEstado(null);
				$objetoLibro->setEdicion(null);
				$objetoLibro->setAnio(null); 	
				$objetoLibro->setDisponibilidad(null);
			}
			Conexion::getInstancia()->cerrar();
			return($objetoLibro);
		}

		public function buscarLibro($codigoLib)
		{
			Conexion::getInstancia();
			$registro = array();
			$sql = "SELECT * FROM libro	WHERE (codigoLib LIKE '%".$codigoLib."%'
			OR titulo LIKE '%".$codigoLib."%'
			OR autor LIKE '%".$codigoLib."%')
			AND estado = 1";			
			$resultado = mysql_query($sql);
			$numeroFilasEncontradas = mysql_num_rows($resultado);
			if($numeroFilasEncontradas == 0){
				$fila = 0;
				echo "No se encontro ningun libro";
			}				
			else{
				for($i=0; $fila = mysql_fetch_array($resultado); $i++ ){
					$registro[$i] = $fila;
				}
			}
			Conexion::getInstancia()->cerrar();
			return($registro);		
		}
	}
?>
