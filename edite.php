<?php 

require_once 'init.php';

//resgata os valores do formulario
$name = isset($_POST['name']) ? $_POST['name'] : null;
$salario = isset($_POST['salario']) ? $_POST['salario']: null;
$funcao = isset($_POST['funcao']) ? $_POST['funcao']: null;
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate']: null;
$codigo = isset($_POST['codigo']) ? $_POST['codigo']: null;

//validação 
if(empty($name)|| empty($salario)|| empty($funcao)|| empty($birthdate))
{
	echo "Volte e preencha todos os campos";
	exit;
}
$isoDate = dateConvert($birthdate);

$PDO = db_connect();
$sql = "UPDATE funcionarios SET name = :name, salario = :salario, funcao = :funcao, birthdate = :birthdate WHERE codigo = :codigo";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':salario', $salario);
$stmt->bindParam(':funcao', $funcao);
$stmt->bindParam(':birthdate', $birthdate);
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

if($stmt->execute())
{
	header('Location: index.php');
}
else
{
	echo "Erro ao alterar";
	print_r($stmt->errorInfo());
}

?>