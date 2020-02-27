<?php 

//constante com as credenciais de acesso ao banco mysql
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'funcoes');

//habilita todas as exibiçoes de erros
ini_set('display_error', true);
error_reporting(E_ALL);

date_default_timezone_set('America/Recife');

//inclui o arquivo de funções

require_once 'function.php';

?>