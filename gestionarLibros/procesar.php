<?php
// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];

// Simular una espera de 3 segundos
sleep(3);

// Mostrar una respuesta con la capa flotante
echo '<p>Hola '.$nombre.', hemos recibido tus datos correctamente. Nos pondremos en contacto contigo pronto.</p>';