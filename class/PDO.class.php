<?php
define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USER','root');
define('DB_PWD','root');
define('DB_DATABASE','portaldaturma');

try{  
	$pdo = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname='. DB_DATABASE, DB_USER, DB_PWD);
} catch (PDOException $exc){                                                                    
	echo "Problemas na conexão!";
	echo $exc->getMessage();
}
?>