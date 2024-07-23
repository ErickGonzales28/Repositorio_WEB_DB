<?php
session_start();
include_once('../dao/PrestamoDAO.php');
include_once('../clases/Prestamo.php');
include_once('../dao/LibroDAO.php');
include_once('../clases/Libro.php');
include_once('../dao/UsuarioDAO.php');
include_once('../clases/Usuario.php');

$confirmar=$_POST['confirmar'];
$regresar=$_POST['regresar'];
$codlib=$_POST['codigo'];
$titulo=$_POST['titulo'];
$autor=$_POST['autor'];
$edicion=(int)$_POST['edicion'];
$estado=$_POST['estado'];
$anio=(int)$_POST['anio'];
$usuario=$_SESSION['usuario'];
$contrasena=$_SESSION['contrasena'];
$fechaRes = date("Y-m-d");


if(isset($confirmar) && isset($usuario) && isset($contrasena)){
    $usuarioDAO = new UsuarioDAO();
    $user = $usuarioDAO->autenticarUsuario($usuario,$contrasena);
    if($user->getCodigo() == $usuario && $user->getPassword() == $contrasena && $user->getTipo()== "C"){
        include_once('formConsultarLibroCliente.php');
        $objetoPrestamo = new Prestamo();
        $objetoPrestamoDAO = new PrestamoDAO();
        $lista = $objetoPrestamoDAO->readAll();
        $cantidad = count($lista);
        $contador = 0;
        for($i = 0; $i < $cantidad; $i++){
            if($lista[$i]['codUsuario']==$usuario AND ($lista[$i]['estado']==0 OR $lista[$i]['estado']==1))
            $contador = $contador+1;
        }
        if($contador>=2){
            ?>
            <script> alert("Limite de reservas excedidos") </script>
            <?
            $form=new formConsultarLibroCliente();
            $form->formConsultarLibroClienteShow();
        }else{
            $objetoPrestamoDAO->insertPrestamo($codlib,$usuario,$fechaRes,NULL,NULL,NULL,0);
            $objetoLibro= new Libro();
            $objetoLibroDAO = new LibroDAO();
            $objetoLibroDAO->updateLibro($codlib,$titulo,$autor,$estado,$edicion,$anio,0);
            ?>
                <script> alert("Reserva realizada con exito") </script>
            <?
            $form=new formConsultarLibroCliente();
            $form->formConsultarLibroClienteShow();
            #echo '<meta http-equiv="refresh" content="0; url=procesaConsultaLibroCliente.php?usuario='.$usuario.'">';
        } 
    }else{
        ?>
        <script> alert("NO HA INICIADO SESION") </script>
        <?
        echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';
    } 
}else{
    ?>
        <script> alert("INGRESO NO VALIDO") </script>
    <?
    echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';
}
?>