<?php
error_reporting(E_ALL);
session_start();
include_once "Database.php";
try{
	$dsn="mysql:host=".DB_HOST.";dbname=".DB_NAME;
	$db=new PDO($dsn,DB_USER,DB_PASS);
}catch(PDOException $e){
	echo 'Connection failed'.$e->getMessage();
	exit;
}
?>