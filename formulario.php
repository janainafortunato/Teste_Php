<?php 

require 'init.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Funcionarios</title>
</head>
<body>
	<h1>Sistema de Cadastro</h1>
	<br>
	<form action="adiciona.php" method="post">
		<label for="name">Nome:</label>
		<br>
		<input type="text" name="name" id="name">
		<br><br>

		<label for="salario">Salario:</label>
		<br>
		<input type="int" name="salario" id="salario">
		<br><br>

		<label for="funcao">Função:</label>
		<br>
		<input type="text" name="funcao" id="funcao">
		<br><br>

		<label for="birthdate">Idade Nascimento:</label>
		<br>
		<input type="date" name="birthdate" id="birthdate">
		<br><br>
			
		<input type="submit" name="Cadastrar">	
	</form>

</body>
</html>