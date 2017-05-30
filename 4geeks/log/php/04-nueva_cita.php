<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>


$(function () {
$("#fechaDeCita").datepicker();
  $("#fechaDeCita").datepicker("option", { dateFormat: "yy-mm-dd" });
});

</script>
<style>
	p{
		margin-bottom: 
	}
</style>
<?php 
	if ($user_role != 1) {
		header('location: ../index.php');
	}
?>
<h2 class="text-primary">Agregar una nueva entrada</h2>

<form action="" method="post">
	<label for="user_id">Email:</label>

<select name="user_id" id="user_id" class="form-control" style="display:inline-block;width:auto;cursor:pointer;">

<?php 
	
		$ConsultaUsuarios = "SELECT * from users";
		$respondeConsulta = mysqli_query($conexion, $ConsultaUsuarios);


		if ($respondeConsulta) {
			//echo "Hay conexion";
			$registro = mysqli_affected_rows($conexion);
			if ($registro > 0) {
			
				//echo "Hay datos para mostrar";
				while ($registro = mysqli_fetch_array($respondeConsulta)) {
						$UserEmail=$registro['email'];
						$UserId=$registro['id'];
						$action = ($UserEmail== $usuario) ? 'Seleccione Usuario' : $UserEmail;

						echo '<option value="'.$UserId.'">'.$action .'</option>';
					}
			}else{
		        echo ("<p class='bg-warning alert alert alert-dismissible txt-alert'>Aún no usuarios registradas para programar citas.<p>");
			}

		}else{
			echo "no hay conexion";
		}
?>
</select>
	<label for="fregistro">Fecha de la cita:</label>
	<input id="fechaDeCita" name="fechaDeCita" type="text" >

	<input type="submit" id="btn" name="btn" value="Add" class="btn btn-success">
</form>
<br>

 <style>

 	#fechaDeCita{
 		z-index: 111;
 		position: relative;
 		top: 00px
 	}
 </style>

<?php 
$time = time();
$actual_time = date("Y-m-d H:i:s");


	$btn = @$_POST['btn'];
	$id_nuevaEntrada = @$_POST['user_id'];
	$fechaDeCita = @$_POST['fechaDeCita'];

	if (isset($btn)) {
		if ($id_nuevaEntrada == $user_id) {
			echo "<script>alert('Debe Seleccionar un Usuario para proceder')</script>";
		}else{
			$query = "SELECT * from appointments"; 
			$answer = mysqli_query($conexion, $query);

			if ($answer) {
				//echo 'conexion';
				$query = "INSERT into appointments (user_id, created_at, date) values ('$id_nuevaEntrada', '$actual_time', '$fechaDeCita')";

				$citaAgregada = mysqli_query($conexion, $query);
				if ($citaAgregada) {		
					echo "Cita Agregada";
				}else{
					echo "<script>alert('El usuario seleccionado ya posee una cita pendiente, por favor elija otro usuario.')</script>";
				}
			}else{
				echo "Error de conexion";
			}
		}
	}
?>
