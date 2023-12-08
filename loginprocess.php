<?php 
define('LOGIN', 1);
require ('boot.php');

$username = $_POST['user'];
$password = $_POST['pass'];
$result = "";

$selectAccount = $pdo->query("SELECT username, password, accessType FROM users_account WHERE username='$username' ");
$count = $selectAccount->rowCount();
if($count == 1){
	$res = $selectAccount->fetch();
	$hpass = $res['password'];
	$access = $res['accessType'];
	if(password_verify($password, $hpass)){
		$_SESSION['username'] = $username;
		$_SESSION['login'] = '1';
		$_SESSION['access'] = $access;
			$result = array("result" => "success", "access" => $res['accessType']);
	}else{
		$result = array("result" => "error");
	}
}else{
	$result = array("result" => "account not exist");
}


header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);

?>