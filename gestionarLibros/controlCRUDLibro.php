<?php

include_once("../dao/LibroDAO.php");
include_once("../dao/UsuarioDAO.php");
include_once("../clases/Libro.php");
include_once("../clases/Usuario.php");
include_once("../autenticarUsuario/formMensajeSistema.php");
session_start();
$codigoUser = $_SESSION["usuario"];
$contrasenaUser = $_SESSION["contrasena"];

if(isset($codigoUser) && isset($contrasenaUser)){
    $usuario = new UsuarioDAO();
    $user = $usuario->autenticarUsuario($codigoUser,$contrasenaUser);
    if($user->getCodigo() == $codigoUser && $user->getPassword() == $contrasenaUser && $user->getTipo()== "B"){
        switch($_POST["Peticion"]){
            case "Agregar":
                $registro = new LibroDAO();
                $registro->insertLibro($_POST["campo1"], $_POST["campo2"], $_POST["campo3"], 1, (int)$_POST["campo5"], (int)$_POST["campo6"], 1);
                break;
            case "Eliminar":
                $registro = new LibroDAO();
                $libro = $registro->SelectLibro($_POST["Codigo"]);
                if($libro->getEdicion() == "" || $libro->getEdicion() == null) $libro->setEdicion("null");
                if($libro->getEstado() == "" || $libro->getEstado() == null) $libro->setEstado("null");
                if($libro->getAnio() == "" || $libro->getAnio() == null) $libro->setAnio("null");
                if($libro->getDisponibilidad() == "" || $libro->getDisponibilidad() == null) $libro->setDisponibilidad("null");
                $registro->updateLibro($libro->getCodigoLib(),$libro->getTitulo(),$libro->getAutor(),1-(int)$libro->getEstado(),$libro->getEdicion(),$libro->getAnio(),$libro->getDisponibilidad());
                break;
            case "Modificar":
                foreach($_POST as $indice => $valor){
                    if($indice == "campo4"|| $indice == "campo5"|| $indice == "campo6"|| $indice == "campo7"){
                        if($valor == ""|| $valor == null)
                            $_POST[$indice] = "null";
                        else
                            $_POST[$indice] = (int)$valor;

                    }
                }
                $registro = new LibroDAO();
                $registro->updateLibro($_POST["campo1"], $_POST["campo2"], $_POST["campo3"], $_POST["campo4"], $_POST["campo5"], $_POST["campo6"], $_POST["campo7"]);
                break;
        }
    }else{
        $mensaje = new formMensajeSistema();
        $mensaje->formMensajeSistemaShow("El usuario no tiene privilegios para gestionar libros", "hola");
    }
}else{
    header("Location: http://localhost//bibliotecaProyect/autenticarUsuario/indexPrueba.php");
}
$_SESSION["usuario"] = $codigoUser;
$_SESSION["contrasena"] = $contrasenaUser;
?>