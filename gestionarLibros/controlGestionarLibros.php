<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once("../dao/LibroDAO.php");
include_once("../dao/UsuarioDAO.php");
include_once("formGestionarLibros.php");
include_once("../autenticarUsuario/formMensajeSistema.php");

$codigoUser = $_SESSION["usuario"];
$contrasenaUser = $_SESSION["contrasena"];
if((isset($codigoUser) && isset($contrasenaUser))){
    $usuario = new UsuarioDAO();
    $user = $usuario->autenticarUsuario($codigoUser,$contrasenaUser);
    if(($user->getCodigo() == $codigoUser && $user->getPassword() == $contrasenaUser && $user->getTipo()== "B")){
        if(isset($_GET["Buscar"])){
            $librosDAO = new LibroDAO();
            if($_GET["Buscar"]==""){
                $lib = $librosDAO->readALL();
            }else{
                $lib = $librosDAO->buscarLibro($_GET["Buscar"]);
            }
            $prueba = new formGestionarLibros();
            $prueba->obtenerLibros($lib);
        }else{
            $librosDAO = new LibroDAO();
            $lib = $librosDAO->readALL();
            $prueba = new formGestionarLibros();
            $prueba->showForm($lib);
        }
    }else{
        $mensaje = new formMensajeSistema();
        $mensaje->formMensajeSistemaShow("El usuario no tiene privilegios para gestionar libros", "http://localhost//bibliotecaProyect/autenticarUsuario/indexPrueba.php");
    }
}else{
    header("Location: http://localhost//bibliotecaProyect/autenticarUsuario/indexPrueba.php");
}
$_SESSION["usuario"] = $codigoUser;
$_SESSION["contrasena"] = $contrasenaUser;




?>