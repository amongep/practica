<header>
	<input type="checkbox" name="menu" class="ocultar" id="menu">
	<label for="menu" class="label_menu" id="LabelFixed">Menu</label>
	<nav class="navegador" id="MenuFixed">
		<ul>
			<a href="?page=01-inicio" class="Links"><li>Inicio</li></a>
			<a href="?page=02-citas" class="Links"><li>Citas</li></a>
			<a href="?page=03-cuenta" class="Links"><li>Mi cuenta</li></a>
			<a href="../php/procesos/cerrarSesion.php" class="Links linkLog"><li>Cerrar Sesión</li></a>
		</ul>
		<form action="php/procesos/login.php" method="post" class="FormLogin">
			<label for="email">Correo:</label>
			<input type="text" name="email" id="email">
		<br>
			<label for="pass">Password:</label>
			<input type="text" name="pass" id="pass">
		<br>
			<input type="submit" id="btn" name="btn" value="Entrar">
		</form>
	</nav>
</header>

