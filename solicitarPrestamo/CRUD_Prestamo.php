<?php
include_once("../dao/PrestamoDAO.php");
switch($_POST["Peticion"]){
    case "Agregar":
        $registro = new PrestamoDAO();
        $registro->insertPrestamo($_POST["codigoLibro"], $_POST["codigoAlum"], 1, $_POST["fecha_res"], $_POST["fecha_ini"], $_POST["fecha_fin"], $_POST["fecha_entrega"]);
        break;
    case "Eliminar":

        break;
    case "Modificar":
        
        break;
}

?>