<?php
$pdo = new PDO("mysql:host=localhost", 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbname = 'products_crud';
$dbname = "`".str_replace("`","``",$dbname)."`";
$pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
$pdo->query("use $dbname");

$pdo->exec("
	CREATE TABLE IF NOT EXISTS `products` (
	`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`title` varchar(25) NOT NULL,
	`description` longtext DEFAULT NULL,
	`price` decimal(10,2) NOT NULL,
	`date_created` datetime NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
")
?>