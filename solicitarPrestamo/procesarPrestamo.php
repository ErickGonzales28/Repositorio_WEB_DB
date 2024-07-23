<?php
session_start();
//ob_start();
//echo "El identificador de la sesión es: " . session_id();
$usario_c = $_SESSION['usuario'];
$pass= $_SESSION['contrasena'];
include_once('../dao/UsuarioDAO.php');
include_once('../clases/Usuario.php');
include_once('../dao/PrestamoDAO.php');
include_once('../clases/Prestamo.php');
include_once('../dao/LibroDAO.php');
include_once('../clases/Libro.php');

$confirmar=$_POST['btnGuardar'];
$codlib=$_POST['codigoLibro'];
$codigoAlum=$_POST['codigoAlum'];
$fecha_res = null;
$fecha_ini=($_POST['fecha_ini']);
$fecha_fin=($_POST['fecha_fin']);
$fecha_entrega=null;

//echo "1. ".$codigoLibro;
	//echo $codigoAlum;

if(isset($confirmar)){
	
	header("Location: prueba.php");
	//echo $pass;
	//echo $users;
	
	
	if(isset($usario_c) && isset($pass)){
			$usuario = new UsuarioDAO();
			$user = $usuario->autenticarUsuario($usario_c,$pass);
			if($user->getCodigo() == $usario_c && $user->getPassword() == $pass && $user->getTipo()== "B"){
				$objetoPrestamo= new Prestamo();
				$objetoPrestamoDAO = new PrestamoDAO();
				$objetoPrestamoDAO->insertPrestamo($codigoLibro,$codigoAlum,$fecha_res,$fecha_ini,$fecha_fin,$fecha_entrega,1);
				
				$objetoLibro= new Libro();
				$objetoLibroDAO = new LibroDAO();
				$objetoLibroDAO->updateLibroPrestado($codlib,0);
				
				//session_write_close();
				
				// Espera 3 segundos antes de redirigir
				
				
				//echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';
				// Redirecciona a la página especificada
				sleep(3);
		
                //echo '<meta http-equiv="refresh" content="0; url=phasm.php">';
				
				
				//echo '<meta http-equiv="refresh" content="0; url=prueba.php">';
				//ob_end_flush();
				
				
				//exit();
				//header('Location: prueba.php');
			}
			
	}
	$_SESSION['usuario']=$usario_c;
	$_SESSION['contrasena']=$pass;
}
?>