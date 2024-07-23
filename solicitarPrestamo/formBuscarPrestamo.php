<?
  include_once("../shared/encabezado.php");
	  include_once("../shared/piePagina.php");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Buscar Prestamo</title>
    <!-- Incluir archivo CSS de jQuery UI -->
                <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                <link rel="stylesheet" type="text/css" href="styleBuscarPrestamo.css">
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
	<?encabezado::getEncabezado();?>
    <header>
        <h1 align="center">Buscar Prestamo</h1>
    </header>
    <? 
	  //$c_usuario=$_GET['usuario'];
	?>
    <form name="form_buscar_prestamo" method="post" action="<? echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <table align="center" width="320" border="0">
            <tr>
                <td align="center" width="160">Codigo del Prestamo:</td>
                <td align="center" width="150">
                <select name="id_prestamo" id="id_prestamo">
                    <?php
                        // Aquí generamos dinámicamente las opciones del combobox
                        include_once('../dao/PrestamoDAO.php');
                        include_once('../clases/Prestamo.php');
                        $objPrestamoDAO = new PrestamoDAO();
                        $ids = $objPrestamoDAO->getIds();
                        foreach ($ids as $id) {
							echo "<option value=\"$id\">$id</option>";
						}
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input name="btn_buscar" id="btn_buscar" type="submit" value="BUSCAR">
                </td>
            </tr>
        </table>
    </form>
    <?
	$btn_buscar = $_POST['btn_buscar'];
    $texto = $_POST['id_prestamo'];
	if(isset($btn_buscar)){	
	  include_once('../dao/PrestamoDAO.php');
	  include_once('../clases/Prestamo.php');
	  $objPrestamoDAO = new PrestamoDAO();
	  $lista = $objPrestamoDAO->buscarPrestamoID($texto);
	  
		?>
        <form name="form2" method="post" action="ProcesarPrestamoReservado.php" onSubmit="showSuccessMessage()">
         <table align="center" border="1">
         <tbody>
          <?php 
		   $cantidad = count($lista);
		   for($i = 0; $i < $cantidad; $i++){ 
		   ?>
            <tr>
              <td align="center" width="138">ID:</td>
              <td align="center" width="138">
              <input name="id_p" id="id_p" type="text" value="<?php echo $lista[$i]['id'];?>" readonly>  
              </td>
            </tr>
            <tr>
              <td align="center" width="138">CODIGO LIBRO:</td>
              <td align="center" width="138">
              <input name="codigoLibro" id="codigoLibro" type="text" value="<?php echo $lista[$i]['codLibro'];?>" readonly>  
              </td>
            </tr>
            <tr>
              <td align="center" width="138">ALUMNO:</td>
              <td align="center" width="138">
              <input name="codigoAlum" id="codigoAlum" type="text" value="<?php echo $lista[$i]['codUsuario'];?> " readonly>  
              </td>
            </tr>
            <tr>
              <td align="center" width="138">FECHA RES:</td>
              <td align="center" width="138">
              <input name="fecha_res" id="fecha_res" type="text" value="<?php echo $lista[$i]['fechaRes']?>" readonly>	  
              </td>
            </tr>
            <tr>
              <td align="center" width="138">FECHA INI:</td>
              <td align="center" width="138">
              <input name="fecha_ini" id="fecha_ini" type="text" value="<?php echo $lista[$i]['fechaIni']; ?>" readonly>
              </td>
            </tr>
            <tr>
              <td align="center" width="138">FECHA FIN:</td>
              <td align="center" width="138">
              <input name="fecha_fin" id="fecha_fin" type="text" value="<?php echo $lista[$i]['fechaFin']; ?>" readonly>
              </td>
            </tr>
            <tr>
              <td align="center" width="138">FECHA ENTREGA:</td>
              <td align="center" width="138">
              <input name="fecha_entrega" id="fecha_entrega" type="text" value="<?php echo $lista[$i]['fechaFinReal']; ?>" readonly>		  
              </td>
            </tr>
            
          <?php 
		  }
		  ?>
          </tbody>
        </table>
        
       <?php 
		  }
		  ?>
        <table align="center" border="0">
          <tr>
              <td colspan="2" align="center">
                 <input name="BtnGuardar" id="BtnGuardar" type="submit" value="REALIZAR PRESTAMO">
              </td>
            </tr>
        </table>
        </form>
         <?  
		 
    ?>
</body>
</html>
<?
 piePagina::getPiePagina();
?>
