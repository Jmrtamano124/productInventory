<?php 
define('LOGIN', 1);
require ('../boot.php');
try{
// echo "<br>".$productid."<br>";


	for ($i=0; $i < count($_POST['product']) ; $i++) { 
	// code...
		$product = $_POST['product'][$i];
		$reserve_quantity = $_POST['reserve_quantity'];
		$college = $_POST['college'] ?? $_POST['college2'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$namesuffix = $_POST['namesuffix'];
		$studentYr = $_POST['studentYr'];
		$studentSection = $_POST['studentSection'];
		$product_size = $_POST['product_size'];
		$idnumber = $_POST['idnumber'];
// echo "<pre>";
// var_dump($_POST);

		$slectProduct = $pdo->query("SELECT product_code FROM product_list WHERE product_description='$product' AND product_size='$product_size' AND department = '$college' ");
		$resProduct = $slectProduct->fetch();

		$productid = $resProduct['product_code'];

// die;
		$insertReserve = $pdo->query("INSERT INTO reservation (
			reserve_size
			, product_id
			, reserve_quantity
			, student_number
			, student_fname
			, student_mname
			, student_lname
			, student_namesuffix
			, college_course
			, student_yr
			, student_section
			) VALUES(
			'$product_size'
			, '$productid'
			, '$reserve_quantity'
			, '$idnumber'
			, '$fname'
			, '$mname'
			, '$lname'
			, '$namesuffix'
			, '$college'
			, '$studentYr'
			, '$studentSection'
		)");
	}
}catch(PDOException $e){
	echo $e;
}

$_SESSION['page'] ='Reserve';
header("location:actions.php?do=success");
?>