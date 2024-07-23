<?php
class formModificarLibro{
    private $libro;
    public function __construct($dat){
        $this->libro = $dat;
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
                function modificarRegistroBD(doc) {
                    $.ajax({
                    type: 'POST',
                    url: "controlCRUDLibro.php",
                    data: $('#formModificar').serialize(),
                    success: function(respuesta) {
                        // Ocultar la capa flotante
                        //$('#capa-flotante').hide();
                        if(respuesta == "Libro actualizado correctamente"){
                            $('#mensajeCorrecto').html(respuesta);
                            $('#mensajeCorrecto').show();
                            $('#capa-flotante').hide();
                            setTimeout(function() {
                                $('#mensajeCorrecto').html("<br>");
                                //$('#mensajeCorrecto').hide();
                            }, 3000);
                            actualizarTabla();
                        }else{
                            $('#mensajeError').html(respuesta);
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
            <h2> Modificar Libro </h2>
            <br>
            
            <form id = "formModificar">
                <input type="hidden" id="Peticion" name = "Peticion" value = "Modificar">
                <input type="hidden" id="campo4" name = "campo4" value = "<?echo $this->libro[3];?>">
                <input type="hidden" id="campo7" name = "campo7" value = "<?echo $this->libro[6];?>">
                <table align="center">
                    <tr>
                        <td align="left">
                            <label class="labelCRUD" for="campo1">Codigo :</label><br>
                        </td>
                        
                    </tr>
                    <tr>
                        <td><input type="text" class="inputCRUD" id="campo1" name="campo1" value= "<?echo $this->libro[0];?>" readonly><br><br></td>
                    </tr>

                    <tr>
                        <td align="left"><label class="labelCRUD" for="campo2">Titulo:</label><br></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="inputCRUD" id="campo2" name="campo2" value= "<?echo $this->libro[1];?>"><br><br></td>
                    </tr>
                    <tr>
                        <td align="left"><label class="labelCRUD" for="campo3">Autor:</label><br></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="inputCRUD" id="campo3" name="campo3" value= "<?echo $this->libro[2];?>"><br><br></td>
                    </tr>
                    <tr>
                        <td align="left"><label class="labelCRUD" for="campo5">Edicion:</label><br></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="inputCRUD" id="campo5" name="campo5" value= "<?echo $this->libro[4];?>"><br><br></td>
                    </tr>
                    <tr>
                        <td align="left"><label class="labelCRUD" for="campo6">A&ntilde;o:</label><br></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="inputCRUD" id="campo6" name="campo6" value= "<?echo $this->libro[5];?>"><br><br></td>
                    </tr>
                    <tr>
                        <td>
                            
                        </td>
                    </tr>
                </table>
                <p id = "mensajeError" style="margin: 5px; color:crimson; font-size: 12px">
                    <br>
                </p>
                <button class ="btnCRUD" type='button' onclick="modificarRegistroBD()" value="Modificar">Modificar</button>
                
            </form>
        </div>
    <?
    }
}



?>