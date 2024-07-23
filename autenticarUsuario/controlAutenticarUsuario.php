<?php
	session_start();
	if(isset($_GET['encabezado'])){
		include_once("../dao/UsuarioDAO.php");
		include_once("../clases/Usuario.php");
		$objUsuario = new UsuarioDAO();
        $usuario = $_SESSION['usuario'];
        $contrasena = $_SESSION['contrasena'];
    	$user = $objUsuario->autenticarUsuario($usuario,$contrasena);
    	if($user->getCodigo() == $usuario && $user->getPassword() == $contrasena && $user->getTipo()== "B"){
			include_once("../autenticarUsuario/formMenuBasic.php");
			$objetoFormBasic = new formMenu();
			$objetoFormBasic  -> formMenuShow($usuario,$contrasena);
		}else{
			?>
			<script> alert("SE HA DETECTADO UN INGRESO NO VALIDO") </script>
			<?
			echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';
		}
		exit();
	}
	unset($_SESSION["usuario"]);
	unset($_SESSION["contrasena"]);
	function validarCampos($codigo,$password)
	{
		if(strlen($codigo)>3 and strlen($password)>3)
			return(true);
		else
			return(false);
	}


	$boton = $_POST['botonRegistrarOculto'];
	if($boton == 1)
	{
		$codigo = strtolower(trim($_POST['usuario']));
		$password = trim($_POST['contrasena']);
		if(validarCampos($codigo,$password) == false)
		{
			?>
			<script> alert("INGRESE VALORES ADECUADOS") </script>
			<?
			echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';
		}
		else
		{
			include_once("../dao/UsuarioDAO.php");
			$objetoControlUsuario = new UsuarioDAO();
			$usuarioValidado = $objetoControlUsuario -> autenticarUsuario($codigo,$password);
			if($usuarioValidado->getCodigo() == null){
				?>
				<script> alert("SE HA DETECTADO UN CODIGO NO VALIDO") </script>
				<?
				echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';
			}else if($usuarioValidado->getEstado() == 0){
				?>
				<script> alert("SE HA DETECTADO UN ESTADO NO VALIDO") </script>
				<?
				echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';
			}else if($usuarioValidado->getPassword() == $password){
				if($usuarioValidado->getTipo() == 'B'){
					$_SESSION['usuario'] = $codigo;
					$_SESSION['contrasena'] = $password;
					include_once("../autenticarUsuario/formMenuBasic.php");
					$objetoFormBasic = new formMenu();
					$objetoFormBasic  -> formMenuShow($codigo,$password);				
				}else{
					$_SESSION['usuario'] = $codigo;
					$_SESSION['contrasena'] = $password;
					include_once("../autenticarUsuario/formBienvenida.php");
					$objetoFormBienvenida = new formBienvenidaSistema();
					$objetoFormBienvenida -> formBienvenidaSistemaShow($codigo);
				}
				#Dar Privilegios
			}else{
				?>
				<script> alert("SE HA DETECTADO UNA CONTRASEÑA NO VALIDA") </script>
				<?
				echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';
			}
		}
	}
	else
	{
		?>
		<script> alert("SE HA DETECTADO UN INGRESO NO VALIDO") </script>
		<?
		echo '<meta http-equiv="refresh" content="0; url=../autenticarUsuario/indexPrueba.php">';	
	}

?>