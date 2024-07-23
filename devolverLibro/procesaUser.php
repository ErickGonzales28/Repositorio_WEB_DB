<?php    
    class procesaConsulta{        
        public function __construct(){

        }
        public function verificarBibliotecario($usuario, $contrasena){
            #verifica si usuario es bibliotecario o cliente
            include_once('../clases/Usuario.php');
            include_once('../dao/UsuarioDAO.php');
            
            $objUsuario = new Usuario();
            $objUsuarioDAO = new UsuarioDAO();
            $objUsuario = $objUsuarioDAO->SelectUsuario($usuario);
            if($objUsuario->getTipo() == 'B' && $objUsuario->getPassword() == $contrasena)
                return True;
            else
                return False;
        }

    }
    session_start();
    $usuario=$_SESSION['usuario'];
    $contrasena=$_SESSION['contrasena'];

    $obj = new procesaConsulta();
    $bibliotecario = $obj->verificarBibliotecario($usuario, $contrasena);
        
        if($bibliotecario == False){
            ?>
            <script> alert("INGRESO NO VALIDO") </script>
            <?
            echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';
            
        }else{
            include_once('formDevolverLibro.php');
            $form = new formDevolverLibro();
            $form->formDevolverLibroShow();
        }
    
    
?>
