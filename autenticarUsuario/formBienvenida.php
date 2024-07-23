<?php
  include_once("../shared/encabezado.php");
	include_once("../shared/piePagina.php");
	//formAutenticarUsuario
	class formBienvenidaSistema
	{
		public function formBienvenidaSistemaShow($usuario)
		{
      encabezado::getEncabezado();
			?>
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Bienvenido: <? echo $usuario; ?></title>
            </head>
            <link rel="stylesheet" type="text/css" href="botonesSmall.css">
            <body>
            <form name="consultar" method="post" action="../consultarLibros/procesaUsuario.php">
              <table width="200" border="0" align="center">
                <tr>
                  <td align="center"><input class="Alta" type="submit" name="boton" id="boton" value="CONSULTAR LIBRO"></td>
                </tr>
              </table>
            </form>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            
            <table align="center" border="0">
           
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>            
            </body>
            </html>
            
            <?	
      piePagina::getPiePagina();
		}	
	}

?>