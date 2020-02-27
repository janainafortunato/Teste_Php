<?php 

require_once  'init.php';

//pega os dados do formulario
$name = isset($_POST['name']) ? $_POST['name'] : null;
$salario = isset($_POST['salario']) ? $_POST['salario'] : null;
$funcao = isset($_POST['funcao'])? $_POST['funcao'] : null;
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;

//validação  do formulario para evitar dados vazios
if(empty($name)|| empty($salario)|| empty($funcao)|| empty($birthdate))
{
	echo "Volte e preencha todos os campos";
	exit;
}
//a data vem no formato dia/mes/ano

$isoDate = dateConvert($birthdate);

$PDO = db_connect();
$sql = "INSERT INTO funcionarios(name, salario, funcao, birthdate) VALUES (:name, :salario, :funcao, :birthdate)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':salario', $salario);
$stmt->bindParam(':funcao', $funcao);
$stmt->bindParam(':birthdate', $birthdate);

if($stmt->execute())
{
	header('Location: index.php');
}
else
{
	echo "Erro ao cadastrar";
	print_r($stmt->errorInfo());
}

?>