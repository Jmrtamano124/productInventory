<?php 
define('LOGIN', 1);
require ('../boot.php');

$productQrKey = $_POST['product_qr_key'];
$type = $_POST['type'];
$quantity = $_POST['quantity'];
$result = "";

if($_POST['type'] == "stockin"){
	$trnType = $_POST['type'];
$stockin = $pdo->prepare("UPDATE stockcount SET quantity = quantity + :qty WHERE product_qr_key =:productkey");
$stockin->bindParam(':qty', $quantity, PDO::PARAM_INT);
$stockin->bindParam(':productkey', $productQrKey, PDO::PARAM_STR);
$insertTrackingLogs = $pdo->query("INSERT INTO tracking_logs(productId, quantity, transact_type)VALUES('$productQrKey','$quantity','$trnType')");
}else{

}
$stockin->execute();

$result = array(
	'result' =>'success'
);


header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);

/*
elseif($_POST['type'] == "stockout"){
	$trnType = $_POST['type'];
$stockin = $pdo->prepare("UPDATE stockcount SET quantity = quantity - :qty WHERE product_qr_key =:productkey");
$stockin->bindParam(':qty', $quantity, PDO::PARAM_INT);
$stockin->bindParam(':productkey', $productQrKey, PDO::PARAM_STR);
$insertTrackingLogs = $pdo->query("INSERT INTO tracking_logs(productId, quantity, transact_type)VALUES('$productQrKey','$quantity','$trnType')");
}

*/
?>