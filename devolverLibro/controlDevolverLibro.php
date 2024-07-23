<?php 

include_once('../dao/PrestamoDAO.php');
include_once('../clases/Prestamo.php');
include_once('../dao/LibroDAO.php');
include_once('../clases/Libro.php');

        include_once("../dao/UsuarioDAO.php");
	include_once("../clases/Usuario.php");
        session_start();
        $usuario = $_SESSION['usuario'];
        $contrasena = $_SESSION['contrasena'];
	$objUsuario = new UsuarioDAO();
    	$user = $objUsuario->autenticarUsuario($usuario,$contrasena);
    	if($user->getCodigo() == $usuario && $user->getPassword() == $contrasena && $user->getTipo()== "B"){
            
            $idOp = $_POST['idOp'];
            $objPrestamoDAO = new PrestamoDAO();
            $prestamo = $objPrestamoDAO->SelectPrestamo($idOp);
            $objLibroDAO = new LibroDAO();
            $libro = $objLibroDAO->SelectLibro($prestamo->getCodLibro());
               
            if($prestamo->getEstado()== 1){

                $codLibro= $prestamo->getCodLibro();
                $codUsuario= $prestamo->getCodUsuario();
                $fechRes= $prestamo->getFechaRes();
                $fechIni= $prestamo->getFechaIni();
                $fechFin= $prestamo->getFechaFin();
                $fechaFinReal = date("Y-m-d");
                $estadoOp= 2;

                $titulo = $libro->getTitulo(); 
                $autor = $libro->getAutor();  
                $estadoLib = $libro->getEstado();   
                $edicion = (int)$libro->getEdicion();
                $anio = (int)$libro->getAnio(); 
                $disponibilidad = 1;

                $objPresDAO = new PrestamoDAO();
                $objPresDAO->updatePrestamo($idOp, $codLibro, $codUsuario, $fechRes, $fechIni, $fechFin, $fechaFinReal, $estadoOp);
                $objLibDAO = new LibroDAO();
                $objLibDAO->updateLibro($codLibro, $titulo, $autor, $estadoLib, $edicion, $anio, $disponibilidad);

                ?>
                <script> alert("Devolucion de libro con exito") </script>
                <?    
                echo '<meta http-equiv="refresh" content="0; url=procesaUser.php">';

            }else{
                ?>
                <script> alert("El libro no esta en prestamo") </script>
                <?    
                echo '<meta http-equiv="refresh" content="0; url=procesaUser.php">';
            }
            

	}else{
                ?>
                <script> alert("USUARIO NO IDENTIFICADO") </script>
                <?  

                include_once("../autenticarUsuario/formMenuBasic.php");
                session_start();
                $usuario=$_SESSION['usuario'];
                $contrasena=$_SESSION['contrasena'];
		$objetoFormBasic = new formMenu();
		$objetoFormBasic  -> formMenuShow($usuario,$contrasena);

        }
    
    
     
         
    



?>