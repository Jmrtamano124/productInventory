<?php 
define('LOGIN', 1);
require ('../boot.php');

$fname = $_POST['update_fname'];
$mname = $_POST['update_mname'];
$lname = $_POST['update_lname'];
$suffix = $_POST['update_suffix'];
$accId = $_POST['update_accId'];


$addUser = $pdo->query("UPDATE users_account SET 
	fname = '$fname'
	, mname = '$mname'
	, lname = '$lname'
	, namesuffix = '$suffix'
	 WHERE account_id='$accId';
	");

$_SESSION['page'] ='Users';
header("location:actions.php?do=success");
?>