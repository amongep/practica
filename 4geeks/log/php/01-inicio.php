<?php 
	echo "<h2 class='text-primary'>Bienvenido " .$usuario .'</h2>';
	if ($user_role == 1) {
		include '../php/admin_show.php';
	}else if ($user_role == 2) {
		include '../php/visit_show.php';
	}else{
		header('Location: ../index.php');
	}

	$query = "SELECT * from users"; 
	$answer = mysqli_query($conexion, $query);

	if ($answer) {
		//echo "Conecta a base de datos";
		$registro = mysqli_affected_rows($conexion);
		if ($registro > 0) {
			//echo "Hay reg. para mostrar";
			echo ('<table class="table table-striped table-bordered table-hover table-condensed">
					<tr>
						<th class="th_title">Id</th>
						<th class="th_title">Email</th>
						<th class="th_title">Opciones</th>
					</tr>'
			);

			while ($registro = mysqli_fetch_array($answer)) {
				$UserEmail=$registro['email'];
				$UserRole=$registro['role'];
				$UserId=$registro['id'];
				include '../php/Reg.php';
			}
			echo '</table>';

		}else{
			echo 'No hay registros para mostrar';
		}

	}else{
		echo "Error de conexion";
	}

	$btn = @$_POST['btn'];
	$UserEmail = @$_POST['UserEmail'];

	if( $user_role == 1){
		echo ('
			<form action="" method="post" class="col-md-4 col-md-offset-3 formulario">
			<h3>Editar usuario:</h3>
				<label for="email">Email:</label>
				<input type="text" name="email" id="email" value="'.$UserEmail.' " readonly  class="form-control">

				<label for="new_email">Nuevo Email:</label>
				<input type="email" name="new_email" id="new_email" value="'.$UserEmail.'"  class="form-control">

				<label for="new_pass">Nuevo Password:</label>
				<input type="password" name="new_pass" id="new_pass" value=""  class="form-control">

				<label for="new_role">Role</label>

				<select name="new_role" id="new_role" class="form-control">
			    	<option value="2">Visit</option>
			    	<option value="1">Admin</option>
			    </select>
				<br>
				<input type="submit" id="btn" name="btn" value="Guardar" class="btn btn-success">
			</form>
		');
	}
?>

</div>

<?php 

$NewUserEmail = @$_POST['new_email'];
$NewUserPass = @$_POST['new_pass'];
$NewUserRole = @$_POST['new_role'];

$NewUserEmail = strip_tags($NewUserEmail);
$simbolos =array('?','¿','(',')','!','¡','$','%','&','/','·','"','\'');
foreach ($simbolos as $simb) {
	$NewUserEmail = str_replace($simb, " ", $NewUserEmail);
}
$NewUserEmail = trim($NewUserEmail);
while (strpos($NewUserEmail, "  ")) {
	$NewUserEmail = str_replace("  ", " ",$NewUserEmail);
}

$NewUserPass = strip_tags($NewUserPass);


	switch ($btn) {
		case 'Guardar':
		$UserEmail = @$_POST['email'];

		$consulta = "SELECT * from users where email='$UserEmail'";
		$respuesta = mysqli_query($conexion,$consulta);
		if ($respuesta) {
			//echo "a modificar " .$UserEmail;	
			$registros = mysqli_affected_rows($conexion);
			if ($registros > 0) {
				//echo "a modificar " .$UserEmail .' por ' .$NewUserEmail;
				$consulta = "UPDATE users set email='$NewUserEmail', password='$NewUserPass', role='$NewUserRole'where email = '$UserEmail' limit 1 ";
				$respuesta = mysqli_query($conexion,$consulta);
				if ($respuesta) {
					echo "<script language='javascript'>window.location='index.php'</script>";
				}else{
					echo '<script>alert("Error en la actualización de datos");</script>';
				}
			}else{
				echo '<script language="javascript">alert("Datos incorrectos");</script>'; 
			}
		}else{
			echo "error de conexion";
		}		
		break;

		case 'Eliminar':

			$query = "DELETE from users where email = '$UserEmail'";
			$answer = mysqli_query($conexion,$query);
			if ($query) {
				header('location: index.php');
			}else{
				echo "Error de conexion";
			}

		break;

	}


?>