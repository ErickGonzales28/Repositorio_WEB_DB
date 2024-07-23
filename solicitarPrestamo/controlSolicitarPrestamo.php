<?php
include_once ('FormSolicitarPrestamo.php');
	$c_alumno = $_GET['alumno'];
	$c_libro = $_GET['libro'];

	$objetoformSolicitar = new FormSolicitarPrestamo();
	$objetoformSolicitar -> FormSolicitarPrestamoShow($c_alumno,$c_libro);
	//echo "usuario: ".$c_usuario;
?>