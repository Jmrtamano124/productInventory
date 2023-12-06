<?php 
define('LOGIN', 1);
require ('../boot.php');
try{

$product = $_POST['product'];
$college = $_POST['college'] ?? $_POST['college2'];
$yrsection = $_POST['yrsection'];
$studentId = $_POST['studentId'];
$product_size = $_POST['product_size'];

echo "<pre>";
var_dump($_POST);

$slectProduct = $pdo->query("SELECT product_id FROM product_list WHERE product_description='$product' AND product_size='$product_size' AND department = '$college' ");
$resProduct = $slectProduct->fetch();

$productid = $resProduct['product_id'];
echo "<br>".$productid."<br>";

// die;
$insertReserve = $pdo->query("INSERT INTO reservation (
reserve_size
, product_id
, student_id
, college_course
, yr_section
) VALUES(
'$product_size'
, '$productid'
, '$studentId'
, '$college'
, '$yrsection'
)");
}catch(PDOException $e){
	echo $e;
}
$_SESSION['page'] ='Reserve';
header("location:actions.php?do=success");
?>