<?php 
require("../header.php");
$do = $_GET['do'];

switch ($do) {
	case 'success':
	?>
	<script>
		let timerInterval
		Swal.fire({
			icon: 'success',
			title: 'Success!!',
			timer: 2500,
			timerProgressBar: true,
			willClose: () => {
				clearInterval(timerInterval)
			}
		}).then((result) => {
			/* Read more about handling dismissals below */
			window.location.href="/productinventory/admin";
		})
	</script>
	<?php
	break;
	case 'failed':
	?>
	<script>
		let timerInterval
		Swal.fire({
			icon: 'error',
			title: 'Success!!',
			timer: 2500,
			timerProgressBar: true,
			willClose: () => {
				clearInterval(timerInterval)
			}
		}).then((result) => {
			/* Read more about handling dismissals below */
			window.location.href="/productinventory/admin";
		})
	</script>
	<?php
	break;
	default:
		# code...
	break;
}
?>