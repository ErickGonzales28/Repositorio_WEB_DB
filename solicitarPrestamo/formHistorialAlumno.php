<?PHP
include_once("../shared/encabezado.php");
	include_once("../shared/piePagina.php");
  class formHistorialAlumno{
	 public function formHistorialAlumnoshow($libro,$alumno){
		 include_once("../dao/PrestamoDAO.php");
		  //$codigo_alumno=trim($_POST['codigoAlum']);
		  $objetoControlPrestamo = new PrestamoDAO();
	      $Historial = $objetoControlPrestamo -> BuscarHistorialPrestamo($alumno);
		   //echo "alumno: ".$alumno;
		  // echo "libro: ".$libro;
		   
?>
<?encabezado::getEncabezado();?>
			<html>
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Historial de prestamos></title>
            <link rel="stylesheet" type="text/css" href="styleHistorialAlumno.css">
            </head>
            <body>
        <header>
          <h1 align="center">HISTORIAL</h1>
        </header>
          <table align="CENTER" width="445" border="1">
          <tr>
              <th align="CENTER">CODIGO LIBRO</th>
              <th align="CENTER">Fecha INI</th>
              <th align="CENTER">Fecha Dev</th>
              <th align="CENTER">Fecha Devolucion Real</th>
          </tr>
        <?php
		  //echo "usuario: ".$usuario;
		     $cantidad = count($Historial);
			for($i = 0; $i < $cantidad; $i++){
				?>
                <tr>                     
                   <td><? echo $Historial[$i]['codLibro'] ?></td>
                   <td><? echo $Historial[$i]['fechaIni'] ?></td>
                   <td><? echo $Historial[$i]['fechaFin'] ?></td>
                   <td><? echo $Historial[$i]['fechaFinReal'] ?></td>
                 </tr>
               <?
			}
        ?>
          
          </table>
         <table align="center" border="0">
         <tr>

              <td colspan="4" align="center">
                <button id="btnSolicitud">SOLICITUD</button>
                <script>
					function onClickBoton(event) {
						if (event.target.id === 'btnSolicitud') {
							window.location.href = 'controlSolicitarPrestamo.php?alumno=<? echo $alumno;?>&libro=<? echo $libro;?>';
						}
					}
					document.getElementById('btnSolicitud').addEventListener('click', onClickBoton);
				</script>
              </td>
         </tr>
         </table>
       
        </body>
        </html>

<?
	}	
 }
?>
<?
piePagina::getPiePagina();
?>
