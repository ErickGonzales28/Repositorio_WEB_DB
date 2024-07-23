<?php
class formEliminarLibro{
    private $codigo;
    public function __construct($codigo){
        $this->codigo = $codigo;
    }
    public function showForm(){
        ?>
        <div id="formBlock">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <form id = "formEliminar">
                <input type="hidden" id="Peticion" name = "Peticion" value = "Eliminar">
                <input type="hidden" id="Codigo" name = "Codigo" value = "<?echo $this->codigo?>"> 
            </form>
            <script>

                $.ajax({
                type: 'POST',
                url: "controlCRUDLibro.php",
                data: $('#formEliminar').serialize(),
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
                        $('#mensajeCorrecto').html("Error en el registro: "+respuesta);
                        $('#mensajeCorrecto').show();
                        //$('#capa-flotante').hide();
                        setTimeout(function() {
                            $('#mensajeCorrecto').html("<br>");
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
                
            </script>
        </div>
        <?
    }




}

?>