<?
  include_once("../shared/encabezado.php");
	include_once("../shared/piePagina.php");
	class formMenu
	{
		public function formMenuShow($usuario, $contrasena)
		{
      
			?>
      <html>
        <head>
        <meta charset = "UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta rel = "viewport" content = "width=device-width, initial-scale = 1.0">
        <link rel="stylesheet" href = "style.css"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

        <!-- ESTILOS DE LOS BOTONES -->
        <link rel = "stylesheet" href = "botones.css">
        <title>Menu de Bienvenida</title>
        </head>

        <body>
          <div class = "contenedor">
          <?encabezado::getEncabezado();?>
          <p>&nbsp;</p>
            <h1>Menu de Bienvenida</h1>

              <div class = "contenedor-botones">
                <a href = "../devolverLibro/procesaUser.php">
                  <button class="boton cinco">
                    <div class="icono">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                      </svg>
                    </div>
                    <span>DEVOLVER LIBRO</span>
                  </button>
                </a>
                <a href = "../consultarLibros/procesaUsuario.php">
                  <button class="boton cinco">
                    <div class="icono">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                      </svg>
                    </div>
                    <span>CONSULTAR LIBRO</span>
                  </button>
                </a>
                <a href = "../gestionarLibros/controlGestionarLibros.php">
                  <button class="boton cinco">
                    <div class="icono">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                      </svg>
                    </div>
                    <span>GESTIONAR LIBRO</span>
                  </button>
                </a>
                <a></a>

                <a href = "../solicitarPrestamo/prueba.php">
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
