<?php
include_once("../shared/encabezado.php");
include_once("../shared/piePagina.php");
    class formMenuConsulta{
        public function __construct(){

        }
        public function formMenuConsultaShow(){
            ?>
                <html>
                    <head>
                        <meta charset = "UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta rel = "viewport" content = "width=device-width, initial-scale = 1.0">
                        <title>Opciones de Consulta</title>
                        <link rel="stylesheet" href = "style.css"> 
                        <link rel="stylesheet" href = "botones.css"> 
                    </head>
                <body>
                   <div class = "contenedor">
			   <?encabezado::getEncabezado();?>
                        <h1 align="center">Consultas</h1>
                        <div class = "contenedor-botones">
                			<a href = "../solicitarPrestamo/formBuscarPrestamo.php">
                                <button class="boton cinco">
                                  <div class="icono">
								  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                                  </svg>
                                 </div>
                                <span>BUSCAR RESERVA</span>
                               </button>
                           </a>
                           <a href = "../solicitarPrestamo/llamarFormAlumno.php">
                                <button class="boton cinco">
                                  <div class="icono">
								  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                                  </svg>
                                 </div>
                                 <span>REALIZAR PRESTAMO</span>
                              </button>
                              </a>
  						   </div>
                        </div>
                      </body>
                </html>
            <?
		piePagina::getPiePagina();
        }
    }
    
?>
