<?php
    header('Content-Type: text/html; charset=utf-8');
    class formConsultarLibroPrestado{
        public function __construct(){

        }
        public function formConsultarLibroPrestadoShow(){
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
                        <h1 align = "center">Consultar Préstamos</h1>
                    </header>
                        <form name="form1" method="post" action="<? echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                        <table align = "center" border = "0">
                            <tr>
                                <td>
                                    <input class="Buscar" type="text" name="entry" placeholder="ID operacion, codigo(libro/alumno)...">
                                </td>
                                <td>
                                    <input class="BtnBuscar" name = "btnBuscar" type="submit" value="">
                                </td>
                            </tr>
                            <tr height = "15"></tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input class="Alta" name = "btnBuscarPend" id="btnBuscarPend" type="submit" value="Pendientes">
                                </td>
                            </tr>
                        </table>
                    </form>                  
                </html>
            <?
            $btnBuscar = $_POST['btnBuscar'];
            $btnBuscarPend = $_POST['btnBuscarPend'];
            $texto = $_POST['entry'];
            if(isset($btnBuscar) or isset($btnBuscarPend)){
                include_once('../dao/PrestamoDAO.php');
	            include_once('../clases/Prestamo.php');
                $objPrestamoDAO = new PrestamoDAO();
                $lista = $objPrestamoDAO->buscarPrestamo($texto);
                ?>
                <table class="tablaDatos" align="center" border="1">
                    <thead>
                        <tr>
                            <th align="center">ID Operacion</th>
                            <th align="center">Codigo del libro</th>
                            <th align="center">Codigo del alumno</th>
                            <th align="center">Fecha de Prestamo</th>
                            <th align="center">Plazo maximo</th>
                            <th align="center">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?
                    $cantidad = count($lista);
                    if(isset($btnBuscar)){
                        for($i = 0; $i < $cantidad; $i++)
                        {
                            if($lista[$i]['estado']==1 OR $lista[$i]['estado']==2)
                            {
                                ?>
                                <tr>
                                <td><? echo $lista[$i]['id']?></td>                       
                                <td><? echo $lista[$i]['codLibro'] ?></td>
                                <td><? echo $lista[$i]['codUsuario'] ?></td>
                                <td><? echo $lista[$i]['fechaIni'] ?></td>
                                <td><? echo $lista[$i]['fechaFin'] ?></td>
                                <?
                                    if($lista[$i]['estado'] == 1)
                                        $estado = "Sin Devolver";
                                    elseif($lista[$i]['estado'] == 2)
                                        $estado = "Devuelto";
                                ?>
                                <td align="center"><? echo $estado ?></td>
                                </tr>
                                <?
                            }
                        }
                    }elseif(isset($btnBuscarPend)){
                        for($i = 0; $i < $cantidad; $i++)
                        {
                            if($lista[$i]['estado'] == 1){
                                ?>
                                <tr>
                                <td><? echo $lista[$i]['id']?></td>                       
                                <td><? echo $lista[$i]['codLibro'] ?></td>
                                <td><? echo $lista[$i]['codUsuario'] ?></td>
                                <td><? echo $lista[$i]['fechaIni'] ?></td>
                                <td><? echo $lista[$i]['fechaFin'] ?></td>
                                <td align="center">Sin devolver</td>
                                </tr>
                                <?
                            }                            
                        }
                    }
                    	
                    ?>
                    </tbody>
                </table>
                <?
            }

        }    
    }    
?>