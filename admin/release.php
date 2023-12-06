<?php 
define('LOGIN', 1);
require ('../boot.php');
$username = $_SESSION['username'];
$studentid = $_GET['studentid'];
$productid = $_GET['productid'];

$delteUser = $pdo->query("UPDATE reservation SET is_released = 1, released_by='$username', updated_at='$dateNow', status='Released' WHERE student_id ='$studentid'");

$updateStock = $pdo->query("UPDATE stockcount SET quantity = quantity - 1 WHERE productId ='$productid'");

$_SESSION['page'] ='Reserve';
header("location:actions.php?do=success");
 ?>