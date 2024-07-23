<?php
    class formOpcionesConsulta{
        public function __construct(){

        }
        public function formOpcionesConsultaShow(){
            include_once("../shared/encabezado.php");
            ?>
                <html>
                    <head>
                        <meta charset = "UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta rel = "viewport" content = "width=device-width, initial-scale = 1.0">
                        <link rel="stylesheet" href = "styleEspecial.css"> 
                        <link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
                        <link rel = "stylesheet" href = "styleBotonesGrandes.css">
                        <title>Opciones de Consulta</title>
                    </head>
                <body>
                    <div class = "contenedor">
                        <?encabezado:: getEncabezado();?>
                        <h1>Consultas</h1>
                        <div class = "contenedor-botones">
                            <a href = "procesaConsultaPrestados.php">
                            <button class="boton cinco">
                                <div class="icono">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                                </svg>
                                </div>
                                <span>CONSULTAR LIBROS PRESTADOS</span>
                            </button>
                            </a>
                            <a href = "procesaConsultaDisponibles.php">
                            <button class="boton cinco">
                                <div class="icono">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                                </svg>
                                </div>
                                <span>CONSULTAR LIBROS DISPONIBLES</span>
                            </button>
                            </a>
                        </div>
                    </div>
                </body>
                    <!--<form name="form" method="post" action="procesaConsultaPrestados.php">
                        <table width="200" border="0" align="center">
                            <tr>
                                <td align="center"><input type="submit" name="boton" id="boton" value="Consultar Libros Prestados"></td>
                            </tr>
                        </table>
                    </form>
                    <form name="form" method="post" action="procesaConsultaDisponibles.php">
                        <table width="200" border="0" align="center">
                            <tr>
                                <td align="center"><input type="submit" name="boton" id="boton" value="Consultar Libros Disponibles"></td>
                            </tr>
                        </table>
                    </form>-->
                <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
                <button class="btn btn-success">¿Soy un botón o un enlace?</button>
                <a href="#" class="btn btn-success">Consultar Libros Prestados</a>
                <a href="#" class="btn btn-success">Consultar Libros Disponibles</a>-->
                </html>
            <?
        }
    }
    
?>