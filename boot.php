<?php 
session_start();
date_default_timezone_set("Asia/Manila");
$dateNow = date('Y-m-d H:i:s');

include 'links.php';

$pdo = null;
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'product_inventory');
define('APP_ROOT', 'http://localhost/product_inventory');
try {
	$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo 'Connection Failed: ' . $e->getMessage();
	die();
}

if(empty($_SESSION['username']) && !defined('LOGIN')){
	header("location: index.php");
}else{
	$userid = $_SESSION['userid'] ?? '';
	
}

if($login == '1'){
	$_SESSION['login'] = '2';
}else{

}
?>