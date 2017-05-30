<?php 
	include ('../../conexion/conect.php');
	session_start();
	$email = $_POST['email'];
	$pass = $_POST['pass'];


	$email = strip_tags($email);
	$simbolos =array('?','¿','(',')','!','¡','$','%','&','/','·','"','\'');
	foreach ($simbolos as $simb) {
		$email = str_replace($simb, " ", $email);
	}

	$email = trim($email);

	while (strpos($email, "  ")) {
		$email = str_replace("  ", " ",$email);
	}

	$pass = strip_tags($pass);
	$simbolos =array('?','¿','(',')','¡','$','%','&','/','·','"','\'');
	foreach ($simbolos as $simb) {
		$pass = str_replace($simb, " ", $pass);
	}
	$pass = trim($pass);
	while (strpos($pass, "  ")) {
		$pass = str_replace("  ", " ",$pass);
	}


	$query = "SELECT * from users where email = '$email' && password = '$pass'";
	$answer = mysqli_query($conexion, $query);

	if ($answer) {
		//echo "Conecta";

		$reg = mysqli_affected_rows($conexion);
		if ($reg > 0 ) {

			$registros = mysqli_fetch_array($answer);
			$user_email =  $registros['email'];
			$_SESSION['Logged'] = $user_email;

			header('Location: ../../log/index.php');
		}else{
			echo "Usuario o contraseña incorrecta";
		}
	}else{
		echo "Error de conexion";
	}

?> 