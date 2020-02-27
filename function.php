<?php 

/**
*Conecta com o MYSQL usando PDO
*/
function db_connect()
{
	$PDO = new PDO('mysql:host='. DB_HOST . ';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

	return $PDO;
}

function dateConvert($date)
{
	if(! strchr($date, '/'))
	{
		//$date está no formato ISO (yyyy-mm-dd) e deve ser convertida
		//para dd/mm/yyyy
		sscanf($date, '%d-%d-%d', $y, $m, $d);
		return sprintf('%02d/%02d/%04d', $d, $m, $y);
	}
	else
	{
		//$date está no formando brasileiro e deve ser convertido para ISO
		sscanf($date, '%d/%d/%d', $d, $m, $y);
		return sprintf('%04d-%02d-%02d', $y, $m, $d);
	}

	return false;
}
/*
*Calcula a idade a partir da data de nascimento
*
*/
 function calculateAge($birthdate)
 {
 	$now = new DateTime();
 	$diff = $now->diff(new DateTime($birthdate));

 	return $diff->y;
 }

?>