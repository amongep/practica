<?php 
	echo ('<tr>
			<form action="" method="post">
				<th>'.$UserId.'</th>
				<input type="hidden" name="UserEmail" id="UserEmail" value="'.$UserEmail.'">
				<th>'.$UserEmail.'</th>
		');
	if ($user_role == 1) {
		if ($UserEmail == $usuario && $user_role != 2 ) {
			echo ('<th>Usuario Actual</th>');
		}else{
			echo ('<th>
					<input type="submit" id="btn" name="btn" value="Editar" class="btn btn-warning"> 
					<input type="submit" id="btn" name="btn" value="Eliminar" class="btn btn-danger">
				</th>');
		}
	}else{
			echo ('<th>
					Solo lectura
				</th>');
		}
	echo('</form>');
		

?>





