<h3 class="text-primary">Agregar usuario:</h3>

<form action="../php/add_user.php" method="post">
	<label for="email">Email:</label>
	<input type="email" name="email" id="email">

	<label for="pass">Password:</label>
	<input type="password" name="pass" id="pass">

	<label for="role">Role</label>

	<select name="role" id="role">
    	<option value="2">Visitante</option>
    	<option value="1">Administrador</option>
    </select>

	<input type="submit" id="btn" name="btn" value="Agregar" class="btn btn-success">
</form>
<br>


	
