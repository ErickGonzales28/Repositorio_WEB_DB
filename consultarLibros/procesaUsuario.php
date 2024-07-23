<?php
    session_start();
    class procesaConsulta{        
        public function __construct(){

        }
        public function verificarBibliotecario($codigo,$password){
            #verifica si usuario es bibliotecario o cliente
            include_once('../clases/Usuario.php');
            include_once('../dao/UsuarioDAO.php');
    
            $objUsuario = new Usuario();
            $objUsuarioDAO = new UsuarioDAO();
            $objUsuario = $objUsuarioDAO->SelectUsuario($codigo);

            if($objUsuario->getTipo() == 'B' && $objUsuario->getPassword() == $password)
                return True;
            else
                return False;
        }

    }
    $codigo = $_SESSION['usuario'];
    $password = $_SESSION['contrasena'];
    include_once('../autenticarUsuario/formMenuBasic.php');
    include_once('../autenticarUsuario/formBienvenida.php');
    $btnCliente = $_POST['boton'];
    if(isset($btnCliente) && isset($codigo) && isset($password)){
        include_once('formConsultarLibroCliente.php');
            $form = new formConsultarLibroCliente();
            $form->formConsultarLibroClienteShow();
    }
    elseif(isset($codigo) && isset($password)){
        $obj = new procesaConsulta();
        $bibliotecario = $obj->verificarBibliotecario($codigo,$password);
        if($bibliotecario == True){
            include_once('formOpcionesConsulta.php');
            $form = new formOpcionesConsulta();
            $form->formOpcionesConsultaShow();
        }
        else{
            ?>
            <script> alert("INGRESO NO VALIDO") </script>
            <?
            echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';
        }
    }    
?>
