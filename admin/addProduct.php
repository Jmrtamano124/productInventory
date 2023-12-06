<?php 
define('LOGIN', 1);
require ('../boot.php');

	$pcode = $_POST['pcode'];
	$pname = $_POST['pname'];
	$department = $_POST['department'];
	$pquantity = $_POST['pquantity'];
	$product_size = $_POST['product_size'];


$insertProduct = $pdo->query("INSERT INTO product_list(product_code,product_description, product_size,department) VALUES(
	'$pcode',
	'$pname',
	'$product_size',
	'$department'
) ON DUPLICATE KEY UPDATE department='$department'");

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