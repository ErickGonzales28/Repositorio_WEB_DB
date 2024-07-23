<?PHP
include_once("../shared/encabezado.php");
	include_once("../shared/piePagina.php");
//session_start();

  class formVerificarAlumno{
	 public function showForm(){
		 //echo "usuario: ".$usuario;
?>
			<html>
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>FormularioVerificar</title>
            <link rel="stylesheet" type="text/css" href="styleVerificarAlumno.css">
            </head>
            <body>
		    <?encabezado::getEncabezado();?>
        <header>
          <h1 align="center">PANEL DE VERIFICACION</h1>
        </header>
        <form name="form1" method="post" action="controlValidarAlumno.php">
          <table align="CENTER" width="312" border="0">
          <tr>
            <td width="138">CODIGO ALUMNO:</td>
            <td width="164">
            <input name="codigoAlum" id="codigoAlum" type="text" >
            </td>
          </tr>
          <tr>
            <td colspan="2" align="CENTER">
              <input name="btnCod" id="btnCod" type="submit" value="ENVIAR">
            </td>
            </tr>
          
          </table>
          </form>
        </body>
        </html>

<?
		 piePagina::getPiePagina();
	}	
 }
?>
