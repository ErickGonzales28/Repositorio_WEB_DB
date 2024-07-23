<?php
class formGestionarLibros{

    public function __construct(){
    }

    public function showForm($libros){
        include_once("../shared/encabezado.php");
        encabezado::getEncabezado();
        ?>
        <html>
        <head>
            <link rel="stylesheet" type="text/css" href="styleFormGestionarLibros.css">
            <link rel="stylesheet" type="text/css" href="styleTablaLibros.css">
            <link rel="stylesheet" type="text/css" href="styleBotonGestionar.css">
            <link rel="stylesheet" type="text/css" href="styleBuscarLibro.css">
            <link rel="stylesheet" type="text/css" href="styleFormCRUD.css">
            <link rel="stylesheet" type="text/css" href="../fuente/tipografia.css">
            <title>GestionarLibros</title>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script type = "text/javascript">
                $(document).ready(function() {
                $('#capa-flotante').hide();
                });
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type = "text/javascript"></script>
            <script type = "text/javascript">

                function ejecutarFuncion(event) {
                    if (event.keyCode === 13) {
                        buscarLibro();
                    }
                }
                function enviarForm(doc) {
                    event.preventDefault(); 
                    $.ajax({
                    type: 'POST',
                    url: doc,
                    data: $('#formulario').serialize(),
                    success: function(respuesta) {
                        $('#capa-flotante').html(respuesta);
                        $('#capa-flotante').show();
                    },
                    error: function() {
                        $('#capa-flotante').show();
                        $('#capa-flotante').hide();
                        alert('Ha ocurrido un error al enviar el formulario');
                    }
                    });
                }
                function actualizarTabla(){
                    $.ajax({
                    type: 'GET',
                    url: "controlGestionarLibros.php",
                    data: $('#formulario').serialize(),
                    success: function(respuesta) {
                        $('#tablaLibros').html(respuesta);
                    },
                    error: function() {
                        $('#tablaLibros').hide();
                        alert('Ha ocurrido un error al enviar el formulario');
                    }
                    });
                }
                function buscarLibro(){
                    actualizarTabla();
                }
                function agregarRegistro() {
                    enviarForm("controlAgregarLibro.php");
                }
                function eliminarRegistro(registro) {
                    var dato1 = document.getElementById("Dato1");
                    dato1.value = registro;
                    $.ajax({
                    type: 'POST',
                    url: 'controlEliminarLibro.php',
                    data: $('#formulario').serialize(),
                    success: function(respuesta) {
                        $('#capa-flotante').html(respuesta);
                    },
                    error: function() {
                        alert('Ha ocurrido un error al enviar el formulario');
                    }
                    });
                }
                function modificarRegistro(dat1, dat2, dat3, dat4, dat5, dat6, dat7){
                    var dato1 = document.getElementById("Dato1");
                    dato1.value = dat1;
                    var dato2 = document.getElementById("Dato2");
                    dato2.value = dat2;
                    var dato3 = document.getElementById("Dato3");
                    dato3.value = dat3;
                    var dato4 = document.getElementById("Dato4");
                    dato4.value = dat4;
                    var dato5 = document.getElementById("Dato5");
                    dato5.value = dat5;
                    var dato6 = document.getElementById("Dato6");
                    dato6.value = dat6;
                    var dato7 = document.getElementById("Dato7");
                    dato7.value = dat7;
                    enviarForm("controlModificarLibro.php");
                }
            </script>
            

        </head>
        <body>
        <header>
        <h1 align = "center">Gestionar Libros</h1>
        </header>
        <button type="button" onclick="agregarRegistro()" value = "Nuevo" class = "agregarBtn"> NUEVO</button>

        <div id="capa-flotante" style="display: none;">
        
        </div>
        <p id="mensajeCorrecto" style="margin: 5px; font-size: 12px"><br></p>
        <!--<input type="button" onclick="buscarLibro()" value = "BuscarBtn">-->
        <form id="formulario" method="post" action="" onsubmit="return false;">
            <div class="search-container">
                <input placeholder="Buscar por titulo o codigo..." type="text" id="Buscar" name = "Buscar" value = "" onkeypress="ejecutarFuncion(event)">
            </div>
            <input type="hidden" id="Dato1" name = "Dato1">
            <input type="hidden" id="Dato2" name = "Dato2">
            <input type="hidden" id="Dato3" name = "Dato3">
            <input type="hidden" id="Dato4" name = "Dato4">
            <input type="hidden" id="Dato5" name = "Dato5">
            <input type="hidden" id="Dato6" name = "Dato6">
            <input type="hidden" id="Dato7" name = "Dato7">
        </form>
        <div id = "tablaLibros">
        <?
        $this->obtenerLibros($libros);
        ?>
        </div>
        <?
        
    }

    public function obtenerLibros($libros){
        if ($libros !=null){
            ?>
            <table align = "center" class = "tablaDatos" id = "tablaDatos">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>TITULO</th>
                        <th>AUTOR</th>
                        <th>ESTADO</th>
                        <th>EDICION</th>
                        <th>A&Ntilde;O</th>
                        <th>DISPONIBILIDAD</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
            <?
            
                foreach($libros as $libro){
                    echo "<tr>";
                    echo "<td>".$libro["codigoLib"]."</td>";
                    echo "<td>".$libro["titulo"]."</td>";
                    echo "<td>".$libro["autor"]."</td>";
                    if((int)$libro["estado"] == 1){
                        echo "<td><button class='Alta' type='button' disabled>Alta</button></td>";
                    }else{
                        echo "<td><button class='Baja' type='button' disabled>Baja</button></td>";
                    }
                    echo "<td>".$libro["edicion"]."</td>";
                    echo "<td>".$libro["anio"]."</td>";
                    #echo "<td>".$libro["disponibilidad"]."</td>";
                    if((int)$libro["disponibilidad"] == 1){
                        echo "<td><button class='Alta' type='button' disabled>Libre</button></td>";
                    }else{
                        echo "<td><button class='Baja' type='button' disabled>Ocupado</button></td>";
                    }
                    if((int)$libro["estado"] == 1){
                        echo "<td><button type='button' onclick='eliminarRegistro(\"".$libro[0]."\")' class = 'eliminarBtn'></button>";
                    }else{
                        echo "<td><button type='button' onclick='eliminarRegistro(\"".$libro[0]."\")' class = 'eliminarBtn0'></button>";
                    }
                    echo "<button type='button' class = 'modificarBtn' onclick='modificarRegistro(\"".$libro[0]."\",\"".$libro[1]."\",\"".$libro[2]."\",\"".$libro[3]."\",\"".$libro[4]."\",\"".$libro[5]."\",\"".$libro[6]."\")'></button></td></tr>";
                }
            echo "</table>";
        }
    }
    
    
}



?>