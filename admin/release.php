<?php 
define('LOGIN', 1);
require ('../boot.php');
$username = $_SESSION['username'];
$productid = $_GET['productid']; 
$size = $_GET['size']; 
$q = $_GET['q']; 


$delteUser = $pdo->query("UPDATE reservation SET is_released = 1, released_by='$username', updated_at='$dateNow', status='Released' WHERE reserve_size='$size' AND product_id='$productid' AND reserve_quantity='$q' ");

$updateStock = $pdo->query("UPDATE stockcount SET quantity = quantity - $q WHERE product_qr_key ='$productid'");


$_SESSION['page'] ='Reserve';
header("location:actions.php?do=success");
 ?>