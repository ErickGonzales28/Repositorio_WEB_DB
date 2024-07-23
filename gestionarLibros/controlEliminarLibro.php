<?php
include_once("formEliminarLibro.php");
// Obtener los datos del formulario
$codigo = $_POST['Dato1'];

// Validar los datos aquí...
$formEliminar = new formEliminarLibro($codigo);
$formEliminar->showForm();
// Redirigir a la página de destino con los datos del formulario
?>