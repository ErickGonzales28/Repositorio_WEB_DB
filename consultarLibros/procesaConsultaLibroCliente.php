<?php
    session_start();
    include_once('formConsultarLibroCliente.php');
    /*if(isset($_POST['usuario'])){
        $usuario = $_POST['usuario'];
    }
    elseif(isset($_GET['usuario'])){
        $usuario = $_GET['usuario'];
    }*/
    if(isset($_SESSION['usuario']) && isset($_SESSION['contrasena'])){
        $form=new formConsultarLibroCliente();
        $form->formConsultarLibroClienteShow();
    }
?>