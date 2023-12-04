<?php 
define("LOGIN", 1);
include '../header.php';
$selectProduct = $pdo->query("SELECT p.product_code, p.product_description, p.product_unit, sc.quantity FROM product_list as p LEFT JOIN stockcount as sc ON sc.productId = p.product_id");
$selectUser = $pdo->query("SELECT * FROM users_account WHERE accessType='user' ");

$selectStockLogs = $pdo->query("SELECT p.product_description, st.quantity, st.transact_type, st.created_at FROM tracking_logs as st LEFT JOIN product_list as p ON p.product_code = st.productId");
?>
<nav class="navbar navbar-expand-lg bg-dark p-2">
	<div class="container-fluid">
		<a class="navbar-brand text-light me-5">Administrator</a>
		<button class="navbar-toggler text-light btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fa fa-bars h3"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link text-light mx-1 text-start" href="index.php?page=Home" aria-current="page">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light mx-1 text-start" href="index.php?page=Product">Product</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light mx-1 text-start" href="index.php?page=Users">Users</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light mx-1 text-start" href="index.php?page=QRCODE">QR CODE</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light mx-1 text-start" href="index.php?page=Logs">Logs</a>
					</li>
				</ul>
			<a class="text-light ms-1 text-decoration-none" style="cursor: pointer;" href="logout.php">Logout</a>
		</div>
	</div>
</nav>

<?php 

if(!empty($_GET['page']) || !empty($_SESSION['page'])){
	$page = $_GET['page'] ?? $_SESSION['page'];
	switch($page){
		case "Product"  : 	include'pages/productlist.php'	;	break;
		case "Users" 	: 	include'pages/userlist.php'		; 	break;
		case "Logs" 	: 	include'pages/trackinglogs.php'	; 	break;
		case "QRCODE" 	: 	include'pages/qrScanning.php'	; 	break;
	}
}else{

}
include '../footer.php';
?>