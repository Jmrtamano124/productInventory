<?php 
define('LOGIN', 1);
require ('../boot.php');

$userid = $_GET['user'];
$delteUser = $pdo->query("DELETE FROM users_account WHERE account_id ='$userid'");

$_SESSION['page'] ='Users';
header("location:actions.php?do=success");
 ?>