<?php
    header('Content-Type: text/html; charset=utf-8');
    class formConsultarLibroBibliotecario{
        public function __construct(){

        }
        public function formConsultarLibroBibliotecarioShow(){
            include_once("../shared/encabezado.php");
            encabezado:: getEncabezado();
            ?>
                <html>
                    <title>Consultar Libros</title>
                    <head>
                        <link rel="stylesheet" type="text/css" href="styleConsultarLibros.css">
                        <link rel="stylesheet" type="text/css" href="styleBotones.css">
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
                    </head>
                    <header>
                        <h1 align = "center">Consultar Libros</h1>
                    </header>
                    <form name="form1" method="post" action="<? echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                        <table align = "center" border = "0">
                            <tr>
                                <td>
                                    <input class="Buscar" type="text" name="libro" placeholder="Libro o autor...">
                                </td>
                                <td>
                                    <input class="BtnBuscar" name = "btnBuscar" type="submit" value="">
                                </td>
                            </tr>
                        </table>
                    </form>
                </html>
            <?
            $boton = $_POST['btnBuscar'];
            $texto = $_POST['libro'];
            if(isset($boton)){
                include_once('../dao/LibroDAO.php');
	            include_once('../clases/Libro.php');
                $objLibroDAO = new LibroDAO();
                $lista = $objLibroDAO->buscarLibro($texto);
                ?>
                <table class="tablaDatos" align="center" border="1">
                    <thead>
                    <tr>
                        <th align="center">Nro.</th>
                        <th align="center">Código</th>
                        <th align="center">Título</th>
                        <th align="center">Autor</th>
                        <th align="center">Disponible</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?
                    $cantidad = count($lista);
                    for($i = 0; $i < $cantidad; $i++)
                    {
                        ?>
                        <tr>
                        <td align="center"><? echo $i+1 ?></td>
                        <td><? echo $lista[$i]['codigoLib']?></td>                       
                        <td><? echo $lista[$i]['titulo'] ?></td>
                        <td><? echo $lista[$i]['autor'] ?></td>
                        <?
                            if($lista[$i]['disponibilidad'] == 0)
                                $disponible = "No";
                            else
                                $disponible = "Si";
                        ?>
                        <td align="center"><? echo $disponible ?></td>
                        </tr>
                        <?
                    }	
                    ?>
                    </tbody>
                </table>
                <?
        }

    }
    
    }
    
?>