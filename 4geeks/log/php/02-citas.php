<h2 class="text-primary">Citas programadas:</h2>

<?php 
	$query = "SELECT * from users inner join appointments on users.id = appointments.user_id"; //Union de tablas de base de dtos
	$answer = mysqli_query($conexion, $query);

	if ($answer) {  //Mostrando las citas
		//echo "Conecta a base de datos";
		$registro = mysqli_affected_rows($conexion);
		if ($registro > 0) {
			//echo "Hay reg. para mostrar";
			echo ('<table class="table table-striped table-bordered table-hover table-condensed">
					<tr>
						<th class="th_Title">Id de la cita</th>
						<th class="th_Title">Email</th>
						<th class="th_Title">Cita creada el día:</th>
						<th class="th_Title">Cita para el día</th>'
						
			);

			if ($user_role == 1) {
					echo (
						'<th class="th_Title">Opcion</th>
						</tr>'
						);
				}

			while ($registro = mysqli_fetch_array($answer)) {
				$UserEmail=$registro['email'];
				$UserDate=$registro['date'];
				$UserCreated_at=$registro['created_at'];

				$CitaId=$registro['id'];

				
				echo ('<tr>
					<form action="" method="post">
						<input type="hidden" name="CitaId" id="CitaId" value="'.$CitaId.'">
						<th>'.$CitaId.'</th>
						<th>'.$UserEmail.'</th>
						<th>'.$UserCreated_at.'</th>
						<th>'.$UserDate.'</th>'
						);
				if ($user_role == 1) {
					echo (
						'<th><input type="submit" id="btnDelete" name="btnDelete" value="Eliminar" class="btn btn-danger"></th>
						</form>'
						);
				}
			}
			echo '</table>';

		}else{
			echo 'No hay registros para mostrar';
		}

	}else{
		echo "Error de conexion";
	}

	$CitaId = @$_POST['CitaId'];

	$btnDelete = @$_POST['btnDelete'];
	if (isset($btnDelete)) {  //borrar citas 
		$query = "DELETE from appointments where id = '$CitaId'";
		$answer = mysqli_query($conexion,$query);
		if ($query) {
			header('location: #');echo "aleluya";
		}else{
			echo "Error de conexion";
		}
	}
?>

<?php if ($user_role ==1): ?> 
	<h3 class="text-primary">Crear una cita nueva</h3>
	<a href="?page=04-nueva_cita" class="btn btn-primary">Crear cita</a>
<?php endif ?>
