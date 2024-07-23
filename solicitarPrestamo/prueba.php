<?php	
session_start();
//echo "El identificador de la sesión es: " . session_id();
$codigo = $_SESSION['usuario'];
$password = $_SESSION['contrasena'];

#verifica si usuario es bibliotecario o cliente
 include_once('../clases/Usuario.php');
include_once('../dao/UsuarioDAO.php');


/*
include_once("menuPrestamos.php");
	//header("Location: formVerificarAlumno.php?usuario=$usuario&contrasena=$contrasena");
	$objetoformVerificarAlumno = new formMenuConsulta();
	$objetoformVerificarAlumno -> formMenuConsultaShow();
		
	*/	
	class procesaConsulta{        
        public function __construct(){

        }
        public function verificarBibliotecario($codigo,$contrasena){
            
            $objUsuario = new Usuario();
            $objUsuarioDAO = new UsuarioDAO();
            $objUsuario = $objUsuarioDAO->SelectUsuario($codigo);
            if($objUsuario->getTipo() == 'B' && $objUsuario->getPassword()== $contrasena )
                return True;
            else
                return False;
        }

    }
    

	
    $obj = new procesaConsulta();
    $bibliotecario = $obj->verificarBibliotecario($codigo,$password);
        if($bibliotecario == False){
			?>
            <script> alert("INGRESO NO VALIDO") </script>
            <?
            echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';
            

        }else{
            include_once("menuPrestamos.php");
			//header("Location: formVerificarAlumno.php?usuario=$usuario&contrasena=$contrasena");
			$objetoformVerificarAlumno = new formMenuConsulta();
			$objetoformVerificarAlumno -> formMenuConsultaShow();
			//echo $usuario;
        }	
    $_SESSION['usuario'] = $codigo;
    $_SESSION['contrasena'] = $password;
?>