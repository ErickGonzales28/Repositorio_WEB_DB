<?php
    header('Content-Type: text/html; charset=utf-8');
    class formConsultarLibroCliente{
        public function __construct(){

        }
        public function formConsultarLibroClienteShow(){
            include_once("../shared/encabezado.php");
            encabezado::getEncabezado();
            ?>            
                <html>
                    <title>Consultar Libros</title>
                    <head>
                        <link rel="stylesheet" type="text/css" href="styleConsultarLibros.css">
                        <link rel="stylesheet" type="text/css" href="styleBotones.css">
                        <link rel="stylesheet" type="text/css" href="styleFlotante.css">
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type = "text/javascript"></script>
                        <script>
                            function reservar(codigo){
                                event.preventDefault();
                                var doc = "procesaReserva.php?codigo="+codigo;
                                $.ajax({
                                    type: 'GET',
                                    url: doc,
                                    data: $('#form1').serialize(),
                                    success: function(respuesta) {
                                        $('#reserva-flotante').html(respuesta);
                                        $('#reserva-flotante').show();
                                    },
                                    error: function() {
                                        $('#reserva-flotante').show();
                                        $('#reserva-flotante').hide();
                                        alert('Ha ocurrido un error al enviar el formulario');
                                    }
                                    });
                        }
                        </script>
                    </head>
                    <header>
                        <h1 align = "center">Consultar Libros</h1>
                    </header>
                    <div id="reserva-flotante" style="display: none;">

                    </div>
                    <form name="form1" id="form1" method="post" action="procesaConsultaLibroCliente.php">
                        <table align = "center" border = "0">
                            <tr>
                                <td>
                                    <input class="Buscar" type="text" name="libro" placeholder="Buscar por libro o autor...">
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
                        <th align="center">Acción</th>
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
                                $disponible = "Sí";//agregrar alerta de que no se puede reservar un libro no disponible
                        ?>
                        <td align="center"><? echo $disponible ?></td>
                        <?
                            if($disponible == "No"){
                                ?>
                                <td></td>
                                </tr>
                                <?
                            }
                            else{
                                ?>
                                <td><button type="button" class="btn btn-success" onclick="reservar('<?echo $lista[$i]['codigoLib']?>')">Reservar</button></td>
                                </tr>
                                <?
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