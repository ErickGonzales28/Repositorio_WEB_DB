<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    /*class procesaReserva(){
        public function __construct(){

        }
        public function reservar($codlibro,$codusuario){

        }
    }*/
    include_once('../dao/LibroDAO.php');
	include_once('../clases/Libro.php');
    $codlibro = $_GET['codigo'];
    $usuario = $_SESSION['usuario'];
    $objetoLibro= new Libro();
	$objetoLibroDAO = new LibroDAO();
	$objetoLibro = $objetoLibroDAO->SelectLibro($codlibro);
    ?>
        <html>
            <head>
                <link rel="stylesheet" type="text/css" href="styleBotones.css">
                <link rel="stylesheet" type="text/css" href="styleConsultarLibros.css">
            </head>
            <div id="formBlock">
            <form id="form2" method="post" action="confirmarReserva.php">
                <table class="tablaDatos" align="center" border="0">
                    <thead>
                        <tr>
                            <th colspan="2" align="center">Datos de reserva</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Codigo de libro</td>
                        <td>
                            <input class="Buscar" type="text" 
                            name="codigo" 
                            id="codigo" 
                            value="<? echo $objetoLibro->getCodigoLib()?>" 
                            placeholder="<? echo $objetoLibro->getCodigoLib()?>" 
                            readonly="readonly">
                        </td>
                    </tr>
                    <tr>
                        <td>Título</td>
                        <td>
                            <input class="Buscar" type="text" 
                            name="titulo" 
                            id="titulo" 
                            value="<? echo $objetoLibro->getTitulo()?>" 
                            placeholder="<? echo $objetoLibro->getTitulo()?>" 
                            readonly="readonly">
                        </td>
                    </tr>
                    <tr>
                        <td>Autor</td>
                        <td>
                        <input class="Buscar" type="text" 
                            name="autor" 
                            id="autor" 
                            value="<? echo $objetoLibro->getAutor()?>" 
                            placeholder="<? echo $objetoLibro->getAutor()?>" 
                            readonly="readonly">
                        </td>
                    </tr>
                    <tr>
                        <td>Edición</td>
                        <td>
                        <input class="Buscar" type="text" 
                            name="edicion" 
                            id="edicion" 
                            value="<? echo $objetoLibro->getEdicion()?>" 
                            placeholder="<? echo $objetoLibro->getEdicion()?>" 
                            readonly="readonly">
                        </td>
                    </tr>
                    <tr>
                        <td>Año</td>
                        <td>
                        <input class="Buscar" type="number" 
                            name="anio" 
                            id="anio" 
                            value="<? echo $objetoLibro->getAnio()?>" 
                            placeholder="<? echo $objetoLibro->getAnio()?>" 
                            readonly="readonly">
                        </td>
                    </tr>
                    <tr>
                        <td align = "center">
                            <input class = "Alta" name = "confirmar" id="confirmar" type="submit" value="Confirmar">
                        </td>
                        <td>
                            <input class = "Alta" name = "regresar" id="regresar" type="button" onclick="$('#reserva-flotante').hide();" value="Regresar">
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="estado" id="estado" value="<? echo $objetoLibro->getEstado()?>">
            </form>
            </div>            
        </html>