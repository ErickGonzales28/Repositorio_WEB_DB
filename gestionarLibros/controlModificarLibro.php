<?php
include_once("formModificarLibro.php");
$dat = array();
$dat[0] = $_POST["Dato1"];
$dat[1] = $_POST["Dato2"];
$dat[2] = $_POST["Dato3"];
$dat[3] = $_POST["Dato4"];
$dat[4] = $_POST["Dato5"];
$dat[5] = $_POST["Dato6"];
$dat[6] = $_POST["Dato7"];
$formModificar = new formModificarLibro($dat);
$formModificar->showForm();

?>