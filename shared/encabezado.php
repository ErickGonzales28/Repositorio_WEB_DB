<?
	class encabezado
	{
		private static $instancia = null;
		private function encabezado()
		{
			?>
            <html>
            <head>
            	<title>Sistema de informacion</title>
            </head>
            <body>
            	<table align="center" border="0" width="1400" style="background-color: white;">
                <tr>
                	<td align="left" width="1100"><img src="../images/logo.png" width="200" height="100"></a></center></td>
					<td align="right"><a href="../autenticarUsuario/controlAutenticarUsuario.php?encabezado=prueba"><img src="../images/volver.png" width="200" height="100"></a></center></td>
					<td align="right"><a href="../autenticarUsuario/indexPrueba.php"><img src="../images/cerrar.png" width="80" height="80"></a></center></td>
				
					
                </tr>
                </table>
            <?		
		}
		public static function getEncabezado()
		{
			if(self::$instancia == null)
					self::$instancia = new encabezado();
			return(self::$instancia);		
		}
	}

?>