<?php 
	include ('../conexion/conect.php');

	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$role = $_POST['role'];

	$query = "SELECT * from users"; 
	$answer = mysqli_query($conexion, $query);

	if ($answer) {
		//echo 'conexion';
		$query = "INSERT into users (email, password, role) values ('$email', '$pass', '$role')";

		$add = mysqli_query($conexion, $query);
		if ($add) {
			header('location: ../log/index.php');
			echo "Nuevo Usuario Agregado";
		}else{
			echo "Error";
		}
	}else{
		echo "Error de conexion";
	}
?>