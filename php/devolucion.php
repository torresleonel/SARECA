<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$serial = $_GET['s'];

	$sql = "UPDATE equipo_audiovisual SET Estado=1 WHERE Serial = '$serial'";
	$res = $conectar->query($sql);
	
	if(!$res){
		header('Location: ../html/devolucion_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
		$conectar->close();
		exit();
	}else{
		$sql = "UPDATE prestamo SET Estado=1 WHERE Serial_equipo = '$serial'";
		$res = $conectar->query($sql);
		
		if(!$res){
			header('Location: ../html/devolucion_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
			$conectar->close();
			exit();
		}else{
			header('Location: ../html/devolucion_f.php?m=1&a=modificaron');
			$conectar->close();
		}
	}
?>