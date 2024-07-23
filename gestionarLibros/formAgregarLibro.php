<?php
class formAgregarLibro{
    public function __construct(){

    }

    public function showForm(){
    ?>
        <div id="formBlock">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Al hacer clic en la "X", oculta la capa flotante
                    $('#cerrar').click(function() {
                        $('#capa-flotante').hide();
                    });
                });
                function agregarRegistroBD(doc) {
                    $.ajax({
                    type: 'POST',
                    url: "controlCRUDLibro.php",
                    data: $('#formAgregar').serialize(),
                    success: function(respuesta) {
                        // Ocultar la capa flotante
                        //$('#capa-flotante').hide();
                        if(respuesta == "Libro insertado correctamente"){
                            $('#mensajeCorrecto').html(respuesta);
                            $('#mensajeCorrecto').show();
                            $('#capa-flotante').hide();
                            setTimeout(function() {
                                $('#mensajeCorrecto').html("<br>");
                                //$('#mensajeCorrecto').hide();
                            }, 3000);
                            actualizarTabla();
                        }else{
                            $('#mensajeError').html("Error en el registro");
                            $('#mensajeError').show();
                            setTimeout(function() {
                                $('#mensajeError').html("<br>");
                                //$('#mensajeError').hide();
                            }, 3000);
                        }
                        // Mostrar la respuesta del servidor en la capa flotante
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Ocultar la capa flotante en caso de error
                        $('#capa-flotante').hide();

                        // Mostrar un mensaje de error
                        alert('Ha ocurrido un error al enviar el jjformulario' + jqXHR+ textStatus+errorThrown);
                    }
                    });
                }
            </script>
            <span id="cerrar">&times;</span>
            <br>
            <h2> Agregar Libro </h2>

            <form id = "formAgregar">
                <input type="hidden" id="Peticion" name = "Peticion" value = "Agregar"><br>
                <table align= "center">
                    <tr>
                        <td>
                           <label class="labelCRUD" for="campo1">Codigo: </label><br> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input placeholder="NNN-TTT-AAA" class="inputCRUD" type="text" id="campo1" name="campo1"><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="labelCRUD" for="campo2">Titulo: </label><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input placeholder="" class="inputCRUD"type="text" id="campo2" name="campo2"><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="labelCRUD" for="campo3">Autor: </label><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input placeholder="" class="inputCRUD"type="text" id="campo3" name="campo3"><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="labelCRUD" for="campo5">Edicion: </label><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input placeholder="" class="inputCRUD"type="text" id="campo5" name="campo5"><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="labelCRUD" for="campo6">A&ntilde;o: </label><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input placeholder="" class="inputCRUD"type="text" id="campo6" name="campo6"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                        </td>
                    </tr>

                </table>

                <p id = "mensajeError" style="margin: 5px; color:crimson; font-size: 12px"> <br><br> </p>

                <button class ="btnCRUD" type='button' onclick="agregarRegistroBD()" value="Agregar">Agregar</button>
            </form>
        </div>
    <?
    }
}



?>