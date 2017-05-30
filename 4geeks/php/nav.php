<header>
	<input type="checkbox" name="menu" class="ocultar" id="menu">
	<label for="menu" class="label_menu" id="LabelFixed">Menu</label>
	<nav class="navegador" id="MenuFixed">
		<ul>
			<a href="index.php" class="Links"><li>Inicio</li></a>
			<a href="#" class="Links linkLog"><li>Login</li></a>
		</ul>
		<form action="php/procesos/login.php" method="post" class="FormLogin">
			<label for="email">Correo:</label>
			<input type="email" name="email" id="email">
		<br>
			<label for="pass">Password:</label>
			<input type="password" name="pass" id="pass">
		<br>
			<input type="submit" id="btn" name="btn" value="Entrar">
		</form>
	</nav>
</header>
