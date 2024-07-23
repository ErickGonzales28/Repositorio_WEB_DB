<?php
	//formAutenticarUsuario
	class formMensajeSistema
	{
		public function formMensajeSistemaShow($mensaje,$enlace)
		{
			?>
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Mensaje del sistema</title>
            </head>
            
            <body>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            
          
            <table width="381" border="0" align="center">
              <tr>
                <td colspan="2" align="center"><strong>Mensaje del sistema</strong></td>
              </tr>
              <tr>
                <td width="119" rowspan="2" align="center" valign="middle"></td>
                <td width="246" height="100"><table width="200" border="0" align="center">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center"><?php echo ucwords(strtolower($mensaje)); ?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="35" align="center"><?php echo $enlace; ?></td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>            
            </body>
            </html>
            
            <?	
		}	
	}

?>