<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$nivel = $_POST['nivel'];
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	
	$sql = "INSERT INTO usuario (Id, Contrasena, Nivel, Nombre, correo) VALUES ('$user','$pass','$nivel','$nombre','$correo')";
	$res = $conectar->query($sql);
	
	if(!$res){
		if ($conectar->errno == 1062) {
			header('Location: ../html/reg_usuario_sistema_f.php?m=2&e=El ID de usuario "'.$user.'" esta en uso.');
			$conectar->close();
			exit();
		}else{
			header('Location: ../html/reg_usuario_sistema_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
			$conectar->close();
			exit();
		}
	}else{
		header('Location: ../html/reg_usuario_sistema_f.php?m=1&a=registraron');
		$conectar->close();
	}
?>