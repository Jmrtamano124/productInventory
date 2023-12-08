<?php
define('LOGIN', 1);
require ('../boot.php');
$username = $_SESSION['username'];
try{
// echo "<br>".$productid."<br>";


	
	// code...
		$college = $_POST['college'];
		$idnumber = $_POST['idnumber'];
		$productid = $_POST['data'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$namesuffix = $_POST['namesuffix'];
		$studentYr = $_POST['studentYr'];
		$studentSection = $_POST['studentSection'];
		$product_size = $_POST['product_size'];
		$reserve_quantity = $_POST['reserve_quantity'];
// echo "<pre>";
// var_dump($_POST);

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
			, status
			, is_released
			, released_by
			, updated_at
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
			, 'Released'
			, 1
			, '$username'
			, '$dateNow'
		)");

$updateStock = $pdo->query("UPDATE stockcount SET quantity = quantity - $reserve_quantity WHERE product_qr_key ='$productid'");

	$insertTrackingLogs = $pdo->query("INSERT INTO tracking_logs(productId, quantity, transact_type)VALUES('$productid','$reserve_quantity','stockout')");
$_SESSION['page'] ='Reserve';
header("location:actions.php?do=success");

}catch(PDOException $e){
	echo $e;
}

?>
