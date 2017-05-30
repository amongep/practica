<?php @session_start(); ?>
<div class="container">

<?php 
ob_start();


	include ('../conexion/conect.php');

	if (!isset($_SESSION['Logged'])) {
		header('Location: ../index.php');
	}
	
	$usuario = $_SESSION['Logged'];
	$query = "SELECT * from users where email = '$usuario' ";
	$answer = mysqli_query($conexion, $query);

	if ($answer) {
		$reg = mysqli_affected_rows($conexion);
		if ($reg > 0 ) {
			$registros = mysqli_fetch_array($answer);
			$user_role =  $registros['role'];
			$user_id =  $registros['id'];
		}
	}else{
		echo "Error de conexion";
	}
	
	$page = @$_GET['page'];
?>

<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/js.js"></script>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/01_nav_style.css">
	<link rel="stylesheet" href="../css/form_style.css">
	<link rel="stylesheet" href="../css/table_style.css">

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Practica PHP</title>
</head>

<body>
<?php include ('php/navLog.php'); ?>

<div class="container" style="margin-top:30px">

<div class="Cont_Contenido" >
	<div class="Pag_php" >
		<?php
			if ($page == "") {
					$page = "01-inicio";    
				}
			include ("php/".$page.".php");   
		?>
	</div>
</div>

</div>
</body>
</html>

<?php
ob_end_flush();
?>