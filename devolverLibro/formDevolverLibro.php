<?php
    class formDevolverLibro{
        public function __construct(){

        }
        public function formDevolverLibroShow(){
            include_once("../shared/encabezado.php");
            encabezado:: getEncabezado();
            
            ?>
                <html>
                    <head>
                    <link rel="stylesheet" type="text/css" href="../autenticarUsuario/botonesSmall.css">
                    <link rel="stylesheet" type="text/css" href="style.css">
                    <link rel="stylesheet" type="text/css" href="../consultarLibros/styleConsultarLibros.css">
                    </head>

                <form class="tablaDatos" name="formDevolverLibro" method="post" action="<? echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                    <table  align="center" border="0">
                        <tr>
                            <td> ID de la Operacion: </td>
                            <td><input name="idOp" id="idOp" type="text" /></td>            
                        </tr>                       
                        <tr>
                            <td colspan="2" align="center">
                            <input class="Alta" name="botonBuscar" id="botonBuscar" type="submit" value="VALIDAR" />
                            </td>
                        </tr>
                    </table>
                </form>
                </html>
            <?
            
            $boton = $_POST['botonBuscar'];
            $idOp = $_POST['idOp'];
            if(isset($boton)){
                include_once('../dao/PrestamoDAO.php');
	            include_once('../clases/Prestamo.php');
                include_once('../dao/LibroDAO.php');
	            include_once('../clases/Libro.php');

                $objPrestamoDAO = new PrestamoDAO();
                $prestamo = $objPrestamoDAO->SelectPrestamo($idOp);
                $objLibroDAO = new LibroDAO();
                $codigoLib= $prestamo->getCodLibro();
                $libro = $objLibroDAO->SelectLibro($codigoLib);
                
                if($prestamo->getId() == null){
                    ?>
                    <script> alert("NUMERO DE OPERACION NO ENCONTRADO") </script>
                    <?
                } else{

                $tituloLib = $libro->getTitulo();
                $autorLib = $libro->getAutor();
                $codUsuario = $prestamo->getCodUsuario();
                $fecIni = $prestamo->getFechaIni();
                $fecFin = $prestamo->getFechaFin();
                $est = $prestamo->getEstado();
                if($est == 0)
                    $estado = "Libro reservado";
                else if($est == 1) $estado = "Libro sin devolver";
                else if($est == 2) $estado = "Prestamo Finalizado";

                
                ?>
                <html>
                <head>
                    <link rel="stylesheet" type="text/css" href="../autenticarUsuario/botonesSmall.css">
                    <link rel="stylesheet" type="text/css" href="style.css">
                    <link rel="stylesheet" type="text/css" href="../consultarLibros/styleConsultarLibros.css">
                </head>
                <form class ="tablaDatos" name="formConfirmarDevolucion" method="post" action="controlDevolverLibro.php">
                    <table  align="center" border="0">
                        <tr>
                            <td> ID de la operacion: </td>
                            <td> <input type="text" name="idOp" id="idOp" value="<? echo $idOp?>" placeholder="<? echo $idOp?>" readonly="readonly" > </td>            
                        </tr> 
                        <tr>
                            <td> Titulo del libro: </td>
                            <td> <input type="text" name="tituloLib" id="tituloLib" value="<? echo $tituloLib?>" placeholder="<? echo $tituloLib?>" readonly="readonly" > </td>            
                        </tr>    
                        <tr>
                            <td> Autor del libro: </td>
                            <td> <input type="text" name="autorLibro" id="autorLibro" value="<? echo $autorLib?>" placeholder="<? echo $autorLib?>" readonly="readonly" > </td>            
                        </tr>
                        <tr>
                            <td> Codigo del usuario: </td>
                            <td> <input type="text" name="codUsuario" id="codUsuario" value="<? echo $codUsuario?>" placeholder="<? echo $codUsuario?>" readonly="readonly" > </td>            
                        </tr>
                        <tr>
                            <td> Fecha de Inicio de Prestamo: </td>
                            <td> <input type="text" name="fecIni" id="fecIni" value="<? echo $fecIni?>" placeholder="<? echo $fecIni?>" readonly="readonly" > </td>            
                        </tr>
                        <tr>
                            <td> Fecha de Fin de Prestamo: </td>
                            <td> <input type="text" name="fecFin" id="fecFin" value="<? echo $fecFin?>" placeholder="<? echo $fecFin?>" readonly="readonly" > </td>            
                        </tr>
                        <tr>
                            <td> Estado de la Operacion: </td>
                            <td> <input type="text" name="estado" id="estado" value="<? echo $estado?>" placeholder="<? echo $estado?>" readonly="readonly" > </td>            
                        </tr>

                        <tr>
                            <td colspan="2" align="center">
                            <input class="Alta" name="botonDevolver" id="botonDevolver" type="submit" value="CONFIRMAR DEVOLUCION" />
                            </td>
                        </tr>
                    </table>
                </form>
                </html>


            <?
                }
     
            }

        }
    
    }
    
?>