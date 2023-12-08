<?php 
define("LOGIN", 1);
include '../header.php';
$selectProduct = $pdo->query("SELECT p.product_code, p.product_size, p.product_description, p.department, sc.quantity FROM product_list as p LEFT JOIN stockcount as sc ON sc.product_qr_key = p.product_code");

$selectUser = $pdo->query("SELECT CONCAT(fname,' ',mname,' ',lname,' ',namesuffix) as studentFullname,fname,mname,lname,namesuffix, account_id FROM users_account WHERE accessType='user'");
$resUser = $selectUser->fetchAll(PDO::FETCH_ASSOC);

$selectStockLogs = $pdo->query("SELECT p.product_description, p.department, p.product_size, st.quantity, st.transact_type, st.created_at FROM tracking_logs as st LEFT JOIN product_list as p ON p.product_code = st.productId");
$selectReservation = $pdo->query("SELECT rsv.college_course
	, rsv.student_number
	, rsv.student_yr
	,rsv.student_section
	, rsv.status
	, rsv.created_at
	, rsv.reserve_size
	, p.product_description
	, p.product_code
	, rsv.reserve_quantity
	, CONCAT(rsv.student_lname,', ',rsv.student_fname,' ',rsv.student_mname,' ',rsv.student_namesuffix) as studentFullname
	, p.product_id FROM reservation as rsv 
	LEFT JOIN product_list as p ON p.product_code = rsv.product_id
	WHERE rsv.is_released = 0 ORDER BY rsv.rsv_id ASC;
	");

$selectReleasedStocks = $pdo->query("SELECT rsv.college_course
	, rsv.student_number
	, rsv.student_yr
	,rsv.student_section
	, rsv.status
	, rsv.created_at
	, rsv.reserve_size
	, p.product_description
	, p.product_code
	, rsv.reserve_quantity
	, rsv.released_by
	, rsv.updated_at
	, rsv.student_lname
	, rsv.student_fname
	, rsv.student_mname
	, rsv.student_namesuffix
	, p.product_id FROM reservation as rsv 
	LEFT JOIN product_list as p ON p.product_code = rsv.product_id
	WHERE rsv.is_released = 1 ORDER BY rsv.rsv_id ASC");


$selectCountLowStocks = $pdo->query("SELECT pl.product_description, pl.product_size, pl.department FROM stockcount as st LEFT JOIN product_list as pl ON pl.product_code = st.product_qr_key WHERE st.quantity < 100");
$countLowStocks = $selectCountLowStocks->rowCount();
?>
<nav class="navbar navbar-expand-lg bg-dark p-3">
	<img src="IDCLogo.jpg" width="60" class="rounded-circle">
	<div class="container-fluid">
		<a class="navbar-brand text-light me-2 p-0">
		Administrator</a>
		<button class="navbar-toggler text-light btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fa fa-bars h3"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav me-auto">
				<?php 
				if($_SESSION['access'] == 'user'){
					?>
					<li class="nav-item">
						<a class="nav-link text-light mx-1 text-start" href="index.php?page=Product">Product</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light mx-1 text-start" href="index.php?page=Reserve">Reservation</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light mx-1 text-start" href="index.php?page=Released">Released</a>
					</li>
					<?php
				}else{
					?>
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
						<div class="dropdown">
							<button class="btn text-light dropdown-toggle position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Alert
								<span class="position-absolute top-25 start-100 ms-1 mt-2 translate-middle badge rounded-pill bg-danger">
									<?php echo $countLowStocks ?>
								</span>
							</button>
							<ul class="dropdown-menu">
								<?php 
								while($resLowStocks = $selectCountLowStocks->fetch()){
									?>
									<li><a href="index.php?page=Product" class="dropdown-item text-danger" href="#"><b><?php echo $resLowStocks['department'].' '.$resLowStocks['product_description'].' '.strtoupper($resLowStocks['product_size']) ?></b> is low on stocks</a></li>
									<?php
								}
								?>
							</ul>
						</div>
					</li>
					<?php
				}
				?>
				
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
		case "Released" : 	include'pages/released.php'		; 	break;
		case "Reserve" 	: 	include'pages/reserve.php'		; 	break;
	}
}else{

}
include '../footer.php';
?>