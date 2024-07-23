<?php
    include_once('../shared/Conexion.php');
    include_once('../clases/Prestamo.php');
    class PrestamoDao{
        private $objetoPrestamo;
        public function PrestamoDAO(){
            Conexion::getInstancia();
			$this->objetoPrestamo = new Prestamo();	
        }
        public function insertPrestamo($codLibro, $codUsuario, $fechaRes, $fechaIni, $fechaFin, $fechaFinReal, $estado){
			Conexion::getInstancia();
            $sql = "INSERT INTO prestamo(codLibro,codUsuario,fechaRes,fechaIni,fechaFin,fechaFinReal,estado) VALUES('".$codLibro."','".$codUsuario."','".$fechaRes."','".$fechaIni."','".$fechaFin."','".$fechaFinReal."','".$estado."')";
            if (mysql_query($sql)) {
                echo "Registro insertado correctamente";
				echo "<br>";
            } else {
                echo "Error al registrar prestamo: " . mysql_error();
            }		
        }
        public function updatePrestamo($id, $codLibro, $codUsuario, $fechaRes, $fechaIni, $fechaFin, $fechaFinReal, $estado)
		{
			$sql = "UPDATE prestamo SET codLibro = '".$codLibro."', codUsuario = '".$codUsuario."', fechaRes = '".$fechaRes."'
            , fechaIni = '". $fechaIni."', fechaFin = '".$fechaFin."', fechaFinReal = '".$fechaFinReal."', estado = '".$estado."' WHERE id = '".$id."'";
            if (mysql_query($sql)) {
                echo "Prestamo actualizado correctamente";
            } else {
                echo "Error al actualizar prestamo: " . mysql_error();
      }		
		}
		public function deletePrestamo($obj)
		{
		
		}
		public function SelectPrestamo($id){
            $sql = "SELECT * FROM prestamo WHERE id = '$id'";
			$resultado = mysql_query($sql);
			$numeroFilasEncontradas = mysql_num_rows($resultado);	
			if($numeroFilasEncontradas == 1)
			{
				$fila = mysql_fetch_array($resultado,MYSQL_ASSOC);
				$this->objetoPrestamo->setId($fila['id']);
				$this->objetoPrestamo->setCodLibro($fila['codLibro']);
				$this->objetoPrestamo->setCodUsuario($fila['codUsuario']);
				$this->objetoPrestamo->setFechaRes($fila['fechaRes']);
				$this->objetoPrestamo->setFechaIni($fila['fechaIni']);
				$this->objetoPrestamo->setFechaFin($fila['fechaFin']);
				$this->objetoPrestamo->setFechaFinReal($fila['fechaFinReal']);
                $this->objetoPrestamo->setEstado($fila['estado']);
			}
			else
			{
				$this->objetoPrestamo->setId(null);
				$this->objetoPrestamo->setCodLibro(null);
				$this->objetoPrestamo->setCodUsuario(null);
				$this->objetoPrestamo->setFechaRes(null);
				$this->objetoPrestamo->setFechaIni(null);
				$this->objetoPrestamo->setFechaFin(null); 	
				$this->objetoPrestamo->setFechaFinReal(null);
                $this->objetoPrestamo->setEstado(null);
			}
			Conexion::getInstancia()->cerrar();
			return($this->objetoPrestamo);
        }
	    public function getIds(){
		$sql = "SELECT id FROM prestamo where estado='0'";
		$resultado = mysql_query($sql);
		$ids = array();
		while ($fila = mysql_fetch_assoc($resultado)) {
		    $ids[] = $fila['id'];
		}
		return $ids;
			 }
	       public function BuscarHistorialPrestamo($alumno){
			Conexion::getInstancia();
		    $sql = "SELECT * FROM prestamo	WHERE codUsuario = '$alumno'";			
				$resultado = mysql_query($sql);
				$numeroFilasEncontradas = mysql_num_rows($resultado);
				if($numeroFilasEncontradas == 0){
					$fila = 0;
					echo "No se encontro ningun prestamo";
				}				
				else{
					for($i = 0; $i < $numeroFilasEncontradas; $i++)	
						$fila[$i] = mysql_fetch_array($resultado);
				}
				Conexion::getInstancia()->cerrar();
				return($fila);
		}
		
		public function buscarPrestamoID($sentencia)
		{
			Conexion::getInstancia();
			$sql = "SELECT * FROM prestamo	WHERE id = '$sentencia'";			
			$resultado = mysql_query($sql);
			$numeroFilasEncontradas = mysql_num_rows($resultado);
			if($numeroFilasEncontradas == 0){
				$fila = 0;
				echo "No se encontro ningun prestamo";
			}				
			else{
				for($i = 0; $i < $numeroFilasEncontradas; $i++)	
					$fila[$i] = mysql_fetch_array($resultado);
			}
			Conexion::getInstancia()->cerrar();
			return($fila);
		}

		public function readAll(){
			Conexion::getInstancia();
			$sql = "SELECT * FROM prestamo";
			$resultado = mysql_query($sql);
			$numeroFilasEncontradas = mysql_num_rows($resultado);
			for($i = 0; $i < $numeroFilasEncontradas; $i++)	{
				$fila[$i] = mysql_fetch_array($resultado);
			}
			Conexion::getInstancia()->cerrar();
			return($fila);
		}

		public function buscarPrestamo($sentencia)
		{
			$sql = "SELECT * FROM prestamo	WHERE (id LIKE '%".$sentencia."%'
			OR codLibro LIKE '%".$sentencia."%'
			OR codUsuario LIKE '%".$sentencia."%')
			AND estado <> 0";			
			$resultado = mysql_query($sql);
			$numeroFilasEncontradas = mysql_num_rows($resultado);
			if($numeroFilasEncontradas == 0){
				$fila = 0;
				echo "No se encontro ningun prestamo";
			}				
			else{
				for($i = 0; $i < $numeroFilasEncontradas; $i++)	
					$fila[$i] = mysql_fetch_array($resultado);
			}
			Conexion::getInstancia()->cerrar();
			return($fila);
		}
    }
?>
