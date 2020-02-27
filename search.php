<?php 
// credenciais de acesso ao MySQL 
//require_once  'init.php';
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root' ); 
define('MYSQL_PASSWORD', '' ); 
define('MYSQL_DB_NAME', 'funcoes'); 
// palavra digitada na busca 
$search = isset($_GET['search']) ? $_GET['search'] : ''; 
$sql = "SELECT codigo, name, salario, funcao, birthdate FROM funcionarios WHERE codigo  LIKE :search  OR name  LIKE :search ";
//$sql = "SELECT * FROM funcionarios WHERE codigo  LIKE :search OR name  LIKE :search";  
// abre a conexão e define codificação UTF-8 
$PDO = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD); 
$PDO->exec("set names utf8");
 
// cria o Prepared Statement e o executa
$stmt = $PDO->prepare($sql);
$stmt->bindValue(':search', '%'. $search . '%');
$stmt->execute();
 
// cria um array com os resultados
$funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Resultado da Pesquisa</title>
    </head>
 
    <body>
         
 
<h1>Resultados da busca</h1>
 
 
        <?php if (count($funcionarios) > 0): ?>
         
        <?php //foreach ($funcionarios as $funcionario): ?>
             
 
<div>
 
<h2><?php //echo $funcionario['codigo'] ?></h2>
 
<h2><?php echo(json_encode($funcionarios))  ?></h2>
 <h2><?php //echo $funcionario['name'] ?></h2>

 
 </div>
 
             
 
        <?php //endforeach; ?>
 
        <?php else: ?>
 
 
 
Nenhum resultado encontrado
 
 
        <?php endif; ?>
        
 <a href="index.php">Volta</a>
    </body>
</html>