<?php 
define("LOGIN", 1);
include '../header.php';
$selectProduct = $pdo->query("SELECT p.product_code, p.product_size, p.product_description, p.department, sc.quantity FROM product_list as p LEFT JOIN stockcount as sc ON sc.productId = p.product_id");

$selectUser = $pdo->query("SELECT CONCAT(fname,' ',mname,' ',lname,' ',namesuffix) as studentFullname,fname,mname,lname,namesuffix, account_id FROM users_account WHERE accessType='user'");
$resUser = $selectUser->fetchAll(PDO::FETCH_ASSOC);

$selectStockLogs = $pdo->query("SELECT p.product_description, st.quantity, st.transact_type, st.created_at FROM tracking_logs as st LEFT JOIN product_list as p ON p.product_code = st.productId");
$selectReservation = $pdo->query("SELECT rsv.college_course
	, rsv.yr_section
	, rsv.status
	, rsv.created_at
	, rsv.reserve_size
	, CONCAT(u.fname,' ',u.mname,' ',u.lname,' ',u.namesuffix) as studentFullname
	, u.account_id
	, p.product_id FROM reservation as rsv 
	LEFT JOIN users_account as u 
	ON u.account_id = rsv.student_id 
	LEFT JOIN product_list as p ON p.product_id = rsv.product_id
	WHERE rsv.is_released = 0 AND u.accessType='user';
	");

$selectReleasedStocks = $pdo->query("SELECT 
	p.product_description
	, p.product_size
	, CONCAT(u.fname,' ',u.mname,' ',u.lname,' ',u.namesuffix) as studentFullname
	, CONCAT(us.fname,' ',us.mname,' ',us.lname,' ',us.namesuffix) as releasedBy
	, rsv.created_at
	, rsv.updated_at
	FROM reservation as rsv
	LEFT JOIN users_account as u ON u.account_id = rsv.student_id
	LEFT JOIN users_account as us ON us.username = rsv.released_by
	LEFT JOIN product_list as p 
	ON p.product_id = rsv.product_id WHERE rsv.is_released = 1");


	?>
	<nav class="navbar navbar-expand-lg bg-dark p-3">
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
					<li class="nav-item">
						<a class="nav-link text-light mx-1 text-start" href="index.php?page=Reserve">Reservation</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light mx-1 text-start" href="index.php?page=Released">Released</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light mx-1 text-start" href="index.php?page=Report">Report</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light mx-1 text-start position-relative">
							Alert
							<span class="position-absolute top-25 start-100 ms-1 mt-2 translate-middle badge rounded-pill bg-danger">
							 5
							</span>
						</a>
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
			case "Report" 	: 	include'pages/Report.php'		; 	break;
			case "Released" 	: 	include'pages/released.php'		; 	break;
			case "Reserve" 	: 	include'pages/reserve.php'		; 	break;
		}
	}else{

	}
	include '../footer.php';
?>