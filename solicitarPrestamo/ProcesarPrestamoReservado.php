<?php
session_start();
include_once('../dao/PrestamoDAO.php');
include_once('../clases/Prestamo.php');
include_once('../dao/UsuarioDAO.php');
include_once('../clases/Usuario.php');
include_once('../dao/LibroDAO.php');
include_once('../clases/Libro.php');

$confirmar=$_POST['BtnGuardar'];
$id_prestamo=$_POST['id_p'];
$codlib=$_POST['codigoLibro'];
$codigoAlum=$_POST['codigoAlum'];
$fecha_res=($_POST['fecha_res']);
$fecha_ini=($_POST['fecha_ini']);
$fecha_fin=($_POST['fecha_fin']);
$fecha_entrega=null;
$codigo=$_SESSION['usuario'];
$password=$_SESSION['contrasena'];
if(isset($confirmar)){
	
	$diferencia_dias = (strtotime($fecha_res) - strtotime($fecha_ini)) / 86400;
	 
	if ($diferencia_dias <= 1) {
		header("Location: prueba.php");
		
		
		
		if(isset($codigo) && isset($password)){
			$usuario = new UsuarioDAO();
			$user = $usuario->autenticarUsuario($codigo,$password);
			if($user->getCodigo() == $codigo && $user->getPassword() == $password && $user->getTipo()== "B"){
				$objetoPrestamo= new Prestamo();
				$objetoPrestamoDAO = new PrestamoDAO();
				$objetoPrestamoDAO->updatePrestamo($id_prestamo,$codlib,$codigoAlum,$fecha_res,$fecha_ini,$fecha_fin,$fecha_entreg,1);
				
				$objetoLibro= new Libro();
				$objetoLibroDAO = new LibroDAO();
				$objetoLibroDAO->updateLibroPrestado($codlib,0);
				?>
				<script> alert("PRESTAMO REALIZADO CON EXITO") </script>
				<?
		   }
		}else{
			 ?>
            <script> alert("INGRESO NO VALIDO") </script>
            <?
            echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';
			}
		
		// Espera 3 segundos antes de redirigir
		sleep(3);
	}else{
		echo "<CENTER>Se ha excedido el tiempo de tolerancia despues de la reserva, la reserva ha sido cancelada";	
		if(isset($codigo) && isset($password)){
			$usuario = new UsuarioDAO();
			$user = $usuario->autenticarUsuario($codigo,$password);
			if($user->getCodigo() == $codigo && $user->getPassword() == $password && $user->getTipo()== "B"){
				$objetoLibro= new Libro();
				$objetoLibroDAO = new LibroDAO();
				$objetoLibroDAO->updateLibroPrestado($codlib,1);
			}
		}else{
			?>
            <script> alert("INGRESO NO VALIDO") </script>
            <?
            echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';
			}
			
		}
    
		$_SESSION['usuario']=$codigo;
		$_SESSION['contrasena']=$password;
    exit();

}
?>