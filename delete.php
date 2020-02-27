<?php

require_once 'init.php';

//pega o codigo da url
$codigo = isset($_GET['codigo']) ? $_GET['codigo']: null;

//valida o codigo
if(empty($codigo))
{
	echo "codigo não informado";
	exit;
}
//remove do banco
$PDO = db_connect();
$sql = "DELETE FROM funcionarios WHERE codigo = :codigo";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

if($stmt->execute())
{
	header('Location: index.php');
}
else
{
	echo "Erro ao remover";
	print_r($stmt->errorInfo());
}


?>