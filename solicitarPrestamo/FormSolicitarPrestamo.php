<?php
include_once("../shared/encabezado.php");
	include_once("../shared/piePagina.php");
    class FormSolicitarPrestamo{
        public function FormSolicitarPrestamoShow($c_alumno,$c_libro){		
		 		  
?>
            <html>
            <head>
		    <?encabezado::getEncabezado();?>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>Solicitud de Prestamo</title>
                <link rel="stylesheet" type="text/css" href="styleSolicitarPrestamo.css">
                <!-- Incluir archivo CSS de jQuery UI -->
                <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                <link rel="stylesheet" type="text/css" href="btnSolicitarprestamo.css">
                <!-- Incluir archivo de jQuery -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <!-- Incluir archivo JS de jQuery UI -->
                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                <!-- Script para activar el calendario -->
                <script>
                    $( function() {
                        $( "#fecha_entrega" ).datepicker({dateFormat: 'yy-mm-dd'});
                    } );
                </script>
                <script>
                    $( function() {
                        $( "#fecha_res" ).datepicker({dateFormat: 'yy-mm-dd'});
                    } );
                </script>
                <script>
                    $( function() {
                        $( "#fecha_ini" ).datepicker({dateFormat: 'yy-mm-dd'});
                    } );
                </script>
                <script>
                    $( function() {
                        $( "#fecha_fin" ).datepicker({dateFormat: 'yy-mm-dd'});
                    } );
                </script>
                <script>
					function showSuccessMessage() {
						alert("Prestamo realizado correctamente");
					}
				</script>
            </head>
            <body>
                <header>
                    <h1 align="center">Solicitud de Prestamo</h1>
                </header>
                <form name="form1" method="post" action="procesarPrestamo.php" onSubmit="showSuccessMessage()">
                    <table align="CENTER" width="320" border="0">
                        <tr>
                            <td width="138">CODIGO LIBRO:</td>
                            <td width="164">
                                <input name="codigoLibro" id="codigoLibro" type="text" value="<?php echo $c_libro?>">
                            </td>
                        </tr>
                        <tr>
                            <td width="138">ALUMNO:</td>
                            <td width="164">
                                <input name="codigoAlum" id="codigoAlum" type="text" value="<?php echo $c_alumno?>">
                            </td>
                        </tr>
                        <tr>
                            <td width="138">FECHA INI:</td>
                            <td width="164">
                                <input name="fecha_ini" id="fecha_ini" type="text" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="138">FECHA FIN:</td>
                            <td width="164">
                                <input name="fecha_fin" id="fecha_fin" type="text" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width="138">FECHA ENTREGA:</td>
                            <td width="164">
                                <input name="fecha_entrega" id="fecha_entrega" type="text" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input name="btnGuardar" id="btnGuardar" type="submit" value="ENVIAR">
                            </td>
                        </tr>
                        
                    </table>

                </form>
            </body>
            </html>
<?php
					  piePagina::getPiePagina();
        }   
    }
?>

