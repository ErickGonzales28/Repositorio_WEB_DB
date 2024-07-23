<?php
 include_once("../shared/encabezado.php");
 include_once("../shared/piePagina.php");
	//formAutenticarUsuario
	class formAutenticarUsuario
	{
		public function showForm()
		{
		?>
        <html>
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta rel = "viewport" content = "width=device-width, initial-scale = 1.0">
            <link rel="stylesheet" href = "style.css"> 
            <link rel="stylesheet" type="text/css" href="botonesSmall.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="style.css">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="botonesSmall.css">
            <title>Autenticar Usuario</title>
            <script>
                function encriptarContrasena(){
                    // mensaje a encriptar
                    var contrasena0 = document.getElementById("contrasena0");
                    var contrasena = document.getElementById("contrasena");
                    var boton = document.getElementById("botonRegistrarOculto");
                    boton.value = '1';
                    const mensaje = contrasena0.value;
                    // Codificar el mensaje en formato Uint8Array
                    const mensajeUint8 = new TextEncoder().encode(mensaje);

                    // Encriptar con SHA-256
                    crypto.subtle.digest('SHA-256', mensajeUint8).then(function(hash) {
                    // Convertir el resultado en formato ArrayBuffer a una cadena hexadecimal
                    const hashHex = Array.from(new Uint8Array(hash))
                        .map(b => b.toString(16).padStart(2, '0'))
                        .join('');
                        
                    console.log('Mensaje: ' + mensaje);
                    console.log('Hash SHA-256: ' + hashHex.toUpperCase());
                    contrasena.value = hashHex.toUpperCase();
                    });
                    var form = document.getElementById("formAutenticar");
                    setTimeout(function() {form.submit()}, 100);
                }
            </script>
            </head>
            
            <body>
                <div class = "contenedor">
                <p>&nbsp;</p>
                    <h1>Inicio de sesion</h1>
                
            <p>&nbsp;</p>
                    <form name="formAutenticar" id= "formAutenticar" method="post" action="controlAutenticarUsuario.php">
                            <table class = "tablaDatos" align="center" border="0">
                                <tr>
                                    <td>Usuario: </td>
                                    <td><input class = "Buscar" name="usuario" id="usuario" type="text" /></td>            
                                </tr>
                                <tr height = "15">
                                </tr>
                                <tr>
                                    <td width = "200">Contraseña: </td>
                                    <td><input class = "Buscar" name="contrasena0" id="contrasena0" type="password" /></td>   
                                </tr>
                                <tr height = "15">
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                    <input class = "Alta" name="botonRegistrar" id="botonRegistrar" type="button" onclick="encriptarContrasena()" value="AUTENTICAR" />
                                    </td>
                                </tr>
                                <input type = "hidden" name = "contrasena" id = "contrasena" value = "0">
                                <input type = "hidden" name = "botonRegistrarOculto" id = "botonRegistrarOculto" value = "0">
                            </table>
                    </form>
                </div>
            </body>
        </html>
            
        <?	
        piePagina::getPiePagina();
		}	
	}

?>