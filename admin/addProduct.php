<?php 
define('LOGIN', 1);
require ('../boot.php');

	$pcode = $_POST['pcode'];
	$pname = $_POST['pname'];
	$punit = $_POST['punit'];
	$pquantity = $_POST['pquantity'];

$insertProduct = $pdo->query("INSERT INTO product_list(product_code,product_description,product_unit) VALUES(
	'$pcode',
	'$pname',
	'$punit'
) ON DUPLICATE KEY UPDATE product_unit='$punit'");

$productId = $pdo->lastInsertId();
$addStock = $pdo->prepare("INSERT INTO stockcount (product_qr_key, productId, quantity) VALUES(
'$pcode'
, '$productId'
, '$pquantity'
) ON DUPLICATE KEY UPDATE quantity = quantity+:newquant ");
$addStock->bindParam(':newquant', $pquantity, PDO::PARAM_INT);
$addStock->execute();

$_SESSION['page'] ='Product';
header("location:actions.php?do=success");
?>