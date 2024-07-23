<?php
include_once("../shared/encabezado.php");
	include_once("../shared/piePagina.php");
	//formBuscarLibro
	class formBuscarLibro{
		public function formBuscarLibroShow($codigo){
			?>
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>BusquedaLibro</title>
            <link rel="stylesheet" type="text/css" href="styleBuscarLibro.css">
            </head>
            <body>
		    <?encabezado::getEncabezado();?>
            <h1 align="center">Busqueda de Libro</h1>
            <form name="form1" method="post" action="controlValidarLibro.php">
  
            <table align="center" border="0">
           		<tr>
                <td width="158">Digite el Libro a solicitar:</td>
                <td width="194">
                <input name="id_Libro" id="id_Libro" type="text">
                </td>
              </tr>
              <tr>
                <td colspan="2" align="CENTER">
                  <input name="btnid_Libro" id="btnid_Libro" type="submit" value="BUSCAR">
                </td>
                </tr>
            </table>   
            <input type="hidden" value="<? echo $codigo; ?>" id="cod_alumno" name="cod_alumno">

            </form> 
            
                 
            </body>
            </html>      
            <?	
			piePagina::getPiePagina();
		}	
	}
?>
