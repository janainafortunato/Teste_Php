<?php 

require 'init.php';

//pega o codigo da url
$codigo = isset($_GET['codigo']) ? (int) $_GET['codigo']: null;

//valida o codigo
if(empty($codigo))
{
	echo "codigo para alateração não defindo";
	exit;
}

//busca os dados do funcionario  a ser editado
$PDO = db_connect();
$sql = "SELECT name, salario, funcao, birthdate FROM funcionarios WHERE codigo = codigo";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

$stmt->execute();

$funcionarios = $stmt->fetch(PDO::FETCH_ASSOC);

//se o método fetch() não retornar um array, significa que o codigo não corresponder a um usuario valido.
if(!is_array($funcionarios))
{
	echo "Nenhum usuario encontrado";
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edição de Funcionarios</title>
</head>
<body>
	<h1>Sistema de Cadastro de Funcionarios</h1>
	<br>
	<h2>Edição de Funcionarios</h2>
	<br>
	<form action="edite.php" method="post">
		<label for="name">Nome:</label>
		<input type="text" name="name" id="name" value="<?php echo $funcionarios['name']?>">
		<br><br>
		<label for="salario">Salario:</label>
		<input type="int" name="salario" id="salario" value="<?php echo $funcionarios['salario']?>">
		<br><br>
		<label for="funcao">Função:</label>
		<input type="text" name="funcao" id="funcao" value="<?php echo $funcionarios['funcao']?>">
		<br><br>
		<label for="birthdate">Data de Nascimento:</label>
		<input type="date" name="birthdate" id="birthdate" placeholder="dia/mês/ano" value="<?php echo calculateAge($funcionarios['birthdate'])?>">
		<br><br>
		<input type="hidden" name="codigo" value="<?php echo $codigo ?>">

		<input type="submit" value="Alterar">
	</form>

</body>
</html>