<?php

require_once 'init.php';

//abre a conexão
$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM funcionarios ORDER BY codigo ASC";

// SQL para selecionar os registros
$sql = "SELECT codigo, name, salario, funcao, birthdate FROM funcionarios ORDER BY codigo ASC";

//conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

//seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sistema de Cadastro de Funcionarios</title>
</head>
<body>
	<h1>Sistema de Cadastro</h1>
	<p><a href="formulario.php">Adicionar Funcionario</a></p>
	<h2>Lista de Funcionarios</h2>
	<p>Total de Registros:<?php echo $total ?></p>
	<?php if($total > 0 ): ?>

		<br><br>

		

	
<h1>Sistema de Busca</h1>
 
 
 
<form action="search.php">
            <label for="search">Busca: </label>
            <input type="text" name="search" id="search" placeholder="Busca...">
 
             
 
 
            <input type="submit" value="Buscar">
        </form><br><br>
 

	
		<table width="50%" border="1">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nome</th>
					<th>Salario</th>
					<th>Função</th>
					<th>Idade</th>
					<th>Anos</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				 <?php while ($funcionarios = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $funcionarios['codigo'] ?></td>
                    <td><?php echo $funcionarios['name'] ?></td>
                    <td><?php echo $funcionarios['salario'] ?></td>
                    <td><?php echo $funcionarios['funcao'] ?></td>
                    <td><?php echo dateConvert($funcionarios['birthdate']) ?></td>
                  	<td><?php echo calculateAge($funcionarios['birthdate']) ?></td>
                    <td>
                        <a href="formulario_editar.php?codigo=<?php echo $funcionarios['codigo'] ?>">Editar</a>
                        <a href="delete.php?codigo=<?php echo $funcionarios['codigo'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
 
        <?php else: ?>
 
        <p>Nenhum usuário registrado</p>
 
        <?php endif; ?>

    </body>
</html>