<?php 
define('LOGIN', 1);
require ('../boot.php');

$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$suffix = $_POST['suffix'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$accesstype = $_POST['accesstype'];

$addUser = $pdo->query("INSERT INTO users_account(fname
, mname
, lname
, namesuffix
, username
, password
, accessType) VALUES(

'$fname'
,'$mname'
,'$lname'
,'$suffix'
,'$username'
,'$password'
,'$accesstype'

)");

$_SESSION['page'] ='Users';
header("location:actions.php?do=success");
?>